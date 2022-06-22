<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class DeleteUser extends Component
{

    public $open = false;
    public $user;

    // protected $rules = [
    //     'user.name'      => 'required|min:5',
    //     'user.email'     => 'required|email|unique:users,email',
    //     'user.profile'   => 'required',
    //     'user.status'    => 'required',
    // ];

    // public function mount(User $user){
    //     $this->user = $user;
    // }

    public function delete() {
        // $this->validate();
        $this->user->delete();
        $this->reset(['open']);
        $this->emitTo('show-users', 'render');
        $this->emit('alert', 'Registro eliminado');
    }



    public function render()
    {
        return view('livewire.delete-user');
    }
}
