<?php

namespace App\Http\Livewire;

use App\Models\Osticket;
use Laravel\Jetstream\Rules\Role;
use Livewire\Component;
use Livewire\WithPagination;

class ShowDashboard extends Component
{

    use WithPagination;
    
    // public $prueba;
    public $search = '';
    public $sort = 'siom';
    public $direcion = 'desc';
    public $readyToLoad = false;

    protected $queryString = [
        'sort' => ['except' => 'siom'],
        'direcion' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];

    public function updatingSearch() {
        $this->resetPage();
    }

    public function prueba() {
        return 'x';
    }

    public function render() {
        if ($this->readyToLoad) {
            $osticketsPendientes = Osticket::select( Osticket::raw("
                            COUNT(clockstops.id) as cantidadpr,
                            COUNT(clockstops.inicio) as prsconinicio,
                            COUNT(clockstops.fin) as prsconfin,
                            sum(TIMESTAMPDIFF(second, clockstops.inicio, (if(clockstops.fin is null, convert_tz(now(), '+00:00','+00:00'), clockstops.fin)))) AS duraciondepr,
                            sites.zonal as zonal, sites.nombre as nombre, sites.prioridad as prioridad, sites.slaresolucion as sla, 
                            ostickets.id as idsiom, ostickets.siom as siom, ostickets.estado as estado, ostickets.fechaasignacion as fechaasignacion, ostickets.fechacierre as fechacierre, 
                            TIMESTAMPDIFF(second, ostickets.fechaasignacion, (if(ostickets.fechacierre is null, convert_tz(now(), '+00:00','+00:00'), ostickets.fechacierre))) AS duracionsinpr
                        "))
                        ->join('sites', 'sites.id', '=', 'ostickets.site_id')
                        ->leftjoin('clockstops', 'clockstops.osticket_id', '=', 'ostickets.id')
                        ->where('ostickets.estado', '=', 'PENDIENTE')
                        // ->orwhere('ostickets.estado', '=', 'RECHAZADO')
                        ->groupby('ostickets.id')
                        ->orderby('siom', 'desc')
                        ->get();

            $osticketsRechazados = Osticket::select( Osticket::raw("
                            COUNT(clockstops.id) as cantidadpr,
                            COUNT(clockstops.inicio) as prsconinicio,
                            COUNT(clockstops.fin) as prsconfin,
                            sum(TIMESTAMPDIFF(second, clockstops.inicio, (if(clockstops.fin is null, convert_tz(now(), '+00:00','+00:00'), clockstops.fin)))) AS duraciondepr,
                            sites.zonal as zonal, sites.nombre as nombre, sites.prioridad as prioridad, sites.slaresolucion as sla, 
                            ostickets.id as idsiom, ostickets.siom as siom, ostickets.estado as estado, ostickets.fechaasignacion as fechaasignacion, ostickets.fechacierre as fechacierre, 
                            TIMESTAMPDIFF(second, ostickets.fechaasignacion, (if(ostickets.fechacierre is null, convert_tz(now(), '+00:00','+00:00'), ostickets.fechacierre))) AS duracionsinpr
                        "))
                        ->join('sites', 'sites.id', '=', 'ostickets.site_id')
                        ->leftjoin('clockstops', 'clockstops.osticket_id', '=', 'ostickets.id')
                        // ->where('ostickets.estado', '=', 'PENDIENTE')
                        ->orwhere('ostickets.estado', '=', 'RECHAZADO')
                        ->groupby('ostickets.id')
                        ->orderby('siom', 'desc')
                        ->get();
        } else {
            $osticketsPendientes = [];
            $osticketsRechazados = [];
        }
        return view('livewire.show-dashboard', compact('osticketsPendientes', 'osticketsRechazados'));
    }

    public function loadOstickets() {
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

}
