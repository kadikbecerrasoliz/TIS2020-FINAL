<?php

namespace App\Http\Controllers;

use App\Requerimiento;
use App\RequerimientoTematica;
use Illuminate\Http\Request;

class RequerimientoTematicaController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $requerimiento = Requerimiento::find($request->requerimiento_id);
        $requerimientoTematicas = $requerimiento->requerimientoTematicas;
        $puntosAct = 0;
        if($request->input('puntos') < 0) {
            return back()->with('negacion', 'El item de conocimiento no puede ser negativo.');
        } else {
            foreach ($requerimientoTematicas as $requerimientoTematica) {
                $puntosAct = $puntosAct + $requerimientoTematica->puntos;
            }
            $puntosNue = $puntosAct+$request->puntos;
            if ($puntosNue <= 100) {
                $requerimientoTematica = new RequerimientoTematica();
                $requerimientoTematica->puntos = $request->input('puntos');
                $requerimientoTematica->requerimiento_id = $request->input('requerimiento_id');
                $requerimientoTematica->tematica_id = $request->input('tematica_id');
                $requerimientoTematica->save();
                return back()->with('confirmacion','Item de conocimiento Registrado Correctamente');
            } else {
                return back()->with('negacion','La sumatoria de Items de conocimientos no debe pasar 100 Pts.');
            }
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $requerimientoTematica = RequerimientoTematica::find($id);
        // $requerimientoTematica->indice = $request->input('indice');
        $requerimientoTematica->puntos = $request->input('puntos');
        $requerimientoTematica->requerimiento_id = $request->input('requerimiento_id');
        $requerimientoTematica->tematica_id = $request->input('tematica_id');
        $requerimientoTematica->save();

        return back()->with('confirmacion','Item de conocimiento Editado Correctamente');
    }

    public function destroy($id)
    {
        $requerimientoTematica = RequerimientoTematica::where('id', '=', $id)->firstOrFail();
        $requerimientoTematica->delete();
        return back()->with('confirmacion','Item de conocimiento Eliminado Correctamente');
    }
}
