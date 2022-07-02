<?php

namespace App\Http\Livewire\Ostickets;

use App\Models\Action;
use App\Models\Clockstop;
use App\Models\Osticket;
use Carbon\Carbon;
use Livewire\Component;

class EditOstickets extends Component
{
    protected $listeners = ['refrescar', 'deleteClockstop', 'deleteAction'];

    public $open_editaction = false;
    public $colorEtiquetas = 'bg-green-300';  //estilos del formulario (color fondo etiquetas)
    public $item;   //para identificar el elemento a editar
    public $osticket;
    public $actiontable, $clockstop, $lastclockstop;   //para almacenar la instancia (registro) de la BBDD
    public $action;
    public $osticket_id;
    public $site_id, $siom, $estado, $tipo, $fechaasignacion, $fechallegada, $fechacierre, $remedy, $detalle, $cierre, $categoria, $resultadoslap, $resultadoslar;
    public $user_id;
    public $selectEstado = ['PENDIENTE', 'CERRADO', 'ANULADO', 'RECHAZADO'];
    public $selectTipo = ['ENERGIA', 'RADIO', 'TRANSPORTE'];
    public $selectCategoria = ["ABASTECIMIENTO COMBUSTIBLE", "CAMBIO DE EQUIPO / REPARACION / REPUESTO / CONSUMIBLE", "CESE AUTOMATICO", "CORTE DE ENERGIA Y CESE AUTOMATICO", "DESCARTE, NO CORRESPONDE", "FALSA ALARMA", "INSTALACION DE GE O BATERIAS", "REVISION / RESET / AJUSTES / LIMPIEZA"];
    public $selectResultado = ['DENTRO', 'FUERA', 'N.A.'];

    public $fasignacion, $fllegada, $fcierre;

     //Reglas de validacion FALTA EXTENDER
    protected $rules = [
        'site_id'           => 'required',
        'siom'              => 'required|unique:ostickets,siom',
        'estado'            => 'required',
        'tipo'              => 'required',
        'fechaasignacion'   => 'required',
        'fechallegada'      => 'nullable',
        'fechacierre'       => 'nullable',
        'remedy'            => 'nullable',
        'detalle'           => 'nullable',
        'cierre'            => 'nullable',
        'categoria'         => 'nullable',
        'resultadoslap'     => 'nullable',
        'resultadoslar'     => 'nullable',
        'action.detalle'           => 'nullable',
    ];

    // Equivale a constructo, recibe la variable item (elemento a modificar en caso sea EDIT)
    public function mount($item = null) {
        $this->init($item);
    }
    // La primera funcion al ejecutarse, recibe como parametro el valor de item
    public function init($item) {
        $osticket       = null;       //inicializar la instancia de site
        $actiontable         = null;
        $lastclockstop  = null;
        $clockstop      = null;

        $osticket =         Osticket::findOrFail($item);
        $osticket_id  =     $osticket->id;
        $actiontable =           Action::select('actions.*')->where('osticket_id', '=', $this->item )->orderby('created_at', 'desc')->get();
        $clockstop =        Clockstop::select('clockstops.*')->where('osticket_id', '=', $this->item )->orderby('inicio', 'asc')->get();
        $lastclockstop =    Clockstop::select('clockstops.*')->where('osticket_id', '=', $this->item )->orderby('inicio', 'desc')->first();
        $this->actiontable = $actiontable;
        $this->osticket = $osticket;
        $this->clockstop = $clockstop;
        $this->lastclockstop = $lastclockstop;

        $this->site_id              = $this->osticket->site_id;
        $this->siom                 = $this->osticket->siom;
        $this->estado               = $this->osticket->estado;
        $this->tipo                 = $this->osticket->tipo;
        $this->fechaasignacion      = $this->osticket->fechaasignacion;
        $this->fechallegada         = $this->osticket->fechallegada;
        $this->fechacierre          = $this->osticket->fechacierre;
        $this->remedy               = $this->osticket->remedy;
        $this->detalle              = $this->osticket->detalle;
        $this->cierre               = $this->osticket->cierre;
        $this->categoria            = $this->osticket->categoria;
        $this->resultadoslap        = $this->osticket->resultadoslap;
        $this->resultadoslar        = $this->osticket->resultadoslar;
        $this->osticket_id          =   $osticket_id;
    }

