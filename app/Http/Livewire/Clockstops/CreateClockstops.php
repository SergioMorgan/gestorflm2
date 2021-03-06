<?php

namespace App\Http\Livewire\Clockstops;

use App\Models\Clockstop;
use Livewire\Component;

class CreateClockstops extends Component
{
    public $osticket_id, $fechaasignacion;
    public $open = false;
    public $inicio;
    public $fin;
    public $sustento;
    //selectmotivo tambien esta definida en editosticktes
    public $selectMotivo = ["CORTE DE ENERGÍA COMERCIAL CON/SIN INSTALACIÓN DE GE", "FENOMENOS NATURALES", "FUERA DE HORA PARA SUBIR A TORRE", "OBRA COMPLEMENTARIA", "REPUESTOS ENERGIA POR IMPORTACIÓN", "REPUESTOS ENERGIA POR OBSOLESCENCIA", "REPUESTOS RADIO", "REPUESTOS TRANSMISIONES", "SIN ACCESO POR HUELGA / BLOQUEO / ZONA PELIGROSA",  "SIN ACCESO POR INDISPONIBILIDAD DE LLAVES",  "SIN ACCESO POR INSTITUCIÓN PÚBLICA O PRIVADA", "SIN ACCESO POR PROCEDIMIENTOS DE SEGURIDAD TDP/TORRERA/OPERADOR (SITIO COUBICADO)", "SIN ACCESO POR PROPIETARIO NO UBICABLE Y/O DISPONIBLE", "SOPORTE TDP", "SOPORTE TERCEROS", "TRASLADO EXTREMO DE ENLACE" ];
    public $motivo = 'CORTE DE ENERGÍA COMERCIAL CON/SIN INSTALACIÓN DE GE';      //VALOR POR DEFECTO del campo, para prevenir posibles llenados vacios
    // public $motivo = $selectMotivo[1];  //NO FUNCIONA

    public function mount($osticket_id, $fechaasignacion) {
        $this->osticket_id = $osticket_id;
        $this->fechaasignacion = $fechaasignacion;
    }

    protected $rules = [
        'inicio'    => 'required|date|required_with:fin',
        'fin'       => 'nullable|date|after:inicio',
        'motivo'    => 'required',
        'sustento'  => 'required',
    ];

    public function save() {
        $this->validate();
        $lastclockstop = Clockstop::select('clockstops.*')->where('osticket_id', '=', $this->osticket_id )->orderby('inicio', 'desc')->first();

        // permite guadar si no hay PR anterior O la PR anterior esta cerrada y el inicio de la actual es mayor al cierre anterior, Y
        // la fecha de inicio de PR es mayor a la fecha de inicio del ticket

        If ((empty($lastclockstop->inicio) || (!empty($lastclockstop->fin && date('Y-m-d H:i', strtotime($this->inicio)) > date('Y-m-d H:i', strtotime($lastclockstop->fin))))) &&
            (date('Y-m-d H:i', strtotime($this->inicio)) > date('Y-m-d H:i', strtotime($this->fechaasignacion)))
            ) {
            if (empty($this->fin)) $this->fin = null;
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
        } else {
            $this->emit('alertOk', 'Error de continuidad de PR');
        }
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
