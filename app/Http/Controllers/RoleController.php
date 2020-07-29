<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();
        $roles = Role::orderBy('name')->get();
        return view('roles.index', compact('roles', 'permissions'));
    }

    public function create()
    {
        //
    }

    public function store(RoleRequest $request)
    {
        $role = new Role();
        $role->name = $request->input('name');
        $role->slug = $request->input('name');
        $role->description = $request->input('description');
        $role->special = $request->input('special');
        $role->save();

        $role->permissions()->attach($request->get('permissions'));

        return back()->with('confirmacion','Rol Registrado Correctamente');
    }

    public function show($slug)
    {
        //
    }

    public function edit($slug)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        $role->name = $request->input('name');
        $role->slug = $request->input('name');
        $role->description = $request->input('description');
        $role->special = $request->input('special');
        $role->save();

        $role->permissions()->sync($request->get('permissions'));

        return back()->with('confirmacion','Rol Editado Correctamente');
    }

    public function destroy($slug)
    {
        $role = Role::where('slug', '=', $slug)->firstOrFail();
        $role->delete();
        return back()->with('confirmacion','Rol Eliminado Correctamente');
    }
}
