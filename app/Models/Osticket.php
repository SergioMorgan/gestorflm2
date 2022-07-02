<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Osticket extends Model
{
    use HasFactory;

    protected $guarded = [
        // especificar los campos de la tabla a proteger
    ];

    //relacion uno a muchos con actions, clockstops
    public function actions()
    {
        return $this->hasMany('App\Models\Action');
    }

    public function clockstops()
    {
        return $this->hasMany('App\Models\Clockstop');
    }


    //relacion uno a muchos con sites (inversa)
    public function site()
    {
        return $this->belongsTo('App\Models\Site');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
