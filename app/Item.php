<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'indice', 'titulo', 'puntaje'
    ];
    
    public function merito()
    {
        return $this->belongsTo(Merito::class);
    }
    public function certificados()
    {
        return $this->hasMany(Certificado::class);
    }

    public function subitems()
    {
        return $this->hasMany(Subitem::class);
    }
}
