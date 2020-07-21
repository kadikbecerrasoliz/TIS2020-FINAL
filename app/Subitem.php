<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subitem extends Model
{
    protected $fillable = [
        'indice', 'titulo', 'puntaje'
    ];
    
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function certificados()
    {
        return $this->hasMany(Certificado::class);
    }

    public function detalles()
    {
        return $this->hasMany(Detalle::class);
    }
}
