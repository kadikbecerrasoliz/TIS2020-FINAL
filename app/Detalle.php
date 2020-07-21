<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    protected $fillable = [
        'indice', 'titulo', 'puntaje'
    ];
    
    public function certificados()
    {
        return $this->hasMany(Certificado::class);
    }
    public function subitem()
    {
        return $this->belongsTo(Subitem::class);
    }
}
