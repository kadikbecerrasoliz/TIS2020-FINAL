<?php

namespace App\Http\Controllers;

use App\Item;
use App\Merito;
use Illuminate\Http\Request;

class ItemController extends Controller
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
        $merito = Merito::find($request->merito_id);
        $indice = $merito->items->count()+1;
        $items = $merito->items;
        $puntosAct = 0;
        foreach ($items as $item) {
            $puntosAct = $puntosAct + $item->puntos;
        }
        if($request->puntos > $merito->puntos) {
            return back()->with('negacion', 'El item no puede ser mayor al puntaje del merito.');
        } else if($request->puntos < 0) {
            return back()->with('negacion', 'El item no puede ser negativo.');
        } else {
            $puntosNue = $puntosAct+$request->puntos;
            if($puntosNue > $merito->puntos) {
                return back()->with('negacion', 'La sumatoria de items no debe pasar el puntaje de meritos.');
            } else {
                $item = new Item();
                $item->indice = $indice;
                $item->titulo = $request->input('titulo');
                $item->puntos = $request->input('puntos');
                $item->merito_id = $request->input('merito_id');
                $item->save();
                return back()->with('confirmacion','Item Registrado Correctamente');
            }
        }
    }

    public function show(Item $item)
    {
        //
    }

    public function edit(Item $item)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        $merito = Merito::find($item->merito_id);
        if($request->input('puntos') > $merito->puntos) {
            return back()->with('negacion', 'El item no puede ser mayor al puntaje del merito.');
        } else if($request->input('puntos') < 0) {
            return back()->with('negacion', 'El item no puede ser negativo.');
        } else {
            // $item->indice = $request->input('indice');
            $item->titulo = $request->input('titulo');
            $item->puntos = $request->input('puntos');
            $item->merito_id = $request->input('merito_id');
            $item->save();

            return back()->with('confirmacion','Merito Editado Correctamente');
        }
    }


    public function destroy($id)
    {
        $item = Item::where('id', '=', $id)->firstOrFail();
        $item->delete();
        return back()->with('confirmacion','Merito Eliminado Corectamente');
    }
}
