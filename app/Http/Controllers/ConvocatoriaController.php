<?php

namespace App\Http\Controllers;

use App\Convocatoria;
use App\Materia;
use App\Postulation;
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
        $convocatoria = new Convocatoria();
        $convocatoria->titulo = $request->input('titulo');
        $convocatoria->description = $request->input('description');
        $convocatoria->fechaIni = $request->input('fechaIni');
        $convocatoria->fechaFin = $request->input('fechaFin');
        $convocatoria->save();
        return back()->with('confirmacion','Convocatoria Registrado Correctamente');
    }
    public function show($id)
    {
        $convocatoria = Convocatoria::where('id', '=', $id)->firstOrFail();
        $requerimientos= $convocatoria->requerimientos;
        $requisitos= $convocatoria->requisitos;
        $documentos= $convocatoria->documentos;
        $fechas= $convocatoria->fechas;
        $meritos= $convocatoria->meritos;
        $materias = Materia::get();
        return view('convocatorias.show', compact('convocatoria', 'requerimientos', 'materias', 'requisitos', 'documentos', 'fechas', 'meritos'));
    }

    public function edit($id)
    {
        //
    }

    public function update(ConvocatoriaRequest $request, $id)
    {
        $convocatoria = Convocatoria::find($id);

        $convocatoria->titulo = $request->input('titulo');
        $convocatoria->description = $request->input('description');
        $convocatoria->fechaIni = $request->input('fechaIni');
        $convocatoria->fechaFin = $request->input('fechaFin');
        $convocatoria->save();

        return back()->with('confirmacion','Convocatoria Editado Correctamente');
    }

    public function destroy($id)
    {
        $convocatoria = Convocatoria::where('id', '=', $id)->firstOrFail();
        $convocatoria->delete();
        return back()->with('confirmacion','Convocatoria Eliminado Corectamente');
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
        $materias = Materia::get();
        return view('convocatorias.publico.show', compact('convocatoria', 'requerimientos', 'materias', 'requisitos', 'documentos', 'fechas', 'meritos'));
    }
}
