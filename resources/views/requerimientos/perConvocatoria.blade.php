@extends('layouts.app')

@section('content')
<div class="row m-0">
    <div class="col">
        <h3>Listar requerimientos por convocatoria</h3>
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
                    <strong>Items</strong>
                </th>
                <th>
                    <strong>Cantidad</strong>
                </th>
                <th>
                    <strong>Horas Academicas</strong>
                </th>
                <th>
                    <strong>Destino</strong>
                </th>
                @can('calificaciones.index')
                    <th class="text-center">
                        <strong>Calificaciones</strong>
                    </th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($requerimientos as $requerimiento)
                <tr>
                    <td>{{$requerimiento->items}}</td>
                    <td>{{$requerimiento->cantidad}}</td>
                    <td>{{$requerimiento->hrsAcademic}}</td>
                    <td>{{$requerimiento->materia->name}}</td>
                    @can('calificaciones.index')
                        <td class="text-center" width="10px">
                            <form action="{{ route('requerimientos.calificaciones', $requerimiento->id) }}" method="GET">
                                <button class="btn btn-info px-3 btn-sm" type="submit"><i class="fas fa-eye"></i></button>
                            </form>
                        </td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection