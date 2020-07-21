<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use App\Postulation;
use App\Convocatoria;
use App\Codigo;
use Illuminate\Http\Request;

class PostulationController extends Controller
{
    public function index()
    {
        $postulations = Postulation::get();
        return view('postulations.index', compact('postulations'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
     //
    }

    public function show($id)
    {
        //
    }

    public function showPostulationsPerConvocatoria($convocatoria_id)
    {
        $postulations = Postulation::where('convocatoria_id', '=', $convocatoria_id)->get();
        return view('postulations.perConvocatoria', compact('postulations'));
    }

    public function edit(Postulation $postulation)
    {
        //
    }

    public function update(Request $request, Postulation $postulation)
    {
        //
    }

    public function destroy($id)
    {
        $postulations = Postulation::where('id', '=', $id)->firstOrFail();
        $postulations->delete();
        return back()->with('confirmacion','Postulacion  Eliminado Corectamente');
    }
}
