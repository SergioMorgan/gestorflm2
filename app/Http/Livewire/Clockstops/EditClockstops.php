<?php

namespace App\Http\Livewire\Clockstops;

use App\Models\Clockstop;
use Livewire\Component;

class EditClockstops extends Component
{
    public $open = false;
    public $clockstop;
    public $selectMotivo = ["CORTE DE ENERGÍA COMERCIAL CON/SIN INSTALACIÓN DE GE", "FENOMENOS NATURALES", "FUERA DE HORA PARA SUBIR A TORRE", "OBRA COMPLEMENTARIA", "REPUESTOS ENERGIA POR IMPORTACIÓN", "REPUESTOS ENERGIA POR OBSOLESCENCIA", "REPUESTOS RADIO", "REPUESTOS TRANSMISIONES", "SIN ACCESO POR HUELGA / BLOQUEO / ZONA PELIGROSA",  "SIN ACCESO POR INDISPONIBILIDAD DE LLAVES",  "SIN ACCESO POR INSTITUCIÓN PÚBLICA O PRIVADA", "SIN ACCESO POR PROCEDIMIENTOS DE SEGURIDAD TDP/TORRERA/OPERADOR (SITIO COUBICADO)", "SIN ACCESO POR PROPIETARIO NO UBICABLE Y/O DISPONIBLE", "SOPORTE TDP", "SOPORTE TERCEROS", "TRASLADO EXTREMO DE ENLACE" ];

    protected $rules = [
        'clockstop.inicio'            => 'required|date|required_with:fin',
        
        'clockstop.fin'               => 'nullable|date|after:inicio',
        'clockstop.motivo'            => 'required',
        'clockstop.sustento'          => 'required',
    ];

    public function mount(Clockstop $clockstop) {
        $this->clockstop = $clockstop;

    }

    public function editClockstop(Clockstop $clockstop) {
        $this->clockstop = $clockstop;
        $this->open = true;    //con esto prende la ventan modal
    }

    public function updateClockstop() {
        $this->validate();   
        if ($this->clockstop->fin == "") {$this->clockstop->fin = null;};           //ejecuta las validaciones
        $this->clockstop->save();            //guardar el registro
        $this->reset(['open']);    //resetea los campos (para que al volver a ingresar, se reflejen los cambios)
        $this->emitTo('ostickets.create-ostickets', 'refrescar');
        $this->emit('alertOk', 'PR guardado correctamente');    //dispara la alerta guardada en app.blade
    }

    public function render() {
        return view('livewire.clockstops.edit-clockstops');
    }
}
