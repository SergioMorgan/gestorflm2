<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUser extends Component
{
    public $open = false;           //para controlar reseteo de campos, se establece con SET desde el html
    public $name, $email, $password;    //variables para cada campo que vamos a llenar
    public $status = 'ACTIVO';      //VALOR POR DEFECTO del campo, para prevenir posibles llenados vacios

    // Aca se definen las reglas, FALTA CAMBIAR A PROTECTED FUNCION (evaluar si es necesario)
    protected $rules = [
        'name'      => 'required|min:5',
        'email'     => 'required|email|unique:users,email',
        'password'  => 'required|min:8',
        'status'    => 'required',
    ];

    // Guarda los valores ingresados en el formulario
    public function save() {
        $this->validate();
        User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
            'status'   => $this->status,
        ]);
        $this->reset(['open', 'name', 'email', 'password',  'status']); //, 'image']);
        $this->emitTo('show-users', 'render');
        $this->emit('alert', 'Registro creado correctamente');
    }

    // El render recargara eñ formulario asociado, en este caso el html que le corresponde
    public function render() {
        return view('livewire.create-user');
    }

    //el metodo updating se pone antes del valor de la variable, paa ejecutar esto antes de que cambie de valor
    // EXPLICACION SUJETA A REVISION;
    public function updatingOpen() {
        if ($this->open == false) {
            $this->reset(['name', 'email', 'password']);
        }
    }
}