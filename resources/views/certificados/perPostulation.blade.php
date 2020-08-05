@extends('layouts.app')

@section('content')
<div class="row m-0">
    <div class="col">
        <h3>Listar certificados y postulaciones a requerimientos</h3>
    </div>
</div>

<div style="position: relative; height: 460px; margin-top: .5rem; overflow: auto;">
    @include('opcion.error')
    @include('opcion.validacion')
    @include('opcion.confirmacion')
    <article class="article p-4 m-4 z-depth-1">
        <div>
            {{-- Tabla de aprovacion o rechazo de postulacion de requisitos --}}
            <div>
                <h4><strong>Requerimientos suscritos</strong></h4>
                <table class="table table-sm table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">
                                <strong>Requerimiento</strong>
                            </th>
                            <th class="text-center">
                                <strong>Fecha de postulacion</strong>
                            </th>
                            @can('certificados.edit')
                                <th class="text-center">
                                    <strong>Aprobar</strong>
                                </th>
                            @endcan
                            @can('certificados.edit')
                                <th class="text-center">
                                    <strong>Rechazar</strong>
                                </th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($postulation->postulationRequerimientos->where('estado', 'En revision') as $postulationRequerimiento)
                            <tr>
                                <td class="text-center">
                                    {{$postulationRequerimiento->requerimiento->materia->name}}
                                </td>
                                <td class="text-center">
                                    {{$postulationRequerimiento->created_at}}
                                </td>
                                @can('certificados.edit')
                                    <td class="text-center">
                                        <form action="{{ route('requerimientos.postulaciones.apply', $postulationRequerimiento->id) }}" method="GET">
                                            <button class="btn btn-primary px-3 btn-sm" type="submit"><i class="fas fa-check"></i></button>
                                        </form>
                                    </td>
                                @endcan
                                @can('certificados.edit')
                                    <td class="text-center">
                                        <form action="{{ route('requerimientos.postulaciones.deny', $postulationRequerimiento->id) }}" method="GET">
                                            <button class="btn btn-secondary px-3 btn-sm" type="submit"><i class="fas fa-times"></i></button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Tabla de calificaciones del postulante --}}
            <div>
                <h4><strong>Tabla de calificacion de conocimientos</strong></h4>
                <table class="table table-sm table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">
                                <strong>Requerimiento</strong>
                            </th>
                            <th class="text-center">
                                <strong>Fecha de postulacion</strong>
                            </th>
                            <th class="text-center">
                                <strong>Puntaje</strong>
                            </th>
                            @can('certificados.edit')
                                <th class="text-center">
                                    <strong>Calificar</strong>
                                </th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($postulation->postulationRequerimientos->where('estado', 'Aprobado') as $postulationRequerimiento)
                            <tr>
                                <td class="text-center">
                                    {{$postulationRequerimiento->requerimiento->materia->name}}
                                </td>
                                <td class="text-center">
                                    {{$postulationRequerimiento->created_at->format('Y-m-d')}}
                                </td>
                                <td class="text-center">
                                    @foreach($postulation->calificaciones->where('postulation_requerimiento_id', $postulationRequerimiento->id) as $calificacion)
                                        {{$calificacion->puntaje_final}}
                                    @endforeach
                                </td>
                                @if($postulation->calificaciones->where('postulation_requerimiento_id', $postulationRequerimiento->id)->count() === 0)
                                    @can('certificados.edit')
                                        <td class="text-center" width="10px">
                                            <button type="button" class="btn btn-secondary px-3 btn-sm" data-toggle="modal" data-target="#CreateCal{{$postulationRequerimiento->id}}"><i class="fas fa-plus"></i></button>
                                            <div class="modal fade" id="CreateCal{{$postulationRequerimiento->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        @include('calificaciones.create')
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @endcan
                                @else
                                    @can('certificados.edit')
                                        <td class="text-center" width="10px">
                                            <button type="button" class="btn btn-warning px-3 btn-sm" data-toggle="modal" data-target="#EditCal{{$postulationRequerimiento->id}}"><i class="fas fa-edit"></i></button>
                                            <div class="modal fade" id="EditCal{{$postulationRequerimiento->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        @include('calificaciones.edit')
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @endcan
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Certificados --}}
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
    </article>
</div>
@endsection
