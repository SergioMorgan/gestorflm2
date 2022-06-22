<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class CreateUser extends Component
{
    protected $rules = [
        'name'      => 'required|min:5',
        'email'     => 'required|email|unique:users,email',
        'password'  => 'required|min:8',
        'profile'   => 'required',
        'status'    => 'required',
    ];
    
    public $open = false;
    public $name, $email, $password;
    public $profile = 'USUARIO';
    public $status = 'ACTIVO';

    // este metodo se activa cada vez que se modifique una de las propuedas definidas arriba
    // para activarlo, borrar los .defer en los campos de la vista
    // public function updated($propertyName) {
    //     $this->validateOnly($propertyName);
    // }

    public function save() {

        $this->validate();

        User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
            'profile'  => $this->profile,
            'status'   => $this->status,
        ]);

        $this->reset(['open', 'name', 'email', 'password', 'profile', 'status']);
        $this->emitTo('show-users', 'render');
        $this->emit('alert', 'Registro creado correctamente');
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
