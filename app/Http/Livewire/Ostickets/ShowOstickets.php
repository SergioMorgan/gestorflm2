<?php

namespace App\Http\Livewire\Ostickets;

use App\Exports\OsticketsExport;
use Livewire\Component;
use App\Models\Osticket;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class ShowOstickets extends Component
{
    
    use WithPagination;

    public $osticket;
    public $search = '';
    public $sort = 'siom';
    public $direcion = 'desc';
    public $cant='50';
    public $readyToLoad = false; //para aplarzar la carga

    protected $listeners = ['render', 'delete' ];

    //para que se refrlejen en la url los cambios en el filtro
    protected $queryString = [ //para que se refrlejen en la url los cambios en el filtro
        'cant' => ['except' => '50'],
        'sort' => ['except' => 'siom'],
        'direcion' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];


    public function export() {
        return Excel::download(new OsticketsExport, 'ostickets.xlsx');
    }

    // con el parametro updatign, se ejecutar el resetPage de la pagina antes de la actualizacion
    public function updatingSearch() {
        $this->resetPage();
    }

    // funcion principal que se ejecuta al invocar o actualizar formulario asociado
    public function render() {
        $roles = Role::all();
        if ($this->readyToLoad) {
            $ostickets = Osticket::select('ostickets.*')
                        ->join('sites', 'sites.id', '=', 'ostickets.site_id')
                        ->where('detalle', 'like', '%' . $this->search . '%')
                        ->orWhere('siom', 'like', '%' . $this->search . '%')
                        ->orWhere('nombre', 'like', '%' . $this->search . '%')
                        ->orWhere('zonal', 'like', '%' . $this->search . '%')
                        ->orWhere('localid', 'like', '%' . $this->search . '%')
                        ->orWhere('ostickets.estado', 'like', '%' . $this->search . '%')
                        ->orderby($this->sort, $this->direcion)
                        ->paginate($this->cant);
        } else {
            $ostickets = [];
        }
        return view('livewire.ostickets.show-ostickets', compact('ostickets', 'roles'));
    }

    // tiempo de espera para carga de formulario, trabaja con la carga del gif de espera
    public function loadOstickets() {
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
        return redirect()->route('ostickets.create');
    }

    // recibe desde el formulario principal la peticion de borrar a travez del script del sweetalert
    // que manda a ejecutar este evento una vez que se pasa la confirmacion solicitada
    public function delete(Osticket $osticket) {
        $osticket->delete();
    }
}
