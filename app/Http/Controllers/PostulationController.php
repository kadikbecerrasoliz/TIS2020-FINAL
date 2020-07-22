<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use App\Postulation;
use App\Convocatoria;
use App\Codigo;
use Illuminate\Http\Request;

class PostulationController extends Controller
{
    public function index()
    {
        $postulations = Postulation::get();
        return view('postulations.index', compact('postulations'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
     //
    }

    public function show($id)
    {
        //
    }

    public function showPostulationsPerConvocatoria($convocatoria_id)
    {
        $postulations = Postulation::where('convocatoria_id', '=', $convocatoria_id)->get();
        return view('postulations.perConvocatoria', compact('postulations'));
    }

    public function edit(Postulation $postulation)
    {
        //
    }

    public function editarCalificacionFinal(Request $request, $id)
    {
        $postulation = Postulation::where('id', '=', $id)->firstOrFail();
        if ($request->puntaje_examen < 0) {
            return back()->with('negacion', 'El puntaje de examen no puede ser menor a 0.', [$postulation]);
        } else if($request->puntaje_examen > 100) {
            return back()->with('negacion', 'El puntaje de examen no puede ser mayor a 100.', [$postulation]);
        } else {
            $meritos = $postulation->convocatoria->meritos;
            $postulation->puntaje_examen = $request->input('puntaje_examen');
            $postulation->puntaje_total = (($postulation->puntaje_certificados / $meritos->sum('puntos')) / 2) * 100
                + $request->puntaje_examen / 2;
            $postulation->save();
            return back()->with('confirmacion', 'El puntaje de examen ha sido modificado correctamente.', [$postulation]);
        }

    }

    public function update(Request $request, Postulation $postulation)
    {
        //
    }

    public function destroy($id)
    {
        $postulations = Postulation::where('id', '=', $id)->firstOrFail();
        $postulations->delete();
        return back()->with('confirmacion','Postulacion  Eliminado Corectamente');
    }
}
