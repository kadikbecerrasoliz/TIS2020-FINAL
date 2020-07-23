<?php

namespace App\Http\Controllers;

use App\Requerimiento;
use App\Materia;
use Illuminate\Http\Request;

class RequerimientoController extends Controller
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
        $requerimiento = new Requerimiento();
        $requerimiento->items = $request->input('items');
        $requerimiento->cantidad = $request->input('cantidad');
        $requerimiento->hrsAcademic = $request->input('hrsAcademic');
        $requerimiento->materia_id = $request->input('materia_id');
        $requerimiento->convocatoria_id = $request->input('convocatoria_id');
        $requerimiento->save();
        return back()->with('confirmacion','Requerimiento Registrado Correctamente');
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
        $requerimiento = Requerimiento::find($id);

        $requerimiento->items = $request->input('items');
        $requerimiento->cantidad = $request->input('cantidad');
        $requerimiento->hrsAcademic = $request->input('hrsAcademic');
        $requerimiento->materia_id = $request->input('materia_id');
        $requerimiento->convocatoria_id = $request->input('convocatoria_id');
        $requerimiento->save();

        return back()->with('confirmacion','Requerimiento Editado Correctamente');
    }

    public function destroy($id)
    {
        $requerimiento = Requerimiento::where('id', '=', $id)->firstOrFail();
        $requerimiento->delete();
        return back()->with('confirmacion','Requerimiento Eliminado Correctamente');
    }
}
