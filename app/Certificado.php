<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    protected $fillable = [
        'name', 'inciso', 'file'
    ];

    public function merito()
    {
        return $this->belongsTo(Merito::class);
    }
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function subitem()
    {
        return $this->belongsTo(Subitem::class);
    }
    public function detalle()
    {
        return $this->belongsTo(Detalle::class);
    }
    public function postulation()
    {
        return $this->belongsTo(Postulation::class);
    }
}

