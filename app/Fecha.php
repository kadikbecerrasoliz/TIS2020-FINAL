<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    protected $fillable = [
        'evento', 'horaIni', 'horaFin', 'fechaIni', 'fechaFin', 
    ];
    
    public function convocatoria()
    {
        return $this->belongsTo(Convocatoria::class);
    }
}
