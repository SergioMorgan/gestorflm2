<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class ShowImagenlocal extends Component
{

    public $open_img = false;
    public $urlimagen ="";


    public function render()
    {
        return view('livewire.users.show-imagenlocal');
    }
}
