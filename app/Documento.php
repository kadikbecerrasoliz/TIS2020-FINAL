<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = [
        'descripcion', 'importancia'
    ];
    
    public function convocatoria()
    {
        return $this->belongsTo(Convocatoria::class);
    }

    public function archivos()
    {
        return $this->hasMany(Archivo::class);
    }
}
