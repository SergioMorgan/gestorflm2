<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Site extends Model
{
    use HasFactory;
    use HasRoles;

    // Especificar los campos que llenara el usuario, excluir los que se llenan de forma automatica
    // y aquellos que no queremos que el usuario llene a travez de formulario convencional
    // protected $fillable = [
    //     'localid',
    //     'nombre',
    //     'zonal',
    //     'estado',
    // ];

    // Como alternativa podemos usar la propiedad guarded para especificar los campos protegidos
    // en vez de los campos permitidos (lo inverso de fillable)

    protected $guarded = [
        // especificar los campos de la tabla a proteger
    ];
    

    //relacion uno a varios
    public function ostickets() {
        return $this->hasMany('App\Models\Osticket');
    }
}
