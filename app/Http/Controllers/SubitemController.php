<?php

namespace App\Http\Controllers;

use App\Item;
use App\Subitem;
use Illuminate\Http\Request;

class SubitemController extends Controller
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
        $item = Item::find($request->item_id);
        $indice = $item->subitems->count()+1;
        $subitems = $item->subitems;
        $puntosAct = 0;
        if($request->input('puntos') > $item->puntos) {
            return back()->with('negacion', 'El subitem no puede ser mayor al puntaje de item.');
        } else if($request->input('puntos') < 0) {
            return back()->with('negacion', 'El subitem no puede ser negativo.');
        } else {
            foreach ($subitems as $subitem) {
                $puntosAct = $puntosAct + $subitem->puntos;
            }
            $puntosNue = $puntosAct+$request->puntos;
            if($puntosNue > $item->puntos) {
                return back()->with('negacion', 'La sumatoria de subitems no debe pasar el puntaje de items.');
            } else {
                $subitem = new Subitem();
                $subitem->indice = $indice;
                $subitem->titulo = $request->input('titulo');
                $subitem->puntos = $request->input('puntos');
                $subitem->item_id = $request->input('item_id');
                $subitem->save();
                return back()->with('confirmacion','Subitem Registrado Correctamente');
            }
        }
    }

    public function show(Subitem $subitem)
    {
        //
    }

    public function edit(Subitem $subitem)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $subitem = Subitem::find($id);
        $item = Item::find($subitem->item_id);
        if($request->input('puntos') > $item->puntos) {
            return back()->with('negacion', 'El sub-item no puede ser mayor al puntaje de item.');
        } else if($request->input('puntos') < 0) {
            return back()->with('negacion', 'El sub-item no puede ser negativo.');
        } else {
            // $subitem->indice = $request->input('indice');
            $subitem->titulo = $request->input('titulo');
            $subitem->puntos = $request->input('puntos');
            $subitem->item_id = $request->input('item_id');
            $subitem->save();

            return back()->with('confirmacion','Subitem Editado Correctamente');
        }
    }

    public function destroy($id)
    {
        $subitem = Subitem::where('id', '=', $id)->firstOrFail();
        $subitem->delete();
        return back()->with('confirmacion','Subitem Eliminado Correctamente');
    }
}
