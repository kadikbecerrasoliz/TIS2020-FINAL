<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Caffeinated\Shinobi\Models\Role;
use App\User;
use App\Postulation;
use App\Codigo;

class PostulanteController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('postulantes.create');
    }

    public function store(UserRequest $request)
    {
        $role = Role::where('name', '=', 'Postulante')->firstOrFail()->id;$user = new User();
        $user->name = $request->input('name');
        $user->apellido = $request->input('apellido');
        $user->sis = $request->input('sis');
        $user->ci = $request->input('ci');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        $user->roles()->attach($role);

        $this->guard()->login($user);

        return redirect('home')->with('confirmacion','Registro Exitoso');
    }

    protected function guard()
    {
        return Auth::guard();
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
        //
    }
    public function destroy($id)
    {
        //
    }

    public function solicitudes()
    {
        $user = Auth::user();
        $solicituds = $user->solicituds->where('estado', '=', '1');
        return view('postulantes.solicitudes', compact('solicituds'));
    }

    public function postulations()
    {
        $today = Carbon::now();
        $user = Auth::user();
        $postulations = $user->postulations;
        return view('postulantes.postulaciones', compact('postulations', 'today'));
    }

    public function cargar($id)
    {
        $today = Carbon::now();
        $postulation = Postulation::find($id);
        if($postulation->convocatoria->fechaFin < $today) {
            return view('postulantes.postulaciones.show', compact('postulation', 'today'))->with('negacion', 'La postulatcion ya no se encuentra disponible.');
        } else {
            return view('postulantes.postulaciones.show', compact('postulation', 'today'));
        }
    }
}
