<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    protected $fillable = [
        'detalle'
    ];
    
    public function convocatoria()
    {
        return $this->belongsTo(Convocatoria::class);
    }
}
