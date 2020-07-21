<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merito extends Model
{
    protected $fillable = [
        'indice', 'tipo', 'puntaje'
    ];
    
    public function convocatoria()
    {
        return $this->belongsTo(Convocatoria::class);
    }

    public function certificados()
    {
        return $this->hasMany(Certificado::class);
    }
    

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
