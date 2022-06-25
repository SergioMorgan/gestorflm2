<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class DeleteSite extends Component
{

    // public $open = false;
    public $site;

    public function delete() {
        $this->site->delete();
        // $this->reset(['open']);
        $this->emitTo('show-sites', 'render');
        $this->emit('alert', 'Registro eliminado');
    }



    public function render() {
        // return view('livewire.delete-user');
        return view('sites.index');
    }
}
