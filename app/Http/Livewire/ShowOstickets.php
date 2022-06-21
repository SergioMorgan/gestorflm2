<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Site;

class ShowOstickets extends Component
{
    public $title;
    public $search;

    public function render()
    {
        $sites = Site::where('nombre', 'like', '%' . $this->search . '%')
                        ->orWhere('zonal', 'like', '%' . $this->search . '%')
                        ->get();

        return view('livewire.show-ostickets', compact('sites'));
    }
}
