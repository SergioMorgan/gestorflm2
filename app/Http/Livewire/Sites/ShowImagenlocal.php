<?php

namespace App\Http\Livewire\Sites;

use Livewire\Component;

class ShowImagenlocal extends Component
{
    public $open_img = false;
    public $urlimagen ="";

    public function render()
    {
        return view('livewire.sites.show-imagenlocal');
    }
}
