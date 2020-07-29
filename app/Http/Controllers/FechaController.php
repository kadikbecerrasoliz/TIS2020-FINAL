<?php

namespace App\Http\Controllers;

use App\Fecha;
use Illuminate\Http\Request;

class FechaController extends Controller
{
    public function index()
    {
        $fechas = Fecha::orderBy('id')->get();
        return view('fechas.index', compact('fechas'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $fecha = new Fecha();
        $fecha->evento = $request->input('evento');
        $fecha->horaIni = $request->input('horaIni');
        $fecha->horaFin = $request->input('horaFin');
        $fecha->fechaIni = $request->input('fechaIni');
        $fecha->fechaFin = $request->input('fechaFin');
        $fecha->convocatoria_id = $request->input('convocatoria_id');
        $fecha->save();
        return back()->with('confirmacion','Evento Registrado Correctamente');
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
        $fecha = Fecha::find($id);

        $fecha->evento = $request->input('evento');
        $fecha->horaIni = $request->input('horaIni');
        $fecha->horaFin = $request->input('horaFin');
        $fecha->fechaIni = $request->input('fechaIni');
        $fecha->fechaFin = $request->input('fechaFin');
        $fecha->convocatoria_id = $request->input('convocatoria_id');
        $fecha->save();

        return back()->with('confirmacion','Evento Editado Correctamente');
    }

    public function destroy($id)
    {
        $fecha = Fecha::where('id', '=', $id)->firstOrFail();
        $fecha->delete();
        return back()->with('confirmacion','Evento Eliminado Correctamente');
    }
}
