@extends('layouts.app')

@section('content')
<div class="row m-0">
    <div class="col">
        <h3>Lista de solicitudes</h3>
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
                    <strong>Postulantes</strong>
                </th>
                <th>
                    <strong>Valorado</strong>
                </th>
                <th>
                    <strong>Kardex</strong>
                </th>
                @can('solicituds.show')
                    <th class="text-center">
                        <strong>Ver</strong>
                    </th>
                @endcan
                @can('solicituds.edit')
                    <th class="text-center">
                        <strong>Aceptar</strong>
                    </th>
                    <th class="text-center">
                        <strong>Rechazar</strong>
                    </th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($solicituds as $solicitud)
                <tr>
                    <td>{{$solicitud->convocatoria->titulo}}</td>
                    <td>{{$solicitud->user->name}} {{$solicitud->user->apellido}}</td>
                    <td>
                        <a href="{{$solicitud->valorado}}"  target="_blank">Ver</a>
                    </td>
                    <td>
                        <a href="{{$solicitud->kardex}}"  target="_blank">Ver</a>
                    </td>
                    @can('solicituds.show')
                        <td class="text-center" width="10px">
                            <button type="button" class="btn btn-info px-3 btn-sm" data-toggle="modal" data-target="#ShowSoli{{$solicitud->id}}"><i class="fas fa-eye"></i></button>
                            <div class="modal fade" id="ShowSoli{{$solicitud->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        @include('solicituds.show')
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endcan
                    @can('solicituds.edit')
                        <td class="text-center" width="10px">
                            <form action="{{ route('solicituds.apply', $solicitud->id) }}" method="GET">
                                <button class="btn btn-primary px-3 btn-sm" type="submit"><i class="fas fa-check"></i></button>
                            </form>
                        </td>
                        <td class="text-center" width="10px">
                            <form action="{{ route('solicituds.deny', $solicitud->id) }}" method="GET">
                                <button class="btn btn-secondary px-3 btn-sm" type="submit"><i class="fas fa-times"></i></button>
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection