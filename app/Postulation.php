<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulation extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function convocatoria()
    {
        return $this->belongsTo(Convocatoria::class);
    }

    public function archivos()
    {
        return $this->hasMany(Archivo::class);
    }

    public function certificados()
    {
        return $this->hasMany(Certificado::class);
    }
}
