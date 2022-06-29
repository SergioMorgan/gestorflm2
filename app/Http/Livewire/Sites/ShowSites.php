<?php

namespace App\Http\Livewire\Sites;

use Livewire\Component;
use App\Models\Site;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class ShowSites extends Component
{

    use WithPagination;

    public $site;
    public $search = '';
    public $sort = 'nombre';
    public $direcion = 'asc';
    public $cant='50';
    public $readyToLoad = false; //para aplarzar la carga

    protected $listeners = ['render', 'delete' ];

    //para que se refrlejen en la url los cambios en el filtro
    protected $queryString = [ //para que se refrlejen en la url los cambios en el filtro
        'cant' => ['except' => '50'],
        'sort' => ['except' => 'nombre'],
        'direcion' => ['except' => 'asc'],
        'search' => ['except' => ''],
    ];

    // con el parametro updatign, se ejecutar el resetPage de la pagina antes de la actualizacion
    public function updatingSearch() {
        $this->resetPage();
    }

    // funcion principal que se ejecuta al invocar o actualizar formulario asociado
    public function render() {
        $roles = Role::all();
        if ($this->readyToLoad) {
            $sites = Site::where('nombre', 'like', '%' . $this->search . '%')
                        ->orWhere('zonal', 'like', '%' . $this->search . '%')
                        ->orWhere('clasificacion', 'like', '%' . $this->search . '%')
                        ->orderby($this->sort, $this->direcion)
                        ->paginate($this->cant);
        } else {
            $sites = [];
        }
        return view('livewire.sites.show-sites', compact('sites', 'roles'));
    }

    // tiempo de espera para carga de formulario, trabaja con la carga del gif de espera
    public function loadSites() {
        $this->readyToLoad=true;
    }

    // modifica los parametros de orden cuando se invoca a ORDER
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

    // funcion llamada por el boton de creacion, para redirigir al otro componente
    public function gotocreate() {
        return redirect()->route('sites.create');
    }

    // recibe desde el formulario principal la peticion de borrar a travez del script del sweetalert
    // que manda a ejecutar este evento una vez que se pasa la confirmacion solicitada
    public function delete(Site $site) {
        $site->delete();
    }
}
