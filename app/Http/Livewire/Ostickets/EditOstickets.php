<?php

namespace App\Http\Livewire\Ostickets;

use App\Models\Action;
use App\Models\Clockstop;
use App\Models\Osticket;
use App\Models\Site;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditOstickets extends Component
{
    protected $listeners = ['refrescar', 'deleteClockStop', 'deleteAction'];
    public $finanteriorpr    = null;
    public $iniciosiguientepr= null;
    public $open_editaction = false;
    public $open_editclockstop = false;
    public $open_details = false;
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
    public $selectMotivo = ["CORTE DE ENERGÍA COMERCIAL CON/SIN INSTALACIÓN DE GE", "FENOMENOS NATURALES", "FUERA DE HORA PARA SUBIR A TORRE", "OBRA COMPLEMENTARIA", "REPUESTOS ENERGIA POR IMPORTACIÓN", "REPUESTOS ENERGIA POR OBSOLESCENCIA", "REPUESTOS RADIO", "REPUESTOS TRANSMISIONES", "SIN ACCESO POR HUELGA / BLOQUEO / ZONA PELIGROSA",  "SIN ACCESO POR INDISPONIBILIDAD DE LLAVES",  "SIN ACCESO POR INSTITUCIÓN PÚBLICA O PRIVADA", "SIN ACCESO POR PROCEDIMIENTOS DE SEGURIDAD TDP/TORRERA/OPERADOR (SITIO COUBICADO)", "SIN ACCESO POR PROPIETARIO NO UBICABLE Y/O DISPONIBLE", "SOPORTE TDP", "SOPORTE TERCEROS", "TRASLADO EXTREMO DE ENLACE"];


    //Reglas de validacion FALTA EXTENDER
    protected $rules = [
        'site_id'               => 'required',
        'siom'                  => 'required|unique:ostickets,siom',
        'estado'                => 'required',
        'tipo'                  => 'required',
        'fechaasignacion'       => 'required',
        'fechallegada'          => 'nullable|date|after:fechaasignacion|required_with:fechacierre',
        'fechacierre'           => 'nullable|date|after:fechaasignacion|after:fechallegada',
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
        $clockstoptable = null;
        // $clockstoptableaux = null;

        $osticket                   = Osticket::findOrFail($item);
        $localasociado              = Site::findOrFail($osticket->site_id);
        $osticket_id                = $osticket->id;
        $actiontable                = Action::select('actions.*', 'users.name')->join('users', 'users.id', '=', 'actions.user_id')->where('osticket_id', '=', $this->item)->orderby('created_at', 'desc')->get();
        // $clockstoptable             = Clockstop::select('clockstops.*')->where('osticket_id', '=', $this->item)->orderby('inicio', 'desc')->get();

        $clockstoptable             = Clockstop::select(Clockstop::raw("id, inicio, fin, motivo, sustento, TIMESTAMPDIFF(second, inicio, (if(fin is null, convert_tz(now(), '+00:00','+00:00'), fin))) AS duracion"))
                                        ->where('osticket_id', '=', $this->item)->orderby('inicio', 'desc')->get();
        // dd($clockstoptable );
        $clockstopresults           = Clockstop::select(Clockstop::raw("count(distinct id) as cantidadpr, TIME_FORMAT(SEC_TO_TIME(sum(TIMESTAMPDIFF(second, inicio, (if(fin is null, convert_tz(now(), '+00:00','+00:00'), fin))))),'%H:%i') as duracionpr, sum(TIMESTAMPDIFF(second, inicio, (if(fin is null, convert_tz(now(), '+00:00','+00:00'), fin)))) as duracionprseg "))
                                        ->where('osticket_id', '=', $this->item)->orderby('inicio', 'desc')->get();
        // dd($clockstopresults);
        $this->actiontable          = $actiontable;
        $this->osticket             = $osticket;
        $this->clockstoptable       = $clockstoptable;
        $this->clockstopresults     = $clockstopresults;
        // dump($clockstopresults);
        $duracionticket = Carbon::parse($this->osticket->fechaasignacion)->diffInHours(Carbon::parse($this->osticket->fechacierre)) . ':' . Carbon::parse($this->osticket->fechaasignacion)->diff(Carbon::parse($this->osticket->fechacierre))->format('%I');
        $duracionticket2 = Carbon::parse($this->osticket->fechaasignacion)->diffInMinutes(Carbon::parse($this->osticket->fechacierre));

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
        $this->duracionticket       = $duracionticket;
        $this->cantidadpr           = $this->clockstopresults[0]->cantidadpr;
        $this->duracionprseg        = $this->clockstopresults[0]->duracionprseg;
        // dd($this->duracionprseg);
        $this->duracionprmin        = $this->clockstopresults[0]->duracionprmin;
        // dump($this->duracionpr, $this->duracionticket);
        // dump($this->duracionprmin, $duracionticket2);
        // dump($this->duracionprmin + $duracionticket2);

        $this->localzonal = $localasociado->zonal;
        $this->localnombre = $localasociado->nombre;
        $this->localslap = $localasociado->slapresencia;
        $this->localslar = $localasociado->slaresolucion;
        $this->localprioridad = $localasociado->prioridad;
;
    }

    public function refrescar() {
        // $osticket                   = Osticket::findOrFail($this->item);
        // $localasociado              = Site::findOrFail($osticket->site_id);
        // $osticket_id                = $osticket->id;
        // $actiontable                = Action::select('actions.*', 'users.name')->join('users', 'users.id', '=', 'actions.user_id')->where('osticket_id', '=', $this->item)->orderby('created_at', 'desc')->get();
        // $this->actiontable          = $actiontable;
        // $this->osticket             = $osticket;

        // $this->site_id              = $this->osticket->site_id;
        // $this->siom                 = $this->osticket->siom;
        // $this->estado               = $this->osticket->estado;
        // $this->tipo                 = $this->osticket->tipo;
        // $this->fechaasignacion      = $this->osticket->fechaasignacion;
        // $this->fechallegada         = $this->osticket->fechallegada;
        // $this->fechacierre          = $this->osticket->fechacierre;
        // $this->remedy               = $this->osticket->remedy;
        // $this->detalle              = $this->osticket->detalle;
        // $this->cierre               = $this->osticket->cierre;
        // $this->categoria            = $this->osticket->categoria;
        // $this->resultadoslap        = $this->osticket->resultadoslap;
        // $this->resultadoslar        = $this->osticket->resultadoslar;
        // $this->osticket_id          = $osticket_id;

        // $this->localzonal = $localasociado->zonal;
        // $this->localnombre = $localasociado->nombre;
        // $this->localslap = $localasociado->slapresencia . ' DENTRO';
        // $this->localslar = $localasociado->slaresolucion . ' FUERA';
        // $this->localprioridad = $localasociado->prioridad;
    }


    public function submit() {
        $this->rules['siom'] = 'required|unique:ostickets,siom,' . $this->osticket->id;
        unset($this->rules['clockstop.inicio'], $this->rules['clockstop.fin'], $this->rules['clockstop.motivo'], $this->rules['clockstop.sustento']);
        $this->validate();
        $preFechaAsignacion = null;
        $preFechaLlegada = null;
        $preFechaCierre = null;
        
        $usuario = auth()->user();
        $user1 = $usuario->roles[0]->name;
        // foreach($usuario->roles as $role) {
        //     dump($role->name);
        // }

        // dd($user1, $usuario);

        if (!empty($this->fechaasignacion)) $preFechaAsignacion = Carbon::parse($this->fechaasignacion)->format('Y-m-d H:i:s');
        if (!empty($this->fechallegada)) $preFechaLlegada = Carbon::parse($this->fechallegada)->format('Y-m-d H:i:s');
        if (!empty($this->fechacierre)) $preFechaCierre = Carbon::parse($this->fechacierre)->format('Y-m-d H:i:s');

        // if (empty($this->fechallegada)) 

        // if (!empty($this->fechacierre)) {
        //     if ((!empty($this->fechallegada) && $this->fechacierre < $this->fechallegada) || (empty($this->fechallegada)))
        //         dd($this->fechallegada, $preFechaLlegada);    
        //         $this->emit('alertOk', 'Revisar consistencia de fecha de cierre', 'error');
        //     } else {
        //         dump($this->fechaasignacion, $this->fechallegada, $this->fechacierre);
        //         dump($preFechaAsignacion, $preFechaLlegada, $preFechaCierre);
        //         $preFechaCierre = Carbon::parse($this->fechacierre)->format('Y-m-d H:i:s');
        //     }

        // if (!empty($this->fechacierre)) $preFechaCierre = Carbon::parse($this->fechacierre)->format('Y-m-d H:i:s');

        // dump($preFechaAsignacion, $preFechaLlegada, $preFechaCierre, $preFechaLlegada < $preFechaCierre);

        $this->osticket->update([
            'site_id'           => $this->site_id,
            'siom'              => $this->siom,
            'estado'            => $this->estado,
            'tipo'              => $this->tipo,
            'fechaasignacion'   => $preFechaAsignacion,
            'fechallegada'      => $preFechaLlegada,
            'fechacierre'       => $preFechaCierre,
            'remedy'            => $this->remedy,
            'detalle'           => $this->detalle,
            'cierre'            => $this->cierre,
            'categoria'         => $this->categoria,
            'resultadoslap'     => $this->resultadoslap,
            'resultadoslar'     => $this->resultadoslar,
        ]);
        $this->emit('alertOk', 'Actualizado', 'success');
    }

    public function render() {
        // $roles = Role::all();
        return view('livewire.ostickets.edit-ostickets');
    }

    public function updateAction() {
        $this->action->save();
        $this->reset(['open_editaction']);
        $this->emit('alertOk', 'Editado', 'success');
        $this->refrescar();
    }

    public function editAction(Action $action) {
        $this->action = $action;
        $this->open_editaction = true;
    }

    public function deleteAction(Action $action) {
        $action->delete();
        $this->refrescar();
    }

    public function editClockstop(Clockstop $clockstop) {
        $this->clockstop = $clockstop;
        $this->open_editclockstop = true;
        $this->finanteriorpr      = empty($this->clockstoptable->where('inicio', '<', $this->clockstop->inicio)->sortByDesc('inicio')->first())  ? null : $this->clockstoptable->where('inicio', '<', $this->clockstop->inicio)->sortByDesc('inicio')->first()->fin;
        $this->iniciosiguientepr = empty($this->clockstoptable->where('inicio', '>', $this->clockstop->inicio)->sortByDesc('inicio')->last()) ? null : $this->clockstoptable->where('inicio', '>', $this->clockstop->inicio)->sortByDesc('inicio')->first()->inicio;
    }

    public function updateClockstop() {
        // dd($this->finanteriorp);
        if ($this->clockstop->fin < $this->clockstop->inicio && !empty($this->clockstop->fin)) {
            $this->emit('alertOk', 'Fecha fin debe ser mayor a inicio', 'error');
        } elseif (  (empty($this->finanteriorpr)            || date('Y-m-d H:i', strtotime($this->finanteriorpr)) < date('Y-m-d H:i', strtotime($this->clockstop->inicio))) &&
                    (empty($this->iniciosiguientepr)        || date('Y-m-d H:i', strtotime($this->iniciosiguientepr)) > date('Y-m-d H:i', strtotime($this->clockstop->fin))) &&
                    (empty($this->osticket->fechacierre)    || date('Y-m-d H:i', strtotime($this->osticket->fechacierre)) > date('Y-m-d H:i', strtotime($this->clockstop->fin)))
                ) {
            if (empty($this->inicio)) $this->inicio = null;
            if (empty($this->clockstop->fin)) $this->clockstop->fin = null;
            $this->clockstop->save();
            $this->reset(['open_editclockstop']);
            $this->emit('alertOk', 'Editado', 'success');
            $this->refrescar();
        } else {
            $this->emit('alertOk', 'Error con fecha inicio', 'error');
        }
    }

    public function deleteClockStop(Clockstop $clockstop) {
        $clockstop->delete();
        $this->refrescar();
    }

    public function copiarDetalles() {
        $this->open_details = true;
        // dd($this->osticket->detalle, $this->detalle, $saludo);
        // $this->pruebadetalle = $saludo;
        $this->pruebadetalle =  '*Siom:* ' . $this->siom . PHP_EOL . 
                                '*Zonal:* ' . $this->localzonal . '  *Local: ' . $this->localnombre . '*' . PHP_EOL . 
                                '*Fecha de inicio:* ' . $this->fechaasignacion . '  *Prioridad:* ' . $this->localprioridad . PHP_EOL . 
                                '*SLA llegada:* ' . $this->localslap . '  *SLA llegada:* ' . $this->localslar . PHP_EOL . PHP_EOL . 
                                '*Detalle:* ' . $this->detalle;
    }
    public function copiarportapapeles() {
        
    }





}
