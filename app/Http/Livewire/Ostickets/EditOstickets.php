<?php

namespace App\Http\Livewire\Ostickets;

use App\Models\Action;
use App\Models\Clockstop;
use App\Models\Osticket;
use App\Models\Site;
use Carbon\Carbon;
use Livewire\Component;

class EditOstickets extends Component
{
    protected $listeners = ['refrescar', 'deleteClockStop', 'deleteAction'];

    public $open_editaction = false;
    public $open_editclockstop = false;
    public $colorEtiquetas = 'bg-green-300';  //estilos del formulario (color fondo etiquetas)
    public $item;   //para identificar el elemento a editar
    public $osticket;
    public $actiontable, $clockstoptable, $lastclockstop;   //para almacenar la instancia (registro) de la BBDD
    public $action;
    public $osticket_id;
    public $inicio, $fin, $motivo, $sustento;
    public $site_id, $siom, $estado, $tipo, $fechaasignacion, $fechallegada, $fechacierre, $remedy, $detalle, $cierre, $categoria, $resultadoslap, $resultadoslar;
    public $user_id;
    public $selectEstado = ['PENDIENTE', 'CERRADO', 'ANULADO', 'RECHAZADO'];
    public $selectTipo = ['ENERGIA', 'RADIO', 'TRANSPORTE'];
    public $selectCategoria = ["ABASTECIMIENTO COMBUSTIBLE", "CAMBIO DE EQUIPO / REPARACION / REPUESTO / CONSUMIBLE", "CESE AUTOMATICO", "CORTE DE ENERGIA Y CESE AUTOMATICO", "DESCARTE, NO CORRESPONDE", "FALSA ALARMA", "INSTALACION DE GE O BATERIAS", "REVISION / RESET / AJUSTES / LIMPIEZA"];
    public $selectResultado = ['DENTRO', 'FUERA', 'N.A.'];
    //selectmotivo tambien esta definida en createclockstops
    public $selectMotivo = ["CORTE DE ENERGÍA COMERCIAL CON/SIN INSTALACIÓN DE GE", "FENOMENOS NATURALES", "FUERA DE HORA PARA SUBIR A TORRE", "OBRA COMPLEMENTARIA", "REPUESTOS ENERGIA POR IMPORTACIÓN", "REPUESTOS ENERGIA POR OBSOLESCENCIA", "REPUESTOS RADIO", "REPUESTOS TRANSMISIONES", "SIN ACCESO POR HUELGA / BLOQUEO / ZONA PELIGROSA",  "SIN ACCESO POR INDISPONIBILIDAD DE LLAVES",  "SIN ACCESO POR INSTITUCIÓN PÚBLICA O PRIVADA", "SIN ACCESO POR PROCEDIMIENTOS DE SEGURIDAD TDP/TORRERA/OPERADOR (SITIO COUBICADO)", "SIN ACCESO POR PROPIETARIO NO UBICABLE Y/O DISPONIBLE", "SOPORTE TDP", "SOPORTE TERCEROS", "TRASLADO EXTREMO DE ENLACE" ];


     //Reglas de validacion FALTA EXTENDER
    protected $rules = [
        'site_id'               => 'required',
        'siom'                  => 'required|unique:ostickets,siom',
        'estado'                => 'required',
        'tipo'                  => 'required',
        'fechaasignacion'       => 'required',
        'fechallegada'          => 'nullable',
        'fechacierre'           => 'nullable',
        'remedy'                => 'nullable',
        'detalle'               => 'nullable',
        'cierre'                => 'nullable',
        'categoria'             => 'nullable',
        'resultadoslap'         => 'nullable',
        'resultadoslar'         => 'nullable',
        'action.detalle'        => 'nullable',
        'clockstop.inicio'      => 'nullable',
        'clockstop.fin'         => 'nullable',
        'clockstop.motivo'      => 'nullable',
        'clockstop.sustento'    => 'nullable',
    ];

    public function mount($item = null) {
        $this->init($item);
    }

