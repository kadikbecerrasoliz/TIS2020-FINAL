<?php

namespace App\Http\Controllers;

use App\Solicitud;
use App\Postulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SolicitudController extends Controller
{
    public function index()
    {
        $solicituds = Solicitud::where('estado','=',"1")->orderBy('id')->get();
        return view('solicituds.index', compact('solicituds'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if($request->file('valorado') === null || $request->file('kardex') === null) {
            return back()->with('negacion','Debes seleccionar un archivo para el kardex y valorado');
        }
        $user = Auth::user();
        $acept = Solicitud::where('user_id','=',$user->id)->where('convocatoria_id','=',$request->convocatoria_id)->where('estado','=','2')->count();
        $envia = Solicitud::where('user_id','=',$user->id)->where('convocatoria_id','=',$request->convocatoria_id)->where('estado','=','1')->count();
        $rol = $user->roles->where('name','=','Postulante')->count();

        if ($rol == 1) {
            if ($acept == 0 && $envia == 0) {

                $solicitud = new Solicitud();
                $solicitud->estado="1";
                $solicitud->convocatoria_id=$request->input('convocatoria_id');
                $solicitud->user_id=$user->id;

                if($request->file('valorado')){
                    $path = Storage::disk('public')->put('valorados',  $request->file('valorado'));
                    $solicitud->fill(['valorado' => asset($path)])->save();
                }
                if($request->file('kardex')){
                    $path = Storage::disk('public')->put('kardexs',  $request->file('kardex'));
                    $solicitud->fill(['kardex' => asset($path)])->save();
                }
                $solicitud->save();

                return back()->with('confirmacion','Solicitud enviada Correctamente');
            } else {
                return back()->with('negacion','Ya enviaste una Solicitud a esta convocatoria');
            }
        } else {
            return back()->with('negacion','Solo para postulantes');
        }
    }

    public function show(Solicitud $solicitud)
    {
        //
    }

    public function edit(Solicitud $solicitud)
    {
        //
    }

    public function update(Request $request, Solicitud $solicitud)
    {
    }

    public function destroy(Solicitud $solicitud)
    {
        //
    }



    public function apply($id)
    {
        $solicitud = Solicitud::where('id', '=', $id)->firstOrFail();

        if ($solicitud->estado == "1") {

            $solicitud->estado="2";
            $solicitud->save();

            $postulation = new Postulation();
            $postulation->convocatoria_id = $solicitud->convocatoria_id;
            $postulation->user_id = $solicitud->user_id;
            $postulation->save();

            return back()->with('confirmacion','Solicitud aceptada Correctamente');;
        } else {
            if ($solicitud->estado == "2") {
                return back()->with('negacion','Solicitud ya fue aceptada');
            } else {
                return back()->with('negacion','Solicitud ya fue rechazada');
            }
        }



    }
    public function deny($id)
    {
        $solicitud = Solicitud::where('id', '=', $id)->firstOrFail();
        $convocatoria = $solicitud->convocatoria;

        if ($solicitud->estado == "1") {

            $solicitud->delete();

            return back()->with('confirmacion','Solicitud rechazada Correctamente');;
        } else {
            if ($solicitud->estado == "2") {
                return back()->with('negacion','Solicitud ya fue aceptada');
            } else {
                return back()->with('negacion','Solicitud ya fue rechazada');
            }
        }
    }
}
