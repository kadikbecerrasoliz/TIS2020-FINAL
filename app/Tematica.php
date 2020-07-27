<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tematica extends Model
{
    protected $fillable = [
        'name', 'codigo'
    ];

    public function tematicaRequerimientos()
    {
        return $this->hasMany(RequerimientoTematica::class);
    }
}
