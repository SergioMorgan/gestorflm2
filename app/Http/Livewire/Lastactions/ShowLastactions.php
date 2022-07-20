<?php

namespace App\Http\Livewire\Lastactions;

use App\Models\Action;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ShowLastactions extends Component
{

    use WithPagination;
    public $search = '';
    public $cant='50';
    public $readyToLoad = false;

    protected $listeners = ['render'];
    protected $queryString = [
        'cant' => ['except' => '50'],
        'search' => ['except' => ''],
    ];

    public function updatingSearch() {
        $this->resetPage();
    }

    public function render() {
        $roles = Role::all();
        if ($this->readyToLoad) {
            $lastactions    = Action::select('actions.*', 'users.name', 'ostickets.siom', 'sites.nombre')
                            ->join('users', 'users.id', '=', 'actions.user_id')
                            ->join('ostickets', 'ostickets.id', '=', 'actions.osticket_id')
                            ->join('sites', 'sites.id', '=', 'ostickets.site_id')
                            ->orWhere('actions.detalle', 'like', '%' . $this->search . '%')
                            ->orWhere('users.name', 'like', '%' . $this->search . '%')
                            ->orderby('created_at', 'desc')
                            ->paginate($this->cant);
        } else {
            $lastactions = [];
        }
        return view('livewire.lastactions.show-lastactions', compact('lastactions', 'roles'));
    }

    public function loadLastactions() {
        $this->readyToLoad=true;
    }
}