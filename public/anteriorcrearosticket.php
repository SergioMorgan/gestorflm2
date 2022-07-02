<?php

namespace App\Http\Livewire\Ostickets;

use App\Models\Action;
use App\Models\Clockstop;
use App\Models\Osticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditOstickets extends Component
{
    public $open = false;
    // public $open_edit = false;
    public $item;   //para identificar el elemento a editar
    public $osticket, $action, $clockstop, $lastclockstop;   //para almacenar la instancia (registro) de la BBDD
    public $colorEtiquetas = 'bg-green-300';  //estilos del formulario (color fondo etiquetas)
    
    // Inicializar los campos de la tabla
    public $osticket_id;
    public $site_id, $siom, $estado, $tipo, $fechaasignacion, $fechallegada, $fechacierre, $remedy, $detalle, $cierre, $categoria, $resultadoslap, $resultadoslar;
    public $user_id;

    // Inicializar los valores de los controles SELECT del formulario
    public $selectEstado = ['PENDIENTE', 'CERRADO', 'ANULADO', 'RECHAZADO'];
    public $selectTipo = ['ENERGIA', 'RADIO', 'TRANSPORTE'];
    public $selectCategoria = ["ABASTECIMIENTO COMBUSTIBLE", "CAMBIO DE EQUIPO / REPARACION / REPUESTO / CONSUMIBLE", "CESE AUTOMATICO", "CORTE DE ENERGIA Y CESE AUTOMATICO", "DESCARTE, NO CORRESPONDE", "FALSA ALARMA", "INSTALACION DE GE O BATERIAS", "REVISION / RESET / AJUSTES / LIMPIEZA"];
    public $selectResultado = ['DENTRO', 'FUERA', 'N.A.'];

    protected $listeners = ['refrescar', 'deleteClockstop'];

    //Reglas de validacion FALTA EXTENDER
    protected $rules = [
        'site_id'           => 'required',
        'siom'              => 'required|unique:ostickets,siom',
        'estado'            => 'required|',
        'tipo'              => 'required',
        'fechaasignacion'   => 'required|date',
        'fechallegada'      => 'nullable|date',
        'fechacierre'       => 'nullable|date',
    ];

    // Equivale a constructo, recibe la variable item (elemento a modificar en caso sea EDIT)
    public function mount($item = null) {
        $this->init($item);
    }
    // La primera funcion al ejecutarse, recibe como parametro el valor de item
    public function init($item) {
        $osticket       = null;       //inicializar la instancia de site
        $action         = null;
        $lastclockstop  = null;
        $clockstop      = null;
        // si hay un valor en item, busca el registro correspondiente y lo guarda en $xxxx
        if ($item) {
            $osticket =         Osticket::findOrFail($item);
            $osticket_id  =     $osticket->id;
            $action =           Action::select('actions.*')->where('osticket_id', '=', $this->item )->get();
            $clockstop =        Clockstop::select('clockstops.*')->where('osticket_id', '=', $this->item )->orderby('inicio', 'asc')->get();
            $lastclockstop =    Clockstop::select('clockstops.*')->where('osticket_id', '=', $this->item )->orderby('inicio', 'desc')->first();
        }
        // Asigna el registro encontrado a site. Este será NULL si no ha encontrado registro o no se ha pasado parametros
        $this->action = $action;
        $this->osticket = $osticket;
        $this->clockstop = $clockstop;
        $this->lastclockstop = $lastclockstop;

        // Si estamos en modo edicion (se ha enviado un parametro item)
        if ($this->osticket) {          // asigna los valores de los campos a las variables locales creadas
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

    // funcion principal para agregar o modificar datos en la BBDD
    public function submit() {
        // Si se trata de una edicion, modificar la regla para que no de error al validar localid como campo unico
        // aplicar para todos los campos con regla UNIQUE
        if ($this->osticket)
            $this->rules['siom'] = 'required|unique:ostickets,siom,' . $this->osticket->id;

        $this->validate();      // aplica las validaciones del array $RULES

        // Si estamos en modo edicion (se ha enviado un parametro item en la funcion init() )
        if ($this->osticket) {
            $this->osticket->update([

            //actualiza los valores de la BBDD segun lo valores del formulario
            'site_id'           => $this->site_id,
            'siom'              => $this->siom,
            'estado'            => $this->estado,
            'tipo'              => $this->tipo,
            'fechaasignacion'   => $this->fechaasignacion,
            'fechallegada'      => $this->fechallegada,
            'fechacierre'       => $this->fechacierre,
            'remedy'            => $this->remedy,
            'detalle'           => $this->detalle,
            'cierre'            => $this->cierre,
            'categoria'         => $this->categoria,
            'resultadoslap'     => $this->resultadoslap,
            'resultadoslar'     => $this->resultadoslar,

            ]);
            $this->emit('alertOk', 'Actualizado');

        //Si estamos en modo creacion (no se ha enviado parametro item en la funcion init() ))
        } else {
            Osticket::create([          //actualiza los valores de la BBDD segun lo valores del formulario
                'site_id'           => $this->site_id,
                'user_id'           => Auth::user()->id,
                'siom'              => $this->siom,
                'estado'            => $this->estado,
                'tipo'              => $this->tipo,
                'fechaasignacion'   => $this->fechaasignacion,
                'fechallegada'      => $this->fechallegada,
                'fechacierre'       => $this->fechacierre,
                'remedy'            => $this->remedy,
                'detalle'           => $this->detalle,
                'cierre'            => $this->cierre,
                'categoria'         => $this->categoria,
                'resultadoslap'     => $this->resultadoslap,
                'resultadoslar'     => $this->resultadoslar,
            ]);
            $this->emit('alertOk', 'Registro creado');
        }
    }

    public function render()
    {
        // $roles = Role::all();
        return view('livewire.ostickets.edit-ostickets');
    }

    public function deleteClockstop(Clockstop $clockstop) {
        $clockstop->delete();
        $this->refrescar();
    }

    public function refrescar() {

        $osticket =         Osticket::findOrFail($this->item);
        // dd($osticket);
        $osticket_id  =     $osticket->id;
        $action =           Action::select('actions.*')->where('osticket_id', '=', $this->item )->get();
        $clockstop =        Clockstop::select('clockstops.*')->where('osticket_id', '=', $this->item )->orderby('inicio', 'asc')->get();
        $lastclockstop =    Clockstop::select('clockstops.*')->where('osticket_id', '=', $this->item )->orderby('inicio', 'desc')->first();

        // Asigna el registro encontrado a site. Este será NULL si no ha encontrado registro o no se ha pasado parametros
        $this->action = $action;
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
