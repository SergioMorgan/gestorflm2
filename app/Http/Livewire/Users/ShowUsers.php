<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ShowUsers extends Component
{

    use WithPagination;

    // public $title;  //
    public $user;                   // recibe el registro que se requiere editor
    public $search = '';            // inicializa la barra de busqueda
    public $sort = 'created_at';            // inicializa criterio de orden
    public $direcion = 'desc';      // inicializa criterio de orden
    public $cant='20';              // inicializa criterio de orden
    public $open_edit = false;      // controla aparicion de ventana modal
    public $readyToLoad = false;    //para aplarzar la carga
    public $selectorroles;

    protected $listeners = ['render', 'delete' ];   //activa los listener para disparar procedimientos SUJETO A REVISION

    //para que se refrlejen en la url los cambios en el filtro
    protected $queryString = [
        'cant' => ['except' => '20'],
        'sort' => ['except' => 'created_at'],
        'direcion' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];

    // con el parametro updatign, se ejecutar el resetPage de la pagina antes de la actualizacion
    public function updatingSearch() {
        $this->resetPage();
    }

    
    // reglas de validacion para el guardado
    protected function rules() {
        return [
            'user.name'     => 'required|min:5',
            // 'user.status'   => 'required',
            'user.email'    => 'required|email|unique:users,email,' . $this->user->id,
            'user.password' => 'nullable',
        ];
    }

    
    
    // funcion principal que se ejecuta al invocar o actualizar formulario asociado
    public function render() {
        
        $roles = Role::all();
        if ($this->readyToLoad) {
            $users = User::where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orderby($this->sort, $this->direcion)
                        ->paginate($this->cant);
        } else {
            $users = [];
        }
        
        return view('livewire.users.show-users', compact('users', 'roles'));
    }


    // tiempo de espera para carga de formulario, trabaja con la carga del gif de espera
    public function loadUsers() {
        $this->readyToLoad=true;
    }

    // modifica los parametros de orden cuando se invoca a ORDER
    public function order($sort) {
        if ($this->sort == $sort) {
            if ($this->direcion == "asc" ) {
                $this->direcion = "desc";
            } else {
                $this->direcion = "asc";
            }
        } else {
            $this->sort = $sort;
            $this->direcion = "asc";
        }
    }

    //Recibe como parametro la variable $user enviada como $item. Para que identifique la variable
    // como un objeto que equivale a un registro, la indetificamos como  una instancia del modelo USER
    // Edit abre la venta edit-open, mientas que update guarda los cambios en la BBDD
    public function edit(User $user) {
        $this->user = $user;    // $this->user ya tiene la  informacion del registro
        $this->perfil = $user->roles[0]->id;
        // $roles = Role::all();
        // dd($user->roles($user->id));

        // dd($usuario);
        // $user1 = $usuario->roles[0]->name;
        // foreach($usuario->roles as $role) {
        //     dump($role->name);
        // }

        $this->open_edit = true;    //con esto prende la ventan modal
    }

    // actualiza en la BBDD una vez que se dispara desde el boton de guardar
    public function update() {
        // dd($this->user->roles[0]->id, $this->perfil);
        $this->validate();  
        $this->user->password = Hash::make($this->user->password);      //ejecuta las validaciones
        // dd($this->user->password);
        $this->user->save();
        $this->user->syncRoles($this->perfil);

        // $this->user->roles[0]->id = $this->perfil ;
        $this->reset(['open_edit']);    //resetea los campos (para que al volver a ingresar, se reflejen los cambios)
        $this->emit('alertOk', 'Registro guardado correctamente');    //dispara la alerta guardada en app.blade
    }

    // recibe desde el formulario principal la peticion de borrar a travez del script del sweetalert
    // que manda a ejecutar este evento una vez que se pasa la confirmacion solicitada
    public function delete(User $user) {
        $user->delete();
    }
}
