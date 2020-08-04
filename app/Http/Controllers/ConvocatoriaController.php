<?php

namespace App\Http\Controllers;

use App\Convocatoria;
use App\Materia;
use App\Postulation;
use App\Tematica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ConvocatoriaRequest;
use Carbon\Carbon;

class ConvocatoriaController extends Controller
{
    public function index()
    {
        $convocatorias = Convocatoria::orderBy('titulo')->get();
        return view('convocatorias.index', compact('convocatorias'));
    }
    public function create()
    {
        //
    }
    public function store(ConvocatoriaRequest $request)
    {
        $Dato1 = new Carbon($request->input('fechaIni'));
        $Dato2 = new Carbon($request->input('fechaFin'));
        $fechaini = $Dato1;
        $fechaFin = $Dato2;
        $fechaAct = Carbon::now();
        if ($fechaini->gte($fechaAct) && $fechaini->lt($fechaFin)) {
            $convocatoria = new Convocatoria();
            $convocatoria->titulo = $request->input('titulo');
            $convocatoria->description = $request->input('description');
            $convocatoria->fechaIni = $request->input('fechaIni');
            $convocatoria->fechaFin = $request->input('fechaFin');
            $convocatoria->porcentaje_conocimientos = $request->input('porcentaje_conocimientos');
            $convocatoria->save();
            return back()->with('confirmacion','Convocatoria Registrado Correctamente');
        } else {
            return back()->with('negacion','Fecha de inicio incorrecta');
        }

    }
    public function show($id)
    {
        $convocatoria = Convocatoria::where('id', '=', $id)->firstOrFail();
        $requerimientos= $convocatoria->requerimientos;
        $requisitos= $convocatoria->requisitos;
        $documentos= $convocatoria->documentos;
        $fechas= $convocatoria->fechas;
        $meritos= $convocatoria->meritos;
        $tematicas = Tematica::get();
        $materias = Materia::get();
        return view('convocatorias.show', compact('convocatoria', 'requerimientos', 'materias', 'requisitos', 'documentos', 'fechas', 'meritos', 'tematicas'));
    }

    public function edit($id)
    {
        //
    }

    public function update(ConvocatoriaRequest $request, $id)
    {
        $convocatoria = Convocatoria::find($id);

        $Dato1 = new Carbon($request->input('fechaIni'));
        $Dato2 = new Carbon($request->input('fechaFin'));
        $fechaini = $Dato1;
        $fechaFin = $Dato2;
        $fechaAct = Carbon::now();
        if ($fechaini->gte($convocatoria->fechaIni) && $fechaini->lt($fechaFin)) {
            $convocatoria = Convocatoria::find($id);

            $convocatoria->titulo = $request->input('titulo');
            $convocatoria->description = $request->input('description');
            $convocatoria->fechaIni = $request->input('fechaIni');
            $convocatoria->fechaFin = $request->input('fechaFin');
            $convocatoria->fechaFin = $request->input('fechaFin');
            $convocatoria->porcentaje_conocimientos = $request->input('porcentaje_conocimientos');
            $convocatoria->save();
             return back()->with('confirmacion','Convocatoria Editado Correctamente');
        } else {
            return back()->with('negacion','Fecha de inicio incorrecta');
        }

    }

    public function destroy($id)
    {
        $convocatoria = Convocatoria::where('id', '=', $id)->firstOrFail();
        $convocatoria->delete();
        return back()->with('confirmacion','Convocatoria Eliminado Correctamente');
    }

    public function view()
    {
        $today = Carbon::now();
        $convocatorias = Convocatoria::orderBy('titulo')->where('fechaFin', '>=', $today)->get();
        return view('convocatorias.publico.index', compact('convocatorias'));
    }
    public function viewshow($id)
    {
        // $user = Auth::user();
        $convocatoria = Convocatoria::where('id', '=', $id)->firstOrFail();
        // $postulation = Postulation::where('user_id','=',$user->id)->where('convocatoria_id','=',$convocatoria->id)->firstOrFail();
        $requerimientos= $convocatoria->requerimientos;
        $requisitos= $convocatoria->requisitos;
        $documentos= $convocatoria->documentos;
        $fechas= $convocatoria->fechas;
        $meritos= $convocatoria->meritos;
        $tematicas = Tematica::get();
        $materias = Materia::get();
        return view('convocatorias.publico.show', compact('convocatoria', 'requerimientos', 'materias', 'requisitos', 'documentos', 'fechas', 'meritos', 'tematicas'));
    }

    public function showVistaParaRevision()
    {
        $convocatorias = Convocatoria::orderBy('titulo')->get();
        return view('convocatorias.revision.index', compact('convocatorias'));
    }

    public function showVistaParaRequerimiento()
    {
        $convocatorias = Convocatoria::orderBy('titulo')->get();
        return view('convocatorias.requerimientos.index', compact('convocatorias'));
    }
}
