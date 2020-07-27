<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostulationRequerimiento extends Model
{

    public function requerimiento()
    {
        return $this->belongsTo(Requerimiento::class);
    }

    public function postulation()
    {
        return $this->belongsTo(Postulation::class);
    }

}
