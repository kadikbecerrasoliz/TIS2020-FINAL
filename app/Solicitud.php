<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $fillable = [
        'estado', 'valorado', 'kardex', 
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function convocatoria()
    {
        return $this->belongsTo(Convocatoria::class);
    }
}
