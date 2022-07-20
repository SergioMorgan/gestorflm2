<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{
    public $open = false;           //para controlar reseteo de campos, se establece con SET desde el html
    public $name, $email, $password, $perfil;    //variables para cada campo que vamos a llenar
    // public $status = 'ACTIVO';      //VALOR POR DEFECTO del campo, para prevenir posibles llenados vacios
    public $selectorroles;
    // public $selectperfil = ['ACTIVO', 'INACTIVO'];  // tambien definido en showusers, se recomienda migrar a obtencion por tabla roles
    // Aca se definen las reglas, FALTA CAMBIAR A PROTECTED FUNCION (evaluar si es necesario)
    protected $rules = [
        'name'      => 'required|min:5',
        'email'     => 'required|email|unique:users,email',
        'password'  => 'required|min:8',
        // 'status'    => 'required',
        'perfil'    => 'required',
    ];

    public function mount() {
        $this->selectorroles = Role::all('id', 'name');
    }
    // Guarda los valores ingresados en el formulario
    public function save() {
        
        

        $this->validate();
        
        // $x = Hash::make($this->password);
        // dd($x, $this->password);
        $usuario = User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
            // 'status'   => $this->status,
        ]);
        $usuario->roles()->attach($this->perfil);


        $this->reset(['open', 'name', 'email', 'password']); //, 'status' , 'image']);
        $this->emitTo('users.show-users', 'render');
        $this->emit('alertOk', 'Registro creado correctamente');
    }

    // El render recargara eñ formulario asociado, en este caso el html que le corresponde
    public function render() {
        $roles = Role::all();
        // dd($roles);
        // dd($roles);

        return view('livewire.users.create-user', compact('roles'));
        // return view('livewire.users.show-users', compact('users', 'roles'));
    }

    //el metodo updating se pone antes del valor de la variable, paa ejecutar esto antes de que cambie de valor
    // EXPLICACION SUJETA A REVISION;
    public function updatingOpen() {
        if ($this->open == false) {
            $this->reset(['name', 'email', 'password']);
        }
    }
}