@extends('layouts.app')

@section('content')
<div class="row m-0">
    <div class="col">
        <h3>Detalles de Convocatoria</h3>
    </div>
</div>
<div style="position: relative; height: 450px; margin-top: .5rem; overflow: auto;">
    @include('opcion.error')
    @include('opcion.validacion')
    @include('opcion.confirmacion')
    <article class="article p-4 m-4 z-depth-1">
        <h2 class="article__title">{{ $postulation->convocatoria->titulo }}</h2>
        <div class="article__content">{{ $postulation->convocatoria->description }}</div>
        {{-- Documentos --}}
        <div>
            <h4><strong>Documentos de Requisitos a Presentar</strong></h4>
            <ul>
                @foreach ($postulation->convocatoria->documentos as $documento)
                    <li>{{$documento->descripcion}} - {{$documento->importancia}}</li>
                @endforeach
            </ul>
        </div>
        <div>
            <div class="row">
                <div class="col">
                    <h4><strong>Documentos de Requisitos subidos</strong></h4>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end">
                        @can('postulantes.index')
                            <button type="button" class="btn btn-success btn-sm"data-toggle="modal" data-target="#modalPostulArchivo">Subir Documentos</button>
                            <div class="modal fade" id="modalPostulArchivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        @include('archivos.create')
                                    </div>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
            <table class="table table-sm table-hover table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Titulo</th>
                        <th>Archivo</th>
                        @can('postulantes.index')
                            <th>Eliminar</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($postulation->archivos as $archivo)
                        <tr>
                            <td>{{ $archivo->documento->descripcion }}</td>
                            <td>
                                <a class="btn btn-primary px-3 btn-sm" href="{{ $archivo->file }}"><i class="far fa-file-pdf"></i></a>
                            </td>
                            @can('postulantes.index')
                                <td class="text-center" width="10px">
                                    <form action="{{ route('archivos.destroy', $archivo->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger px-3 btn-sm" type="button" onclick="if(confirm('Deseas continuar?')){ this.form.submit();}"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
                            <strong>Puntaje</strong>
                        </th>
                        @can('postulantes.index')
                            <th class="text-center">
                                <strong>subir</strong>
                            </th>
                            <th class="text-center">
                                <strong>Archivos</strong>
                            </th>
                            <th class="text-center">
                                <strong>Acumulado</strong>
                            </th>
                            <th class="text-center">
                                <strong>Puntaje Final</strong>
                            </th>
                        @endcan
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
                            @can('postulantes.index')
                                <td class="text-center" width="10px">
                                    @if ($merito->items->count() == 0)
                                        <button type="button" class="btn btn-purple px-3 btn-sm" data-toggle="modal" data-target="#CreateMerito{{$merito->id}}"><i class="fas fa-plus-square"></i></button>
                                        <div class="modal fade" id="CreateMerito{{$merito->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    @include('certificados.meritos.create')
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @foreach ($merito->certificados as $certificado)
                                        <li class="d-flex">
                                            <a href="{{ $certificado->file }}">{{ $certificado->name }}</a>
                                            <form action="{{ route('certificados.destroy', $certificado->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger px-2 btn-sm" type="button" onclick="if(confirm('Deseas continuar?')){ this.form.submit();}"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </li>
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    @if ($merito->certificados->count() != 0)
                                        {{$merito->certificados->count() * $merito->puntos}}
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($merito->items->count() === 0)
                                        {{$merito->certificados->sum('puntos')}}
                                    @endif
                                </td>
                            @endcan
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
                                @can('postulantes.index')
                                    <td class="text-center" width="10px">
                                        @if ($item->subitems->count() == 0)
                                            <button type="button" class="btn btn-secondary px-3 btn-sm" data-toggle="modal" data-target="#CreateItem{{$item->id}}"><i class="fas fa-plus"></i></button>
                                            <div class="modal fade" id="CreateItem{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        @include('certificados.items.create')
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @foreach ($item->certificados as $certificado)
                                            <li class="d-flex">
                                                <a href="{{ $certificado->file }}">{{ $certificado->name }}</a>
                                                <form action="{{ route('certificados.destroy', $certificado->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-danger px-2 btn-sm" type="button" onclick="if(confirm('Deseas continuar?')){ this.form.submit();}"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </li>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        @if ($item->certificados->count() != 0)
                                            {{$item->certificados->count() * $item->puntos}}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($item->subitems->count() === 0)
                                            {{$item->certificados->sum('puntos')}}
                                        @endif
                                    </td>
                                @endcan
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
                                    @can('postulantes.index')
                                        <td class="text-center" width="10px">
                                            @if ($subitem->detalles->count() == 0)
                                                <button type="button" class="btn btn-secondary px-3 btn-sm" data-toggle="modal" data-target="#CreateSubitem{{$subitem->id}}"><i class="fas fa-plus"></i></button>
                                                <div class="modal fade" id="CreateSubitem{{$subitem->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            @include('certificados.subitems.create')
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @foreach ($subitem->certificados as $certificado)
                                                <li class="d-flex">
                                                    <a href="{{ $certificado->file }}">{{ $certificado->name }}</a>
                                                    <form action="{{ route('certificados.destroy', $certificado->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button class="btn btn-danger px-2 btn-sm" type="button" onclick="if(confirm('Deseas continuar?')){ this.form.submit();}"><i class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </li>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            @if ($subitem->certificados->count() != 0)
                                                {{$subitem->certificados->count() * $subitem->puntos}}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($subitem->detalles->count() === 0)
                                                {{$subitem->certificados->sum('puntos')}}
                                            @endif
                                        </td>
                                    @endcan
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
                                        @can('postulantes.index')
                                            <td class="text-center" width="10px">
                                                <button type="button" class="btn btn-secondary px-3 btn-sm" data-toggle="modal" data-target="#CreateDetalle{{$detalle->id}}"><i class="fas fa-plus"></i></button>
                                                <div class="modal fade" id="CreateDetalle{{$detalle->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            @include('certificados.detalles.create')
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @foreach ($detalle->certificados as $certificado)
                                                    <li class="d-flex">
                                                        <a href="{{ $certificado->file }}">{{ $certificado->name }}</a>
                                                        <form action="{{ route('certificados.destroy', $certificado->id) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button class="btn btn-danger px-2 btn-sm" type="button" onclick="if(confirm('Deseas continuar?')){ this.form.submit();}"><i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </li>
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                @if ($detalle->certificados->count() != 0)
                                                    {{$detalle->certificados->count() * $detalle->puntos}}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                {{$detalle->certificados->sum('puntos')}}
                                            </td>
                                        @endcan
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