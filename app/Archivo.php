<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $fillable = [
        'file'
    ];

    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }
    public function postulation()
    {
        return $this->belongsTo(Postulation::class);
    }
}