    public function submit() {
        $this->rules['siom'] = 'required|unique:ostickets,siom,' . $this->osticket->id;
        $this->validate();      // aplica las validaciones del array $RULES
        $preFechaAsignacion = null;
        $preFechaLlegada = null;
        $proFechaCierre = null;

        if (!empty($this->fechaasignacion)) $preFechaAsignacion=Carbon::parse($this->fechaasignacion)->format('Y-m-d H:i:s');
        if (!empty($this->fechallegada)) $preFechaLlegada=Carbon::parse($this->fechallegada)->format('Y-m-d H:i:s');
        if (!empty($this->fechacierre)) $proFechaCierre=Carbon::parse($this->fechacierre)->format('Y-m-d H:i:s');

        $this->osticket->update([
            'site_id'           => $this->site_id,
            'siom'              => $this->siom,
            'estado'            => $this->estado,
            'tipo'              => $this->tipo,
            'fechaasignacion'   => $preFechaAsignacion,
            'fechallegada'      => $preFechaLlegada,
            'fechacierre'       => $proFechaCierre,
            'remedy'            => $this->remedy,
            'detalle'           => $this->detalle,
            'cierre'            => $this->cierre,
            'categoria'         => $this->categoria,
            'resultadoslap'     => $this->resultadoslap,
            'resultadoslar'     => $this->resultadoslar,
        ]);
        $this->emit('alertOk', 'Actualizado');
    }

    public function render() {
        // $roles = Role::all();
        return view('livewire.ostickets.edit-ostickets');
    }

    public function updateAction() {

        $this->action->save();
        $this->reset(['open_editaction']);
        $this->emit('alertOk', 'Editado');
    }

    public function editAction(Action $action) {
        $this->action = $action;
        $this->open_editaction = true;
    }

    public function deleteAction(Action $action) {
        $action->delete();
        $this->refrescar();
    }


    // public function deleteClockstop(Clockstop $clockstop) {
    //     $clockstop->delete();
    //     $this->refrescar();
    // }

    public function refrescar() {
        $osticket =         Osticket::findOrFail($this->item);
        $osticket_id  =     $osticket->id;
        $actiontable =           Action::select('actions.*')->where('osticket_id', '=', $this->item)->orderby('created_at', 'desc')->get();
        $clockstop =        Clockstop::select('clockstops.*')->where('osticket_id', '=', $this->item )->orderby('inicio', 'asc')->get();
        $lastclockstop =    Clockstop::select('clockstops.*')->where('osticket_id', '=', $this->item )->orderby('inicio', 'desc')->first();

        $this->actiontable = $actiontable;
        $this->osticket = $osticket;
        $this->clockstop = $clockstop;
        $this->lastclockstop = $lastclockstop;

        $this->site_id              = $this->osticket->site_id;
        $this->siom                 = $this->osticket->siom;
        $this->estado               = $this->osticket->estado;
        $this->tipo                 = $this->osticket->tipo;
        $this->fechaasignacion      = $this->osticket->fechaasignacion;
        $this->fechallegada         = $this->osticket->fechallegada;
        $this->fechacierre          = $this->osticket->fechacierre;
        $this->remedy               = $this->osticket->remedy;
        $this->detalle              = $this->osticket->detalle;
        $this->cierre               = $this->osticket->cierre;
        $this->categoria            = $this->osticket->categoria;
        $this->resultadoslap        = $this->osticket->resultadoslap;
        $this->resultadoslar        = $this->osticket->resultadoslar;
        $this->osticket_id          =   $osticket_id;
    }

    

}
