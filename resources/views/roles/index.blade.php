@extends('layouts.app')

@section('content')
<div class="row m-0">
    <div class="col">
        <h3>Lista de Roles</h3>
    </div>
    @can('roles.create')
        <div class="col">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success btn-sm"data-toggle="modal" data-target="#modalLoginForm">Nuevo</button>
            </div>
            <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        @include('roles.create')
                    </div>
                </div>
            </div>
        </div>
    @endcan
</div>
<div style="position: relative; height: 480px; margin-top: .5rem; overflow: auto;">
    @include('opcion.error')
    @include('opcion.validacion')
    @include('opcion.confirmacion')
    <table class="table table-sm table-hover table-bordered">
        <thead class="thead-light">
            <tr>
                <th>
                    <strong>Nombre</strong>
                </th>
                <th>
                    <strong>Descripción</strong>
                </th>
                @can('roles.show')
                    <th class="text-center">
                        <strong>Ver</strong>
                    </th>
                @endcan
                @can('roles.edit')
                    <th class="text-center">
                        <strong>Editar</strong>
                    </th>
                @endcan
                @can('roles.destroy')
                    <th class="text-center">
                        <strong>Eliminar</strong>
                    </th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{$role->name}}</td>
                    <td>{{$role->description}}</td>
                    @can('roles.show')
                        <td class="text-center" width="10px">
                            <button type="button" class="btn btn-info px-3 btn-sm" data-toggle="modal" data-target="#ShowRole{{$role->id}}"><i class="fas fa-eye"></i></button>
                            <div class="modal fade" id="ShowRole{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        @include('roles.show')
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endcan
                    @can('roles.edit')
                        <td class="text-center" width="10px">
                            <button type="button" class="btn btn-warning px-3 btn-sm" data-toggle="modal" data-target="#EditRole{{$role->id}}"><i class="fas fa-edit"></i></button>
                            <div class="modal fade" id="EditRole{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        @include('roles.edit')
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endcan
                    @can('roles.destroy')
                        <td class="text-center" width="10px">
                            <button type="button" class="btn btn-danger px-3 btn-sm" data-toggle="modal" data-target="#DestroyRole{{$role->id}}"><i class="fas fa-trash-alt"></i></button>
                            <div class="modal fade" id="DestroyRole{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title w-100" id="exampleModalLabel">Eliminar Rol</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            El Rol se eliminara de la base de datos
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger" type="submit">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection