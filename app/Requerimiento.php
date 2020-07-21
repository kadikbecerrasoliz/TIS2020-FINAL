<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requerimiento extends Model
{
    protected $fillable = [
        'items', 'cantidad', 'hrsAcademic'
    ];

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function convocatoria()
    {
        return $this->belongsTo(Convocatoria::class);
    }
}
