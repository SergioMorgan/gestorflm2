<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSite;
use Spatie\Permission\Models\Role;
use Monolog\Handler\SwiftMailerHandler;

class SiteController extends Controller
{



    // public $site;
    // protected $listeners = ['render'];

    // //Dejar esta funcion, es la que reenvia al controller de ShowXxxx
    // public function index () {
    //     return view('sites.index');
    // }

    // //Reenvia al formulario de creacion
    // public function create () {
    //     return view('sites.create');
    // }

    // //ejecuta el guardado de nuevo registro
    // public function store (StoreSite $request) {
    //     $site = Site::create($request->all());
    //     // $this->emit('alertOk', 'Registro creado correctamente');
    //     return redirect()->route('sites.index');
    // }

    // // reenvia al formulario de edit
    // public function edit(Site $site) {
    //     return view('sites.edit', ['site' => $site]);
    // }

    // //ejecuta la actualizacion de datos
    // public function update(StoreSite $request, Site $site) {
    //     $site->update($request->all());
    //     // $this->emit('alert', 'Registro actualizado correctamente');
    //     return redirect()->route('sites.index');
    // }

    // reglas de validacion para el guardado
    // protected function rules() {
    //     return [
    //     ];
    // }

    //Recibe como parametro la variable $user enviada como $item. Para que identifique la variable
    // como un objeto que equivale a un registro, la indetificamos como  una instancia del modelo USER
    // Edit abre la venta edit-open, mientas que update guarda los cambios en la BBDD
    // public function edit(Site $site) {
    //     $this->site = $site;    // $this->user ya tiene la  informacion del registro
    //     $this->open_edit = true;    //con esto prende la ventan modal
    // }

    // actualiza en la BBDD una vez que se dispara desde el boton de guardar
    // public function update() {
    //     $this->validate();              //ejecuta las validaciones
    //     $this->site->save();            //guardar el registro
    //     $this->reset(['open_edit']);    //resetea los campos (para que al volver a ingresar, se reflejen los cambios)
    //     $this->emit('alertOk', 'Registro guardado correctamente');    //dispara la alerta guardada en app.blade
    // }

    // recibe desde el formulario principal la peticion de borrar a travez del script del sweetalert
    // que manda a ejecutar este evento una vez que se pasa la confirmacion solicitada
    // public function delete(Site $site) {
    //     $site->delete();
    // }
}
