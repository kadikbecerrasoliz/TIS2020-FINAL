<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calificacion;
use App\Requerimiento;
use App\Postulation;

class CalificacionController extends Controller
{
    public function store(Request $request, $postulation_id, $postulationRequerimiento_id) {
        $calificacion = new Calificacion();
        $postulation = Postulation::find($postulation_id);
        $convocatoria = $postulation->convocatoria;
        $puntaje_final = 0;

        $puntaje_meritos = $convocatoria->meritos->sum('puntos');
        $porcentajeConocimientos = $convocatoria->porcentaje_conocimientos;
        $porcentajeCertificados = 100 - $porcentajeConocimientos;
        $puntaje_certificados_porcentual = ($postulation->puntaje_certificados / $puntaje_meritos) * $porcentajeCertificados;

        foreach($request->all() as $puntos => $value) {
            if(gettype((int)$value) === 'integer' ) {
                $puntaje_final += (int)$value;
            }
        }

        $puntaje_final_porcentual = $puntaje_final * ($porcentajeConocimientos / 100);

        $calificacion->puntaje_final = $puntaje_final;
        $calificacion->puntaje_porcentual = (int)$puntaje_final_porcentual + (int)$puntaje_certificados_porcentual;
        $calificacion->postulation_id = $postulation_id;
        $calificacion->postulation_requerimiento_id = $postulationRequerimiento_id;
        $calificacion->save();

        return redirect()->back()->with('confirmacion', 'La calificacion se ha creado exitosamente.');
    }

    public function update(Request $request, $postulation_id, $postulationRequerimiento_id) {
        $calificacion = Calificacion::where('postulation_id', $postulation_id)->where('postulation_requerimiento_id', $postulationRequerimiento_id)->first();
        $postulation = Postulation::find($postulation_id);
        $convocatoria = $postulation->convocatoria;
        $puntaje_final = 0;

        $puntaje_meritos = $convocatoria->meritos->sum('puntos');
        $porcentajeConocimientos = $convocatoria->porcentaje_conocimientos;
        $porcentajeCertificados = 100 - $porcentajeConocimientos;
        $puntaje_certificados_porcentual = ($postulation->puntaje_certificados / $puntaje_meritos) * $porcentajeCertificados;

        foreach($request->all() as $puntos => $value) {
            if(gettype((int)$value) === 'integer' ) {
                $puntaje_final += (int)$value;
            }
        }

        $puntaje_final_porcentual = $puntaje_final * ($porcentajeConocimientos / 100);

        $calificacion->puntaje_final = $puntaje_final;
        $calificacion->puntaje_porcentual = (int)$puntaje_final_porcentual + (int)$puntaje_certificados_porcentual;
        $calificacion->save();

        return redirect()->back()->with('confirmacion', 'La calificacion se ha editado exitosamente.');
    }

    public function showCalificacionesPerRequerimiento($requerimiento_id) {
        $requerimiento = Requerimiento::find($requerimiento_id);
        $requerimientoPostulations = $requerimiento->requerimientoPostulations;
        return view('calificaciones.perRequerimiento', compact('requerimientoPostulations', 'requerimiento'));
    }
}
