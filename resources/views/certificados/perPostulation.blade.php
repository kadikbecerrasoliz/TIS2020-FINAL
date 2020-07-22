@extends('layouts.app')

@section('content')
<div class="row m-0">
    <div class="col">
        <h3>Listar Archivos de Merito</h3>
    </div>
</div>
<div style="position: relative; height: 460px; margin-top: .5rem; overflow: auto;">
    @include('opcion.error')
    @include('opcion.validacion')
    @include('opcion.confirmacion')
    {{-- Certificados --}}
    <div>
        <h4><strong>Meritos</strong></h4>
        <table class="table table-sm table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>
                        <strong>Indice</strong>
                    </th>
                    <th>
                        <strong>Tipo</strong>
                    </th>
                    <th>
                        <strong>Puntos</strong>
                    </th>
                    <th class="text-center">
                        <strong>Ver archivos / Editar Puntaje</strong>
                    </th>
                    <th class="text-center">
                        <strong>Puntaje Final</strong>
                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- Meritos --}}
                @foreach ($postulation->convocatoria->meritos as $merito)
                    <tr class="blue lighten-2">
                        <td>{{$merito->indice}}</td>
                        <td>{{$merito->tipo}}</td>
                        <td>
                            <div class="d-flex justify-content-center font-weight-bold">
                                <strong>{{$merito->puntos}} pts.</strong>
                            </div>
                        </td>
                        <td>
                            @foreach ($merito->certificados as $certificado)
                                <li class="d-flex">
                                    <a href="{{ $certificado->file }}">{{ $certificado->name }} ({{ $certificado->puntos }} Pts.)</a>
                                    <button type="button" class="btn btn-warning px-3 btn-sm" data-toggle="modal" data-target="#EditConv{{$certificado->id}}"><i class="fas fa-edit"></i></button>
                                    <div class="modal fade" id="EditConv{{$certificado->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                @include('certificados.edit')
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </td>
                        <td class="text-center">
                            @if ($merito->items->count() === 0)
                                {{$merito->certificados->sum('puntos')}}
                            @endif
                        </td>
                    </tr>
                    {{-- Items --}}
                    @foreach ($merito->items as $item)
                        <tr class="blue lighten-3">
                            <td>{{$merito->indice}}.{{$item->indice}}</td>
                            <td>{{$item->titulo}}</td>
                            <td>
                                <div class="d-flex justify-content-start font-weight-bolder">
                                    {{$item->puntos}} pts.
                                </div>
                            </td>
                            <td>
                                @foreach ($item->certificados as $certificado)
                                    <li class="d-flex">
                                        <a href="{{ $certificado->file }}">{{ $certificado->name }} ({{ $certificado->puntos }} Pts.)</a>
                                        <button type="button" class="btn btn-warning px-3 btn-sm" data-toggle="modal" data-target="#EditConv{{$certificado->id}}"><i class="fas fa-edit"></i></button>
                                        <div class="modal fade" id="EditConv{{$certificado->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    @include('certificados.edit')
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </td>
                            <td class="text-center">
                                @if ($item->subitems->count() === 0)
                                    {{$item->certificados->sum('puntos')}}
                                @endif
                            </td>
                        </tr>
                        {{-- Sub Items --}}
                        @foreach ($item->subitems as $subitem)
                            <tr class="blue lighten-4">
                                <td>{{$merito->indice}}.{{$item->indice}}.{{$subitem->indice}}</td>
                                <td>{{$subitem->titulo}}</td>
                                <td>
                                    <div class="d-flex justify-content-center font-weight-normal">
                                        {{$subitem->puntos}} pts.
                                    </div>
                                </td>
                                <td>
                                    @foreach ($subitem->certificados as $certificado)
                                        <li class="d-flex">
                                            <a href="{{ $certificado->file }}">{{ $certificado->name }} ({{ $certificado->puntos }} Pts.)</a>
                                            <button type="button" class="btn btn-warning px-3 btn-sm" data-toggle="modal" data-target="#EditConv{{$certificado->id}}"><i class="fas fa-edit"></i></button>
                                            <div class="modal fade" id="EditConv{{$certificado->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        @include('certificados.edit')
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    @if ($subitem->detalles->count() === 0)
                                        {{$subitem->certificados->sum('puntos')}}
                                    @endif
                                </td>
                            </tr>
                            {{-- Detalles --}}
                            @foreach ($subitem->detalles as $detalle)
                                <tr class="blue lighten-5">
                                    <td>{{$merito->indice}}.{{$item->indice}}.{{$subitem->indice}}.{{$detalle->indice}}</td>
                                    <td>{{$detalle->titulo}}</td>
                                    <td>
                                        <div class="d-flex justify-content-end font-weight-light">
                                            {{$detalle->puntos}} pts.
                                        </div>
                                    </td>
                                    <td>
                                        @foreach ($detalle->certificados as $certificado)
                                            <li class="d-flex">
                                                <a href="{{ $certificado->file }}">{{ $certificado->name }} ({{ $certificado->puntos }} Pts.)</a>
                                                <button type="button" class="btn btn-warning px-3 btn-sm" data-toggle="modal" data-target="#EditConv{{$certificado->id}}"><i class="fas fa-edit"></i></button>
                                                <div class="modal fade" id="EditConv{{$certificado->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            @include('certificados.edit')
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        {{$detalle->certificados->sum('puntos')}}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- Tabla de calificaciones del postulante --}}
    <div>
        <h4><strong>Tabla de calificaciones</strong></h4>
        <table class="table table-sm table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">
                        <strong>Postulante</strong>
                    </th>
                    <th class="text-center">
                        <strong>Puntaje certificados</strong>
                    </th>
                    <th class="text-center">
                        <strong>Puntaje examen</strong>
                    </th>
                    @can('certificados.edit')
                        <th class="text-center">
                            <strong>Editar</strong>
                        </th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                <tr class="orange lighten-4">
                    <td width="30px" class="text-center">{{$postulation->user->name}} {{$postulation->user->apellido}}</td>
                    <td width="30px" class="text-center">{{$postulation->puntaje_certificados}}
                        <!-- / {{$postulation->convocatoria->meritos->sum('puntos')}} -->
                    </td>
                    <td width="30px" class="text-center">
                        @if($postulation->puntaje_examen === null)
                            En revision
                        @else
                            {{$postulation->puntaje_examen}} / 100
                        @endif
                    </td>
                    @can('certificados.edit')
                        <td width="10px" class="text-center">
                            <button type="button" class="btn btn-warning px-3 btn-sm" data-toggle="modal" data-target="#EditExamen{{$certificado->id}}"><i class="fas fa-edit"></i></button>
                            <div class="modal fade" id="EditExamen{{$certificado->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        @include('postulations.editPuntajeExamen')
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endcan
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
