<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Site;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;


class ShowSites extends Component
{

    use WithPagination;

    public $title;
    public $site;
    public $search = '';
    public $sort = 'nombre';
    public $direcion = 'asc';
    public $cant='50';
    // public $open_edit = false;  //controla cventan modal para editar
    public $readyToLoad = false; //para aplarzar la carga

    protected $listeners = ['render', 'delete' ];

    protected $queryString = [  //para que se refrlejen en la url los cambios en el filtro
        'cant' => ['except' => '50'],
        'sort' => ['except' => 'nombre'],
        'direcion' => ['except' => 'asc'],
        'search' => ['except' => ''],
    ];














    public function updatingSearch() {
        $this->resetPage();
    }

        // protected function rules()
    // {
    //     return [
    //         'user.name'     => 'required|min:5',
    //         'user.profile'  => 'required',
    //         'user.status'   => 'required',
    //         'user.email'    => 'required|email|unique:users,email,' . $this->user->id
    //     ];
    // }

    public function render() {

        $roles = Role::all();

        if ($this->readyToLoad) {
            $sites = Site::where('nombre', 'like', '%' . $this->search . '%')
                        ->orWhere('zonal', 'like', '%' . $this->search . '%')
                        ->orWhere('clasificacion', 'like', '%' . $this->search . '%')
                        ->orderby($this->sort, $this->direcion)
                        ->paginate($this->cant);
                        // ->get();
        } else {
            $sites = [];
        }
        return view('livewire.show-sites', compact('sites', 'roles'));
    }

    public function loadSites() {
        $this->readyToLoad=true;
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
    
    public function delete(Site $site) {
        $site->delete();
    }
}
