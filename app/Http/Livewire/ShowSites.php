<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Site;

class ShowSites extends Component
{
    public $title;
    public $search;
    public $sort = 'localid';
    public $direcion = 'asc';

    public function render()
    {
        $sites = Site::where('nombre', 'like', '%' . $this->search . '%')
                        ->orWhere('zonal', 'like', '%' . $this->search . '%')
                        ->orderby($this->sort, $this->direcion)
                        ->get();

        return view('livewire.show-sites', compact('sites'));
    }

    public function order($sort) {
        if ($this->sort == $sort) {
            if ($this->direcion == "asc" ) {
                $this->direcion = "desc";
            } else {
                $this->direcion = "asc";
            }
        } else {
            $this->sort = $sort;
            $this->direcion = "asc";
        }
    }
}
