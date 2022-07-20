<?php

namespace App\Http\Livewire\Ostickets;

use App\Models\Osticket;
use App\Models\Site;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateOstickets extends Component
{
    public $open = false;
    public $site_id, $siom, $tipo, $fechaasignacion, $detalle;
    public $estado = 'PENDIENTE';
    public $user_id = '29';

    public function render()
    {
        $sites = Site::with('ostickets')->orderby('nombre', 'asc')->get();
        // dd($datos);
        // $sites = Site::pluck('localid','id');
        // dd(implode(',', $sites));
        return view('livewire.ostickets.create-ostickets', compact('sites'));
    }

    protected $rules = [
        'site_id'           => 'required',
        // 'site_id'           => 'in:' . implode(',' , $sites),
        'user_id'           => 'required',
        'siom'              => 'required|unique:ostickets,siom',
        'estado'            => 'required',
        'tipo'              => 'required',
        'fechaasignacion'   => 'required',
        'detalle'           => 'required',
    ];

    public function save() {
        $this->validate();
        Osticket::create([
            'site_id'           => $this->site_id,
            'user_id'           => $this->user_id,
            'siom'              => $this->siom,
            'estado'            => $this->estado,
            'tipo'              => $this->tipo,
            'fechaasignacion'   => $this->fechaasignacion,
            'detalle'           => $this->detalle,
        ]);
        $this->reset(['open','site_id','user_id', 'siom', 'estado', 'fechaasignacion', 'detalle']);
        $this->emitTo('ostickets.show-ostickets', 'render');
        $this->emit('alertOk', 'Registro creado correctamente');
    }
    public function updatingOpen() {
        if ($this->open == false) {
            $this->reset(['site_id','user_id', 'siom', 'estado', 'fechaasignacion', 'detalle']);
        }
    }
}