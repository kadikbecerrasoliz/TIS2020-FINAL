<?php

namespace App\Http\Controllers;

use App\Merito;
use App\Convocatoria;
use Illuminate\Http\Request;

class MeritoController extends Controller
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
        $convocatoria = Convocatoria::find($request->convocatoria_id);
        $indice = $convocatoria->meritos->count()+1;
        $meritos = $convocatoria->meritos;
        $puntosAct = 0;
        if($request->input('puntos') < 0) {
            return back()->with('negacion', 'El merito no puede ser negativo.');
        } else {
            foreach ($meritos as $merito) {
                $puntosAct = $puntosAct + $merito->puntos;
            }
            $puntosNue = $puntosAct+$request->puntos;
            if ($puntosNue <= 100) {
                $merito = new Merito();
                $merito->indice = $indice;
                $merito->tipo = $request->input('tipo');
                $merito->puntos = $request->input('puntos');
                $merito->convocatoria_id = $request->input('convocatoria_id');
                $merito->save();
                return back()->with('confirmacion','Merito Registrado Correctamente');
            } else {
                return back()->with('negacion','La sumatoria de meritos no debe pasar 100 Pts.');
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
        $merito = Merito::find($id);
        // $merito->indice = $request->input('indice');
        $merito->tipo = $request->input('tipo');
        $merito->puntos = $request->input('puntos');
        $merito->convocatoria_id = $request->input('convocatoria_id');
        $merito->save();

        return back()->with('confirmacion','Merito Editado Correctamente');
    }

    public function destroy($id)
    {
        $merito = Merito::where('id', '=', $id)->firstOrFail();
        $merito->delete();
        return back()->with('confirmacion','Merito Eliminado Corectamente');
    }
}
