@extends('layouts.app')

@section('content')
<div class="row m-0">
    <div class="col">
        <h3>Lista de postulaciones por convocatoria</h3>
    </div>
</div>
<div style="position: relative; height: 480px; margin-top: .5rem; overflow: auto;">
    @include('opcion.error')
    @include('opcion.validacion')
    @include('opcion.confirmacion')
    <div>
        <div><br/></div>
        <h4><strong>Certificados y documentos por postulacion</strong></h4>
        <table class="table table-sm table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>
                        <strong>Postulante</strong>
                    </th>
                    <th>
                        <strong>Fecha de subscripcion</strong>
                    </th>
                    @can('archivos.show')
                        <th class="text-center">
                            <strong>Documentos</strong>
                        </th>
                    @endcan
                    @can('certificados.show')
                        <th class="text-center">
                            <strong>Certificados</strong>
                        </th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($postulations as $postulation)
                    <tr>
                        <td>{{$postulation->user->name}} {{$postulation->user->apellido}}</td>
                        <td>{{$postulation->created_at->format('Y-m-d')}}</td>
                        @can('archivos.show')
                            <td class="text-center">
                                <a href="{{ route('archivos.perPostulation', $postulation->id) }}">
                                    <button type="button" class="btn btn-dark px-3 btn-sm"><i class="fas fa-eye"></i></button>
                                </a>
                            </td>
                        @endcan
                        @can('certificados.show')
                        <td class="text-center" width="10px">
                            <a href="{{ route('certificados.perPostulation', $postulation->id) }}">
                                <button type="button" class="btn btn-info px-3 btn-sm"><i class="fas fa-eye"></i></button>
                            </a>
                        </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection