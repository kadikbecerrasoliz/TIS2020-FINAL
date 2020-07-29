@extends('layouts.app')

@section('content')
<div class="row m-0">
    <div class="col">
        <h3>Lista de Usuarios</h3>
    </div>
    @can('users.create')
        <div class="col">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success btn-sm"data-toggle="modal" data-target="#modalLoginForm">Nuevo</button>
            </div>
            <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        @include('users.create')
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
                <th><strong>Nombre</strong></th>
                <th><strong>Rol</strong></th>
                @can('users.show')
                <th class="text-center"><strong>Ver</strong></th>
                @endcan
                @can('users.edit')
                <th class="text-center"><strong>Editar</strong></th>
                @endcan
                @can('users.destroy')
                <th class="text-center"><strong>Eliminar</strong></th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="">
                    <td>{{$user->name}}</td>
                    <td>
                        @foreach ($user->roles as $role)
                            {{$role->name}}
                        @endforeach
                    </td>
                    @can('users.show')
                        <td class="text-center" width="10px">
                            <button type="button" class="btn btn-info px-3 btn-sm" data-toggle="modal" data-target="#ShowUser{{$user->id}}"><i class="fas fa-eye"></i></button>
                            <div class="modal fade" id="ShowUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        @include('users.show')
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endcan
                    @can('users.edit')
                        <td class="text-center" width="10px">
                            <button type="button" class="btn btn-warning px-3 btn-sm" data-toggle="modal" data-target="#EditUser{{$user->id}}"><i class="fas fa-edit"></i></button>
                            <div class="modal fade" id="EditUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        @include('users.edit')
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endcan
                    @can('users.destroy')
                        <td class="text-center" width="10px">
                            <button type="button" class="btn btn-danger px-3 btn-sm" data-toggle="modal" data-target="#DestroyUser{{$user->id}}"><i class="fas fa-trash-alt"></i></button>
                            <div class="modal fade" id="DestroyUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title w-100" id="exampleModalLabel">Eliminar Usuario</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            El Usuario se eliminara de la base de datos
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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