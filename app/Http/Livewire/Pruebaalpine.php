<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Pruebaalpine extends Component
{
    public $count = 5;

    public function incrementar() {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.pruebaalpine');
    }
}
