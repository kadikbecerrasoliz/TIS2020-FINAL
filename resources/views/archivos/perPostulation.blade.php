@extends('layouts.app')

@section('content')
<div class="row m-0">
    <div class="col">
        <h3>Lista de documentos del postulante</h3>
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
                    <strong>Documento</strong>
                </th>
                <th>
                    <strong>Importancia</strong>
                </th>
                <th>
                    <strong>Estado</strong>
                </th>
                @can('archivos.show')
                    <th class="text-center">
                        <strong>Documento</strong>
                    </th>
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
            @foreach ($archivos as $archivo)
                <tr>
                    <td>{{$archivo->documento->descripcion}}</td>
                    <td>{{$archivo->documento->importancia}}</td>
                    @if($archivo->estado === 'En revision')
                        <td style="color: grey;">
                            {{$archivo->estado}}
                        </td>
                    @elseif($archivo->estado === 'Aceptado')
                        <td style="color: green;">
                            {{$archivo->estado}}
                        </td>
                    @else
                        <td style="color: red;">
                            {{$archivo->estado}}
                        </td>
                    @endif
                    <td class="text-center">
                        <a href="{{$archivo->file}}"  target="_blank">Ver</a>
                    </td>
                    @can('archivos.edit')
                        <td class="text-center" width="10px">
                            <form action="{{ route('archivos.accept', $archivo->id) }}" method="GET">
                                <button class="btn btn-primary px-3 btn-sm" type="submit"><i class="fas fa-check"></i></button>
                            </form>
                        </td>
                        <td class="text-center" width="10px">
                            <button type="button" class="btn btn-secondary px-3 btn-sm" data-toggle="modal" data-target="#DenyDoc{{$archivo->id}}"><i class="fas fa-times"></i></button>
                            <div class="modal fade" id="DenyDoc{{$archivo->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        @include('archivos.deny')
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