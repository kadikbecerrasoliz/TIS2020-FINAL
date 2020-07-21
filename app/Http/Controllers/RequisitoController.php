<?php

namespace App\Http\Controllers;

use App\Requisito;
use Illuminate\Http\Request;

class RequisitoController extends Controller
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
        $requisito = new Requisito();
        $requisito->detalle = $request->input('detalle');
        $requisito->convocatoria_id = $request->input('convocatoria_id');
        $requisito->save();
        return back()->with('confirmacion','Requisito Registrado Correctamente');
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
        $requisito = Requisito::find($id);

        $requisito->detalle = $request->input('detalle');
        $requisito->convocatoria_id = $request->input('convocatoria_id');
        $requisito->save();

        return back()->with('confirmacion','Requisito Editado Correctamente');
    }

    public function destroy($id)
    {
        $requisito = Requisito::where('id', '=', $id)->firstOrFail();
        $requisito->delete();
        return back()->with('confirmacion','Requisito Eliminado Corectamente');
    }
}
