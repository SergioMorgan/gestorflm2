<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUser extends Component
{
    use WithFileUploads;

    public $open = false;
    public $name, $email, $password; //, $image;
    public $profile = 'USUARIO';
    public $status = 'ACTIVO';
    
    protected $rules = [
        'name'      => 'required|min:5',
        'email'     => 'required|email|unique:users,email',
        'password'  => 'required|min:8',
        'profile'   => 'required',
        'status'    => 'required',
        // 'image'     => 'required|image|max:2048',
    ];
    

    // este metodo se activa cada vez que se modifique una de las propuedas definidas arriba
    // para activarlo, borrar los .defer en los campos de la vista
    // public function updated($propertyName) {
    //     $this->validateOnly($propertyName);
    // }

    public function save() {

        $this->validate();
        // $image = $this->image->store('users');

        User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
            'profile'  => $this->profile,
            'status'   => $this->status,
            // 'image'    => $image,
        ]);

        $this->reset(['open', 'name', 'email', 'password', 'profile', 'status']); //, 'image']);
        $this->emitTo('show-users', 'render');
        $this->emit('alert', 'Registro creado correctamente');
    }

    public function render()
    {
        return view('livewire.create-user');
    }

    public function updatingOpen() { //se ejecuta antes (udatepOpen para DESPUES) de que se modifica de true a false o vicev
        if ($this->open == false) {
            $this->reset(['name', 'email', 'password']);
        }

    }
}
