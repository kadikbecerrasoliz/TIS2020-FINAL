<?php

namespace App\Http\Controllers;

use App\Archivo;
use App\Documento;
use App\Postulation;
use App\Convocatoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function index()
    {
        //
    }

    public function showArchivosPerPostulation($postulation_id) {
        $archivos = Archivo::where('postulation_id', '=', $postulation_id)->get();
        return view('archivos.perPostulation', compact('archivos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $rol = $user->roles->where('name','=','Postulante')->count();
        if ($rol == 1) {
            $postulations = $user->postulations->count();
            if ($postulations != 0) {
                $documento = Documento::find($request->documento_id);
                $convocatoria = Convocatoria::find($documento->convocatoria_id);
                $postulation = Postulation::where('user_id','=',$user->id)->where('convocatoria_id','=',$convocatoria->id)->firstOrFail();
                $archivos = Archivo::where('documento_id','=',$request->documento_id)->where('postulation_id','=',$postulation->id)->count();

                if ($archivos == 0) {
                    $archivo = new Archivo();
                    $archivo->documento_id=$request->input('documento_id');
                    $archivo->postulation_id=$postulation->id;

                    if($request->file('file')){
                        $path = Storage::disk('public')->put('documentos',  $request->file('file'));
                        $archivo->fill(['file' => asset($path)])->save();
                    }
                    $archivo->save();

                    return back()->with('confirmacion','Archivo subido Correctamente');
                } else {
                    return back()->with('negacion','Documento ya subido');
                }
            } else {
                return back()->with('negacion','Primero debe postularse');
            }
        } else {
            return back()->with('negacion','Solo para postulantes');
        }


    }

    public function show($id)
    {
    }

    public function edit(Archivo $archivo)
    {
        //
    }

    public function update(Request $request, Archivo $archivo)
    {
        //
    }

    public function destroy($id)
    {
        $archivo = Archivo::where('id', '=', $id)->firstOrFail();
        $archivo->delete();
        return back()->with('confirmacion','Archivo Eliminado Corectamente');
    }

    public function accept($id)
    {
        $archivo = Archivo::where('id', '=', $id)->firstOrFail();

        $archivo->estado = "Aceptado";
        $archivo->motivo = "El documento cumple con las especificaciones dadas";
        $archivo->save();

        return back()->with('confirmacion','Archivo aceptado Correctamente', [$archivo->postulation_id]);

    }

    public function deny(Request $request, $id)
    {
        $archivo = Archivo::where('id', '=', $id)->firstOrFail();

        $archivo->estado = "Rechazado";
        $archivo->motivo = $request->input('motivo');
        $archivo->save();

        return back()->with('confirmacion','Archivo rechazado Correctamente', [$archivo->postulation_id]);
    }
}
