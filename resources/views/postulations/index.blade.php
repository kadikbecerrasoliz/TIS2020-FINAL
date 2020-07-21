@extends('layouts.app')

@section('content')
<div class="row m-0">
    <div class="col">
        <h3>Lista de postulaciones</h3>
    </div>
</div>
<div style="position: relative; height: 480px; margin-top: .5rem; overflow: auto;">
    @include('opcion.error')
    @include('opcion.validacion')
    @include('opcion.confirmacion')
    <table class="table table-sm table-hover table-bordered">
        <thead class="thead-light">
            <tr>
                <th>
                    <strong>Convocatoria</strong>
                </th>
                <th>
                    <strong>Postulante</strong>
                </th>
                @can('postulations.show')
                    <th class="text-center">
                        <strong>Ver</strong>
                    </th>
                @endcan
                @can('postulations.destroy')
                    <th class="text-center">
                        <strong>Eliminar</strong>
                    </th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($postulations as $postulation)
                <tr>
                    <td>{{$postulation->convocatoria->titulo}}</td>
                    <td>{{$postulation->user->name}} {{$postulation->user->apellido}}</td>
                    @can('postulations.show')
                        <td class="text-center" width="10px">
                            <button type="button" class="btn btn-info px-3 btn-sm" data-toggle="modal" data-target="#ShowPost{{$postulation->id}}"><i class="fas fa-eye"></i></button>
                            <div class="modal fade" id="ShowPost{{$postulation->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        @include('postulations.show')
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endcan
                    @can('postulations.destroy')
                        <td class="text-center" width="10px">
                            <button type="button" class="btn btn-danger px-3 btn-sm" data-toggle="modal" data-target="#DestroyPost{{$postulation->id}}"><i class="fas fa-trash-alt"></i></button>
                            <div class="modal fade" id="DestroyPost{{$postulation->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title w-100" id="exampleModalLabel">Elminar Postulacion</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            La Postulacion se eliminara de la base de datos
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('postulations.destroy', $postulation->id) }}" method="POST">
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