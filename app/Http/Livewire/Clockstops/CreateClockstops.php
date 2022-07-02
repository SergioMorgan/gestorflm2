<?php

namespace App\Http\Livewire\Clockstops;

use App\Models\Clockstop;
use Livewire\Component;

class CreateClockstops extends Component
{
    public $osticket_id;
    public $open = false;           //para controlar reseteo de campos, se establece con SET desde el html
    public $inicio = "2022-06-05 15:00:00";
    public $fin;
    public $sustento = "texto de prueba";    //variables para cada campo que vamos a llenar
    //esta constante tambien esta definida en CreateOsTickets
    public $selectMotivo = ["CORTE DE ENERGÍA COMERCIAL CON/SIN INSTALACIÓN DE GE", "FENOMENOS NATURALES", "FUERA DE HORA PARA SUBIR A TORRE", "OBRA COMPLEMENTARIA", "REPUESTOS ENERGIA POR IMPORTACIÓN", "REPUESTOS ENERGIA POR OBSOLESCENCIA", "REPUESTOS RADIO", "REPUESTOS TRANSMISIONES", "SIN ACCESO POR HUELGA / BLOQUEO / ZONA PELIGROSA",  "SIN ACCESO POR INDISPONIBILIDAD DE LLAVES",  "SIN ACCESO POR INSTITUCIÓN PÚBLICA O PRIVADA", "SIN ACCESO POR PROCEDIMIENTOS DE SEGURIDAD TDP/TORRERA/OPERADOR (SITIO COUBICADO)", "SIN ACCESO POR PROPIETARIO NO UBICABLE Y/O DISPONIBLE", "SOPORTE TDP", "SOPORTE TERCEROS", "TRASLADO EXTREMO DE ENLACE" ];
    public $motivo = 'CORTE DE ENERGÍA COMERCIAL CON/SIN INSTALACIÓN DE GE';      //VALOR POR DEFECTO del campo, para prevenir posibles llenados vacios
    // public $motivo = $selectMotivo[1];  //NO FUNCIONA

    public function mount($osticket_id)
    {
        $this->osticket_id = $osticket_id;
    }

    // protected $listeners = ['render' => 'render' ];
    // protected $listeners = ['render', 'delete' ];

    // Aca se definen las reglas, FALTA CAMBIAR A PROTECTED FUNCION (evaluar si es necesario)
    protected $rules = [
        'inicio'    => 'required',
        'motivo'    => 'required',
        'sustento'  => 'required',
    ];

    // Guarda los valores ingresados en el formulario
    public function save() {
        $this->validate();
        Clockstop::create([
            'inicio'    => $this->inicio,
            'fin'       => $this->fin,
            'motivo'    => $this->motivo,
            'sustento'  => $this->sustento,
            'osticket_id'  => $this->osticket_id,
        ]);
        $this->reset(['open', 'inicio', 'fin', 'motivo',  'sustento']);
        $this->emitTo('ostickets.create-ostickets', 'refrescar');
        $this->emit('alertOk', 'Registro creado correctamente');
    }

    // El render recargara eñ formulario asociado, en este caso el html que le corresponde
    public function render() {
        return view('livewire.clockstops.create-clockstops');
    }

    //el metodo updating se pone antes del valor de la variable, paa ejecutar esto antes de que cambie de valor
    // EXPLICACION SUJETA A REVISION;
    public function updatingOpen() {
        if ($this->open == false) {
            $this->reset(['inicio', 'fin','motivo', 'sustento']);
        }
    }
}
