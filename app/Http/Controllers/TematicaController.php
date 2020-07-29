<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tematica;

class TematicaController extends Controller
{
    public function index()
    {
        $tematicas = Tematica::orderBy('name')->get();
        return view('tematicas.index', compact('tematicas'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $tematica = new Tematica();
        $tematica->name = $request->input('name');
        $tematica->save();
        return back()->with('confirmacion','Tematica Registrada Correctamente');
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
        $tematica = Tematica::find($id);

        $tematica->name = $request->input('name');
        $tematica->save();

        return back()->with('confirmacion','Tematica Editado Correctamente');
    }

    public function destroy($id)
    {
        $tematica = Tematica::where('id', '=', $id)->firstOrFail();
        $tematica->delete();
        return back()->with('confirmacion','Tematica Eliminada Correctamente');
    }
}
