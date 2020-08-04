<?php

namespace App\Http\Controllers;

use App\Requerimiento;
use App\Materia;
use App\PostulationRequerimiento;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Postulation;

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

    public function postularse($requerimiento_id, $postulation_id)
    {
        $today = Carbon::now();
        $postulation = Postulation::find($postulation_id);
        $postulationReq = new PostulationRequerimiento();

        $postulationReq->postulation_id = $postulation_id;
        $postulationReq->requerimiento_id = $requerimiento_id;

        $postulationReq->save();
        return redirect()->back()->with('confirmacion','Postulacion enviado Correctamente');
    }

    public function showRequerimientosPerConvocatoria($convocatoria_id) {
        $requerimientos = Requerimiento::where('convocatoria_id', '=', $convocatoria_id)->get();
        return view('requerimientos.perConvocatoria', compact('requerimientos'));
    }
}
