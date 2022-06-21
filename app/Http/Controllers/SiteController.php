<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use App\Http\Requests\StoreSite;

class SiteController extends Controller
{
    public function index () {
        $sites = Site::orderBy('created_at', 'desc')->paginate(10);

        // COMPACT convierte el array con variables del mismo nombre en una funcion con un solo parametro
        //  return view('sites.index',compact('sites'));   -> equivale a ->  return view('sites.index',['sites' => $sites]);
        return view('sites.index',['sites' => $sites]);
    }

    public function create () {
        return view('sites.create');    }

    public function store (StoreSite $request) {
        // $site = New Site();
        // $site->localid  = $request->localid;
        // $site->nombre   = $request->nombre;
        // $site->zonal    = $request->zonal;
        // $site->estado   = $request->estado;
        // $site->save();

        // podemos reemplazar la asignacion anterior con una asignacion masiva
        // este metetodo crea una instancia de la clase Site y le va a agregar las propiedades
        // para luego grabarlas en los respectivos campos (excepto el token)
        // al crearse las propiedades de forma dinamica, hay que agregar los campos  que queremos que
        // el usuario llene dentro del archivo model, agregar propiedad fillable con la lista de campos
        $site = Site::create($request->all());
        return redirect()->route('sites.show', $site);
    }

    public function show (Site $site) {
        return view('sites.show', ['site' => $site]);
    }

    public function edit(Site $site) {
        return view('sites.edit', ['site' => $site]);
    }

    // para que la funcion siga las reglas definidas en el store, debemos cambiar el alcance de Request por el store
    // public function update(Request $request, Site $site) {
    public function update(StoreSite $request, Site $site) {

        // aplicamos reglas de validacion
        // $request->validate([
        //     'localid'   => 'required',
        //     'nombre'   => 'required',
        //     'zonal'     => 'required',
        //     'estado'    => 'required',
        // ]);

        // $site->localid  = $request->localid;
        // $site->nombre   = $request->nombre;
        // $site->zonal    = $request->zonal;
        // $site->estado   = $request->estado;
        // $site->save();

       // al igual que en create, vamos a hacer la misma asignacion masiva en update
        $site->update($request->all());
        return redirect()->route('sites.show', $site);
    }

    public function destroy(Site $site){
        $site->delete();
        return redirect()->route('sites.index', $site);
    }
}
