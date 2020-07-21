<?php

namespace App\Http\Controllers;

use App\Detalle;
use App\Subitem;
use Illuminate\Http\Request;

class DetalleController extends Controller
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
        $subitem = Subitem::find($request->subitem_id);
        $indice = $subitem->detalles->count()+1;
        $detalles = $subitem->detalles;
        $puntosAct = 0;
        $puntosTot = 0;

        foreach($detalles as $detalle) {
            $puntosAct += $detalle->puntos;
        }

        if($request->puntos < 0) {
            return back()->with('negacion', 'El Detalle no puede ser menor a 0');
        } else if($request->puntos > $subitem->puntos) {
            return back()->with('negacion', 'El Detalle no puede ser mayor al puntaje del subitem');
        } else {
            $puntosTot += $puntosAct + $request->puntos;
            if($puntosTot > $subitem->puntos) {
                return back()->with('negacion', 'La sumatoria de detalles no puede ser mayor al puntaje del subitem');
            } else {
                $detalle = new Detalle();
                $detalle->indice = $indice;
                $detalle->titulo = $request->input('titulo');
                $detalle->puntos = $request->input('puntos');
                $detalle->subitem_id = $request->input('subitem_id');
                $detalle->save();
            }
        }
        return back()->with('confirmacion','Detalle Registrado Correctamente');
    }

    public function show(Detalle $detalle)
    {
        //
    }

    public function edit(Detalle $detalle)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $detalle = Detalle::find($id);
        // $detalle->indice = $request->input('indice');
        $detalle->titulo = $request->input('titulo');
        $detalle->puntos = $request->input('puntos');
        $detalle->subitem_id = $request->input('subitem_id');
        $detalle->save();

        return back()->with('confirmacion','Detalle Editado Correctamente');
    }

    public function destroy($id)
    {
        $detalle = Detalle::where('id', '=', $id)->firstOrFail();
        $detalle->delete();
        return back()->with('confirmacion','Detalle Eliminado Corectamente');
    }
}
