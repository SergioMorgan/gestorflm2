<?php

namespace App\Http\Livewire\Actions;

use App\Models\Action;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateActions extends Component
{

    public $open = false;
    public $osticket_id, $user_id, $detalle;

    protected $rules = [
        'osticket_id'  => 'required',
        'user_id'      => 'required',
        'detalle'      => 'required',
    ];

    public function save() {
        Action::create([
            'osticket_id'   => $this->osticket_id,
            'user_id'       => Auth::user()->id,
            'detalle'       => $this->detalle,
        ]);

        $this->reset(['open', 'detalle']);
        $this->emitTo('ostickets.edit-ostickets', 'refrescar');
        $this->emit('alertOk', 'Actuacion registrada');
    }

    //el metodo updating se pone antes del valor de la variable, paa ejecutar esto antes de que cambie de valor
    // EXPLICACION SUJETA A REVISION;
    public function updatingOpen() {
        if ($this->open == false) {
            $this->reset(['detalle']);
        }
    }

    public function render()    {
        return view('livewire.actions.create-actions');
    }
}