    public function init($item) {
        $osticket       = null;
        $actiontable    = null;
        $lastclockstop  = null;
        $clockstoptable = null;

        $osticket                   = Osticket::findOrFail($item);
        $localasociado              = Site::findOrFail($osticket->site_id);
        $osticket_id                = $osticket->id;
        // $actiontable                = Action::select('actions.*')->where('osticket_id', '=', $this->item )->orderby('created_at', 'desc')->get();
        $actiontable                       = Action::select('actions.*','users.name')->join('users', 'users.id', '=', 'actions.user_id')->where('osticket_id', '=', $this->item )->orderby('created_at', 'desc')->get();
        // $tabulatorsHistory = DB::table('cat_tabulator_histories')
        // ->where('id_tabulator', $tabulatorOriginal->name)
        // ->join('cat_contract_types', 'cat_contract_types.id', '=', 'cat_tabulator_histories.cat_contract_type_id')
        // ->join('cat_sub_contract_types', 'cat_sub_contract_types.id', '=', 'cat_tabulator_histories.sub_contract_type_id')
        // ->select('cat_tabulator_histories.id as id', 'cat_tabulator_histories.id_tabulator as name', 'cat_tabulator_histories.base_salary_cents as salary_cents', 'cat_tabulator_histories.compensation_cents as compensation_cents', 'cat_tabulator_histories.is_active as active', 'cat_tabulator_histories.created_at as created_at', 'cat_tabulator_histories.date_active as date_active', 'cat_contract_types.name as type_contract', 'cat_sub_contract_types.name as type_subcontract')
        // ->orderBy('cat_tabulator_histories.updated_at', 'desc')
        // ->get();

        $clockstoptable             = Clockstop::select('clockstops.*')->where('osticket_id', '=', $this->item )->orderby('inicio', 'desc')->get();
        $lastclockstop              = Clockstop::select('clockstops.*')->where('osticket_id', '=', $this->item )->orderby('inicio', 'desc')->first();
        $this->actiontable          = $actiontable;
        $this->osticket             = $osticket;
        $this->clockstoptable       = $clockstoptable;
        $this->lastclockstop        = $lastclockstop;
        
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
        $this->osticket_id          = $osticket_id;
        
        $this->localzonal = $localasociado->zonal;
        $this->localnombre = $localasociado->nombre;
        $this->localslap = $localasociado->slapresencia . ' DENTRO';
        $this->localslar = $localasociado->slaresolucion. ' FUERA';
        $this->localprioridad = $localasociado->prioridad;
    }

    public function refrescar() {
        $osticket                   = Osticket::findOrFail($this->item);
        $osticket_id                = $osticket->id;
        $actiontable                = Action::select('actions.*')->where('osticket_id', '=', $this->item )->orderby('created_at', 'desc')->get();
        $clockstoptable             = Clockstop::select('clockstops.*')->where('osticket_id', '=', $this->item )->orderby('inicio', 'desc')->get();
        $lastclockstop              = Clockstop::select('clockstops.*')->where('osticket_id', '=', $this->item )->orderby('inicio', 'desc')->first();
        $this->actiontable          = $actiontable;
        $this->osticket             = $osticket;
        $this->clockstoptable       = $clockstoptable;
        $this->lastclockstop        = $lastclockstop;

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
        $this->osticket_id          = $osticket_id;
    }


    public function submit() {
        $this->rules['siom'] = 'required|unique:ostickets,siom,' . $this->osticket->id;
        unset($this->rules['clockstop.inicio'], $this->rules['clockstop.fin'], $this->rules['clockstop.motivo'], $this->rules['clockstop.sustento']);

        $this->validate();
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
        $this->refrescar();
    }

    public function editAction(Action $action) {
        $this->action = $action;
        $this->open_editaction = true;
        $this->refrescar();
    }

    public function deleteAction(Action $action) {
        $action->delete();
        $this->refrescar();
    }


    public function updateClockstop() {
        if (empty($this->inicio)) $this->inicio=null;
        if (empty($this->clockstop->fin)) $this->clockstop->fin=null;
        $this->clockstop->save();  
        $this->reset(['open_editclockstop']);
        $this->emit('alertOk', 'Editado');
        $this->refrescar();
    }

    public function editClockstop(Clockstop $clockstop) {
        $this->clockstop = $clockstop;
        $this->open_editclockstop = true;
        $this->refrescar();
    }

    public function deleteClockStop(Clockstop $clockstop) {
        $clockstop->delete();
        $this->refrescar();
    }

}
