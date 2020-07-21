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
    <table class="table table-sm table-hover table-bordered">
        <thead class="thead-light">
            <tr>
                <th class="text-center">
                    <strong>Nombre</strong>
                </th>
                <th class="text-center">
                    <strong>Tipo de archivo Merito</strong>
                </th>
                <th class="text-center">
                    <strong>Puntaje</strong>
                </th>
                <th class="text-center">
                    <strong>Ver</strong>
                </th>
                <th class="text-center">
                    <strong>Editar Puntaje</strong>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($certificados as $certificado)
                <tr>
                    <td>{{$certificado->name}}</td>
                    <td>
                        @if ($certificado->merito_id !== null)
                            Merito: {{$certificado->merito->tipo}}
                        @elseif ($certificado->item_id !== null)
                            Item: {{$certificado->item->titulo}}
                        @elseif ($certificado->subitem_id !== null)
                            Subitem: {{$certificado->subitem->titulo}}
                        @elseif ($certificado->detalle_id !== null)
                            Detalle: {{$certificado->detalle->titulo}}
                        @endif
                    </td>
                    <td>{{$certificado->puntos}}</td>
                    <td>
                        <a href="{{$certificado->file}}"  target="_blank">Ver</a>
                    </td>
                    <td class="text-center" width="10px">
                        <button type="button" class="btn btn-warning px-3 btn-sm" data-toggle="modal" data-target="#EditConv{{$certificado->id}}"><i class="fas fa-edit"></i></button>
                        <div class="modal fade" id="EditConv{{$certificado->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    @include('certificados.edit')
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection