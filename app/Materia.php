<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        'name', 'codigo'
    ];

    public function requerimientos()
    {
        return $this->hasMany(Requerimiento::class);
    }
}
