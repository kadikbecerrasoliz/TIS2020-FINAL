@extends('layouts.app')

@section('content')
<div class="row m-0">
    <div class="col">
        <h3>Listar tematicas</h3>
    </div>
    @can('tematicas.create')
        <div class="col">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success btn-sm"data-toggle="modal" data-target="#modalLoginForm">Nuevo</button>
            </div>
            <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        @include('tematicas.create')
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
    <table class="table table-sm table-hover table-bordered" width="200px">
        <thead class="thead-light">
            <tr>
                <th class="text-center">
                    <strong>N#</strong>
                </th>
                <th class="text-center">
                    <strong>Nombre de la tematica</strong>
                </th>
                @can('tematicas.show')
                    <th class="text-center">
                        <strong>Ver</strong>
                    </th>
                @endcan
                @can('tematicas.edit')
                    <th class="text-center">
                        <strong>Editar</strong>
                    </th>
                @endcan
                @can('tematicas.destroy')
                    <th class="text-center">
                        <strong>Eliminar</strong>
                    </th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($tematicas as $tematica)
                <tr>
                    <td class="text-center">
                        <strong>{{$tematica->id}}</strong>
                    </td>
                    <td>
                        <strong>{{$tematica->name}}</strong>
                    </td>
                    @can('tematicas.show')
                        <td class="text-center" width="10px">
                            <button type="button" class="btn btn-info px-3 btn-sm" data-toggle="modal" data-target="#Showtematica{{$tematica->id}}"><i class="fas fa-eye"></i></button>
                            <div class="modal fade" id="Showtematica{{$tematica->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        @include('tematicas.show')
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endcan
                    @can('tematicas.edit')
                        <td class="text-center" width="10px">
                            <button type="button" class="btn btn-warning px-3 btn-sm" data-toggle="modal" data-target="#Edittematica{{$tematica->id}}"><i class="fas fa-edit"></i></button>
                            <div class="modal fade" id="Edittematica{{$tematica->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        @include('tematicas.edit')
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endcan
                    @can('tematicas.destroy')
                        <td class="text-center" width="10px">
                            <button type="button" class="btn btn-danger px-3 btn-sm" data-toggle="modal" data-target="#Destroytematica{{$tematica->id}}"><i class="fas fa-trash-alt"></i></button>
                            <div class="modal fade" id="Destroytematica{{$tematica->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title w-100" id="exampleModalLabel">Elminar tematica</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            La tematica se eliminara de la base de datos
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('tematicas.destroy', $tematica->id) }}" method="POST">
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