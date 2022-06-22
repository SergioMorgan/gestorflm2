<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Nullable;

class EditUser extends Component
{
    // public $open = false;
    // public $user;

    // protected $rules = [
    //     'user.name'      => 'required|min:5',
    //     'user.email'     => 'required|email|unique:users,email',
    //     'user.profile'   => 'required',
    //     'user.status'    => 'required',
    // ];

    // public function mount(User $user){
    //     $this->user = $user;
    // }

    // public function save() {
    //     $this->validate();
    //     $this->user->save();
    //     $this->reset(['open']);
    //     $this->emitTo('show-users', 'render');
    //     $this->emit('alert', 'Registro editado correctamente');
    // }



    // public function render()
    // {
    //     return view('livewire.edit-user');
    // }
}
