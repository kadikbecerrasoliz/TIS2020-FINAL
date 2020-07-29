<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calificacion;

class CalificacionController extends Controller
{
    public function store(Request $request, $postulation_id, $postulationRequerimiento_id) {
        $calificacion = new Calificacion();
        $puntaje_final = 0;

        foreach($request->all() as $puntos => $value) {
            if(gettype((int)$value) === 'integer' ) {
                $puntaje_final += (int)$value;
            }
        }

        $calificacion->puntaje_final = $puntaje_final;
        $calificacion->postulation_id = $postulation_id;
        $calificacion->postulation_requerimiento_id = $postulationRequerimiento_id;
        $calificacion->save();

        return redirect()->back()->with('confirmacion', 'La calificacion se ha creado exitosamente.');
    }

    public function update(Request $request, $postulation_id, $postulationRequerimiento_id) {
        $calificacion = Calificacion::where('postulation_id', $postulation_id)->where('postulation_requerimiento_id', $postulationRequerimiento_id)->first();
        $puntaje_final = 0;

        foreach($request->all() as $puntos => $value) {
            if(gettype((int)$value) === 'integer' ) {
                $puntaje_final += (int)$value;
            }
        }

        $calificacion->puntaje_final = $puntaje_final;
        $calificacion->save();

        return redirect()->back()->with('confirmacion', 'La calificacion se ha editado exitosamente.');
    }
}
