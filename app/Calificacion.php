<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $fillable = [
        'puntaje_final'
    ];

    public function postulationRequerimiento()
    {
        return $this->belongsTo(PostulationRequerimiento::class);
    }

    public function postulation()
    {
        return $this->belongsTo(Postulation::class);
    }
}
