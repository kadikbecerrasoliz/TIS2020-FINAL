<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    protected $fillable = [
        'titulo', 'description', 'fechaIni', 'fechaFin'
    ];

    public function soliciduds()
    {
        return $this->hasMany(Solicitud::class);
    }

    public function postulations()
    {
        return $this->hasMany(Postulation::class);
    }

    public function requerimientos()
    {
        return $this->hasMany(Requerimiento::class);
    }

    public function requisitos()
    {
        return $this->hasMany(Requisito::class);
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

    public function fechas()
    {
        return $this->hasMany(Fecha::class);
    }

    public function meritos()
    {
        return $this->hasMany(Merito::class);
    }
}
