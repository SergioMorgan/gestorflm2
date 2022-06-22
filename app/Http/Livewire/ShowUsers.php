<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class ShowUsers extends Component
{
    public $title;
    public $search;
    public $sort = 'id';
    public $direcion = 'desc';

    // protected $listeners = ['render' => 'render'];
    // se puede simplificar por lo siguiente, cuando los nombres de variable y lstener coinciden
    protected $listeners = ['render' ];

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orderby($this->sort, $this->direcion)
                        ->get();

        return view('livewire.show-users', compact('users'));
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
