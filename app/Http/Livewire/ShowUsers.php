<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ShowUsers extends Component
{

    use WithPagination;

    public $title;
    public $user;
    public $search = '';
    public $sort = 'id';
    public $direcion = 'desc';
    public $cant='10';
    public $open_edit = false;  //controla cventan modal para editar
    public $readyToLoad = false; //para aplarzar la carga

    protected $listeners = ['render', 'delete' ];

    protected $queryString = [  //para que se refrlejen en la url los cambios en el filtro
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direcion' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];

    // protected $listeners = ['render' => 'render'];
    // se puede simplificar por lo siguiente, cuando los nombres de variable y lstener coinciden

    // protected $rules = [
    //     'user.name'      => 'required|min:5',
    //     'user.email'     => 'required|email|unique:users,email',
    //     'user.profile'   => 'required',
    //     'user.status'    => 'required',
    // ];




    public function updatingSearch() {
        $this->resetPage();
    }

    protected function rules()
    {
        return [
            'user.name'     => 'required|min:5',
            'user.profile'  => 'required',
            'user.status'   => 'required',
            'user.email'    => 'required|email|unique:users,email,' . $this->user->id
        ];
    }

    public function render() {

        $roles = Role::all();

        if ($this->readyToLoad) {
            $users = User::where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orderby($this->sort, $this->direcion)
                        ->paginate($this->cant);
                        // ->get();

        } else {
            $users = [];
        }
        return view('livewire.show-users', compact('users', 'roles'));
    }

    public function loadUsers() {
        $this->readyToLoad=true;
    }

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

    public function edit(User $user) {
        $this->user = $user;
        $this->open_edit = true;
    }

    public function update() {
        $this->validate();
        $this->user->save();
        $this->reset(['open_edit']);
        // $this->emitTo('show-users', 'render');
        $this->emit('alert', 'Registro guardado correctamente');
    }

    public function delete(User $user) {
        $user->delete();
    }
}
