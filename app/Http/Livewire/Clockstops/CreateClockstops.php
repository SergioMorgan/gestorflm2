<?php

namespace App\Http\Livewire\Clockstops;

use App\Models\Clockstop;
use Livewire\Component;

class CreateClockstops extends Component
{
    public $osticket_id;
    public $open = false;
    public $inicio;
    public $fin;
    public $sustento;
    //selectmotivo tambien esta definida en editosticktes
    public $selectMotivo = ["CORTE DE ENERGÍA COMERCIAL CON/SIN INSTALACIÓN DE GE", "FENOMENOS NATURALES", "FUERA DE HORA PARA SUBIR A TORRE", "OBRA COMPLEMENTARIA", "REPUESTOS ENERGIA POR IMPORTACIÓN", "REPUESTOS ENERGIA POR OBSOLESCENCIA", "REPUESTOS RADIO", "REPUESTOS TRANSMISIONES", "SIN ACCESO POR HUELGA / BLOQUEO / ZONA PELIGROSA",  "SIN ACCESO POR INDISPONIBILIDAD DE LLAVES",  "SIN ACCESO POR INSTITUCIÓN PÚBLICA O PRIVADA", "SIN ACCESO POR PROCEDIMIENTOS DE SEGURIDAD TDP/TORRERA/OPERADOR (SITIO COUBICADO)", "SIN ACCESO POR PROPIETARIO NO UBICABLE Y/O DISPONIBLE", "SOPORTE TDP", "SOPORTE TERCEROS", "TRASLADO EXTREMO DE ENLACE" ];
    public $motivo = 'CORTE DE ENERGÍA COMERCIAL CON/SIN INSTALACIÓN DE GE';      //VALOR POR DEFECTO del campo, para prevenir posibles llenados vacios
    // public $motivo = $selectMotivo[1];  //NO FUNCIONA

    public function mount($osticket_id) {
        $this->osticket_id = $osticket_id;
    }

    // protected $listeners = ['render' => 'render' ];
    // protected $listeners = ['render', 'delete' ];

    protected $rules = [
        'inicio'    => 'required',
        'fin'       => 'nullable',
        'motivo'    => 'required',
        'sustento'  => 'required',
    ];

    public function save() {
        $this->validate();
        Clockstop::create([
            'inicio'        => $this->inicio,
            'fin'           => $this->fin,
            'motivo'        => $this->motivo,
            'sustento'      => $this->sustento,
            'osticket_id'   => $this->osticket_id,
        ]);

        $this->reset(['open', 'inicio', 'fin', 'motivo',  'sustento']);
        $this->emitTo('ostickets.edit-ostickets', 'refrescar');
        $this->emit('alertOk', 'Registro creado correctamente');
    }

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
