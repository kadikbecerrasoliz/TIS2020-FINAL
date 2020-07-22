@extends('layouts.app')

@section('content')
<div class="row m-0">
    <div class="col">
        <h3>Listar Convocatoria</h3>
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
                    <strong>Titulo</strong>
                </th>
                <th>
                    <strong>Inicio</strong>
                </th>
                <th>
                    <strong>Fin</strong>
                </th>
                @can('archivos.show')
                    <th class="text-center">
                        <strong>Ver</strong>
                    </th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($convocatorias as $convocatoria)
                <tr>
                    <td>{{$convocatoria->titulo}}</td>
                    <td>{{$convocatoria->fechaIni}}</td>
                    <td>{{$convocatoria->fechaFin}}</td>
                    @can('archivos.show')
                        <td class="text-center" width="10px">
                            <form action="{{ route('postulations.perConvocatoria', $convocatoria->id) }}" method="GET">
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