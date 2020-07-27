<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequerimientoTematica extends Model
{
    protected $fillable = [
        'puntos'
    ];

    public function requerimiento()
    {
        return $this->belongsTo(Requerimiento::class);
    }

    public function tematica()
    {
        return $this->belongsTo(Tematica::class);
    }

}
