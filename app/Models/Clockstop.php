<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clockstop extends Model
{
    use HasFactory;

    protected $guarded = [
        // especificar los campos de la tabla a proteger
    ];

    public function osticket() {
        return $this->belongsTo('App\Models\Osticket');
    }
}
