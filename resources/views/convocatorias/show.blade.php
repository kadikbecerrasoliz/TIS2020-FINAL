@extends('layouts.app')

@section('content')
<div class="row m-0">
    <div class="col">
        <h3>Detalles de Convocatoria</h3>
    </div>
    <div class="col">
        <div class="d-flex justify-content-end">
            @can('convocatorias.create')
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalRequeForm">Add Reque.</button>
                <div class="modal fade" id="modalRequeForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            @include('requerimientos.create')
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modalRequiForm">Add Requi.</button>
                <div class="modal fade" id="modalRequiForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            @include('requisitos.create')
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalDocuForm">Add Docu.</button>
                <div class="modal fade" id="modalDocuForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            @include('documentos.create')
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalFechaForm">Ad Evento.</button>
                <div class="modal fade" id="modalFechaForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            @include('fechas.create')
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#modalMeritoForm">Add Meritos.</button>
                <div class="modal fade" id="modalMeritoForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            @include('meritos.create')
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>
</div>
<div style="position: relative; height: 450px; margin-top: .5rem; overflow: auto;">
    @include('opcion.error')
    @include('opcion.validacion')
    @include('opcion.confirmacion')
    <article class="article p-4 m-4 z-depth-1">
        <h2 class="article__title">{{ $convocatoria->titulo }}</h2>
        <div class="article__content">{{ $convocatoria->description }}</div>
        {{-- Requerimientos --}}
        <div>
            <h4><strong>Requerimientos</strong></h4>
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
                        @can('convocatorias.show')
                            <th class="text-center">
                                <strong>Ver</strong>
                            </th>
                        @endcan
                        @can('convocatorias.edit')
                            <th class="text-center">
                                <strong>Editar</strong>
                            </th>
                        @endcan
                        @can('convocatorias.destroy')
                            <th class="text-center">
                                <strong>Eliminar</strong>
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
                            @can('convocatorias.show')
                                <td class="text-center" width="10px">
                                    <button type="button" class="btn btn-info px-3 btn-sm" data-toggle="modal" data-target="#ShowReq{{$requerimiento->id}}"><i class="fas fa-eye"></i></button>
                                    <div class="modal fade" id="ShowReq{{$requerimiento->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                @include('requerimientos.show')
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endcan
                            @can('convocatorias.edit')
                                <td class="text-center" width="10px">
                                    <button type="button" class="btn btn-warning px-3 btn-sm" data-toggle="modal" data-target="#EditReq{{$requerimiento->id}}"><i class="fas fa-edit"></i></button>
                                    <div class="modal fade" id="EditReq{{$requerimiento->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                @include('requerimientos.edit')
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endcan
                            @can('convocatorias.destroy')
                                <td class="text-center" width="10px">
                                    <button type="button" class="btn btn-danger px-3 btn-sm" data-toggle="modal" data-target="#DestroyReq{{$requerimiento->id}}"><i class="fas fa-trash-alt"></i></button>
                                    <div class="modal fade" id="DestroyReq{{$requerimiento->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title w-100" id="exampleModalLabel">Elminar Requerimiento</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    El requerimiento se eliminara de la base de datos
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('requerimientos.destroy', $requerimiento->id) }}" method="POST">
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
        {{-- Requisitos --}}
        <div>
            <h4><strong>Requisitos</strong></h4>
            <table class="table table-sm table-hover table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>
                            <strong>Detalle</strong>
                        </th>
                        @can('convocatorias.show')
                            <th class="text-center">
                                <strong>Ver</strong>
                            </th>
                        @endcan
                        @can('convocatorias.edit')
                            <th class="text-center">
                                <strong>Editar</strong>
                            </th>
                        @endcan
                        @can('convocatorias.destroy')
                            <th class="text-center">
                                <strong>Eliminar</strong>
                            </th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requisitos as $requisito)
                        <tr>
                            <td>{{$requisito->detalle}}</td>
                            @can('convocatorias.show')
                                <td class="text-center" width="10px">
                                    <button type="button" class="btn btn-info px-3 btn-sm" data-toggle="modal" data-target="#ShowRequi{{$requisito->id}}"><i class="fas fa-eye"></i></button>
                                    <div class="modal fade" id="ShowRequi{{$requisito->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                @include('requisitos.show')
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endcan
                            @can('convocatorias.edit')
                                <td class="text-center" width="10px">
                                    <button type="button" class="btn btn-warning px-3 btn-sm" data-toggle="modal" data-target="#EditRequi{{$requisito->id}}"><i class="fas fa-edit"></i></button>
                                    <div class="modal fade" id="EditRequi{{$requisito->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                @include('requisitos.edit')
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endcan
                            @can('convocatorias.destroy')
                                <td class="text-center" width="10px">
                                    <button type="button" class="btn btn-danger px-3 btn-sm" data-toggle="modal" data-target="#DestroyRequi{{$requisito->id}}"><i class="fas fa-trash-alt"></i></button>
                                    <div class="modal fade" id="DestroyRequi{{$requisito->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title w-100" id="exampleModalLabel">Elminar Requisito</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    El requisito se eliminara de la base de datos
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('requisitos.destroy', $requisito->id) }}" method="POST">
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
        {{-- Documentos a presentar --}}
        <div>
            <h4><strong>Documentos de Requisitos a Presentar</strong></h4>
            <table class="table table-sm table-hover table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>
                            <strong>Descripción</strong>
                        </th>
                        <th>
                            <strong>Importancia</strong>
                        </th>
                        @can('convocatorias.show')
                            <th class="text-center">
                                <strong>Ver</strong>
                            </th>
                        @endcan
                        @can('convocatorias.edit')
                            <th class="text-center">
                                <strong>Editar</strong>
                            </th>
                        @endcan
                        @can('convocatorias.destroy')
                            <th class="text-center">
                                <strong>Eliminar</strong>
                            </th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documentos as $documento)
                        <tr>
                            <td>{{$documento->descripcion}}</td>
                            <td>{{$documento->importancia}}</td>
                            @can('convocatorias.show')
                                <td class="text-center" width="10px">
                                    <button type="button" class="btn btn-info px-3 btn-sm" data-toggle="modal" data-target="#ShowDoc{{$documento->id}}"><i class="fas fa-eye"></i></button>
                                    <div class="modal fade" id="ShowDoc{{$documento->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                @include('documentos.show')
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endcan
                            @can('convocatorias.edit')
                                <td class="text-center" width="10px">
                                    <button type="button" class="btn btn-warning px-3 btn-sm" data-toggle="modal" data-target="#EditDoc{{$documento->id}}"><i class="fas fa-edit"></i></button>
                                    <div class="modal fade" id="EditDoc{{$documento->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                @include('documentos.edit')
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endcan
                            @can('convocatorias.destroy')
                                <td class="text-center" width="10px">
                                    <button type="button" class="btn btn-danger px-3 btn-sm" data-toggle="modal" data-target="#DestroyDoc{{$documento->id}}"><i class="fas fa-trash-alt"></i></button>
                                    <div class="modal fade" id="DestroyDoc{{$documento->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title w-100" id="exampleModalLabel">Elminar Documento</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    El Documento se eliminara de la base de datos
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST">
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
        {{-- Fechas de pruebas --}}
        <div>
            <h4><strong>Fecha de Pruebas</strong></h4>
            <table class="table table-sm table-hover table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>
                            <strong>Evento</strong>
                        </th>
                        <th>
                            <strong>Hora de Inicio</strong>
                        </th>
                        <th>
                            <strong>Fecha de Inicio</strong>
                        </th>
                        <th>
                            <strong>Hora de Fin</strong>
                        </th>
                        <th>
                            <strong>Fecha de Fin</strong>
                        </th>
                        @can('convocatorias.show')
                            <th class="text-center">
                                <strong>Ver</strong>
                            </th>
                        @endcan
                        @can('convocatorias.edit')
                            <th class="text-center">
                                <strong>Editar</strong>
                            </th>
                        @endcan
                        @can('convocatorias.destroy')
                            <th class="text-center">
                                <strong>Eliminar</strong>
                            </th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fechas as $fecha)
                        <tr>
                            <td>{{$fecha->evento}}</td>
                            <td>{{$fecha->horaIni}}</td>
                            <td>{{$fecha->fechaIni}}</td>
                            <td>{{$fecha->horaFin}}</td>
                            <td>{{$fecha->fechaFin}}</td>
                            @can('convocatorias.show')
                                <td class="text-center" width="10px">
                                    <button type="button" class="btn btn-info px-3 btn-sm" data-toggle="modal" data-target="#ShowDate{{$fecha->id}}"><i class="fas fa-eye"></i></button>
                                    <div class="modal fade" id="ShowDate{{$fecha->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                @include('fechas.show')
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endcan
                            @can('convocatorias.edit')
                                <td class="text-center" width="10px">
                                    <button type="button" class="btn btn-warning px-3 btn-sm" data-toggle="modal" data-target="#EditDate{{$fecha->id}}"><i class="fas fa-edit"></i></button>
                                    <div class="modal fade" id="EditDate{{$fecha->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                @include('fechas.edit')
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endcan
                            @can('convocatorias.destroy')
                                <td class="text-center" width="10px">
                                    <button type="button" class="btn btn-danger px-3 btn-sm" data-toggle="modal" data-target="#DestroyDate{{$fecha->id}}"><i class="fas fa-trash-alt"></i></button>
                                    <div class="modal fade" id="DestroyDate{{$fecha->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title w-100" id="exampleModalLabel">Elminar Evento</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    El Evento se eliminara de la base de datos
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('fechas.destroy', $fecha->id) }}" method="POST">
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
        {{-- Meritos --}}
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
                        @can('convocatorias.show')
                            <th class="text-center">
                                <strong>Ver</strong>
                            </th>
                        @endcan
                        @can('convocatorias.edit')
                            <th class="text-center">
                                <strong>Editar</strong>
                            </th>
                        @endcan
                        @can('convocatorias.destroy')
                            <th class="text-center">
                                <strong>Eliminar</strong>
                            </th>
                        @endcan
                        @can('convocatorias.edit')
                            <th class="text-center">
                                <strong>Item</strong>
                            </th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    {{-- Meritos --}}
                    @foreach ($meritos as $merito)
                        <tr class="blue">
                            <td>{{$merito->indice}}</td>
                            <td>{{$merito->tipo}}</td>
                            <td>{{$merito->puntos}} pts.</td>
                            @can('convocatorias.show')
                                <td class="text-center" width="10px">
                                    <button type="button" class="btn btn-info px-3 btn-sm" data-toggle="modal" data-target="#ShowMerito{{$merito->id}}"><i class="fas fa-eye"></i></button>
                                    <div class="modal fade" id="ShowMerito{{$merito->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                @include('meritos.show')
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endcan
                            @can('convocatorias.edit')
                                <td class="text-center" width="10px">
                                    <button type="button" class="btn btn-warning px-3 btn-sm" data-toggle="modal" data-target="#EditMerito{{$merito->id}}"><i class="fas fa-edit"></i></button>
                                    <div class="modal fade" id="EditMerito{{$merito->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                @include('meritos.edit')
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endcan
                            @can('convocatorias.destroy')
                                <td class="text-center" width="10px">
                                    <button type="button" class="btn btn-danger px-3 btn-sm" data-toggle="modal" data-target="#DestroyMerito{{$merito->id}}"><i class="fas fa-trash-alt"></i></button>
                                    <div class="modal fade" id="DestroyMerito{{$merito->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title w-100" id="exampleModalLabel">Elminar Merito</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    El Merito se eliminara de la base de datos
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('meritos.destroy', $merito->id) }}" method="POST">
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
                            @can('convocatorias.create')
                                <td class="text-center" width="10px">
                                    <button type="button" class="btn btn-purple px-3 btn-sm" data-toggle="modal" data-target="#CreateItem{{$merito->id}}"><i class="fas fa-plus-square"></i></button>
                                    <div class="modal fade" id="CreateItem{{$merito->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                @include('meritos.items.create')
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endcan
                        </tr>
                        {{-- Items --}}
                        @foreach ($merito->items as $item)
                            <tr class="blue lighten-2">
                                <td>{{$merito->indice}}.{{$item->indice}}</td>
                                <td>{{$item->titulo}}</td>
                                <td>{{$item->puntos}} pts.</td>
                                @can('convocatorias.show')
                                    <td class="text-center" width="10px">
                                        <button type="button" class="btn btn-info px-3 btn-sm" data-toggle="modal" data-target="#ShowItem{{$item->id}}"><i class="fas fa-eye"></i></button>
                                        <div class="modal fade" id="ShowItem{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    @include('meritos.items.show')
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                @endcan
                                @can('convocatorias.edit')
                                    <td class="text-center" width="10px">
                                        <button type="button" class="btn btn-warning px-3 btn-sm" data-toggle="modal" data-target="#EditItem{{$item->id}}"><i class="fas fa-edit"></i></button>
                                        <div class="modal fade" id="EditItem{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    @include('meritos.items.edit')
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                @endcan
                                @can('convocatorias.destroy')
                                    <td class="text-center" width="10px">
                                        <button type="button" class="btn btn-danger px-3 btn-sm" data-toggle="modal" data-target="#DestroyItem{{$item->id}}"><i class="fas fa-trash-alt"></i></button>
                                        <div class="modal fade" id="DestroyItem{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title w-100" id="exampleModalLabel">Elminar Item</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        El Item se eliminara de la base de datos
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('items.destroy', $item->id) }}" method="POST">
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
                                @can('convocatorias.create')
                                    <td class="text-center" width="10px">
                                        <button type="button" class="btn btn-secondary px-3 btn-sm" data-toggle="modal" data-target="#CreateSubItem{{$item->id}}"><i class="fas fa-plus"></i></button>
                                        <div class="modal fade" id="CreateSubItem{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    @include('meritos.items.subitems.create')
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                @endcan
                            </tr>
                            {{-- Sub Items --}}
                            @foreach ($item->subitems as $subitem)
                                <tr class="blue lighten-4">
                                    <td>{{$merito->indice}}.{{$item->indice}}.{{$subitem->indice}}</td>
                                    <td>{{$subitem->titulo}}</td>
                                    <td>{{$subitem->puntos}} pts</td>
                                    @can('convocatorias.show')
                                        <td class="text-center" width="10px">
                                            <button type="button" class="btn btn-info px-3 btn-sm" data-toggle="modal" data-target="#ShowSubItem{{$subitem->id}}"><i class="fas fa-eye"></i></button>
                                            <div class="modal fade" id="ShowSubItem{{$subitem->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        @include('meritos.items.subitems.show')
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @endcan
                                    @can('convocatorias.edit')
                                        <td class="text-center" width="10px">
                                            <button type="button" class="btn btn-warning px-3 btn-sm" data-toggle="modal" data-target="#EditSubItem{{$subitem->id}}"><i class="fas fa-edit"></i></button>
                                            <div class="modal fade" id="EditSubItem{{$subitem->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        @include('meritos.items.subitems.edit')
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @endcan
                                    @can('convocatorias.destroy')
                                        <td class="text-center" width="10px">
                                            <button type="button" class="btn btn-danger px-3 btn-sm" data-toggle="modal" data-target="#DestroySubItem{{$subitem->id}}"><i class="fas fa-trash-alt"></i></button>
                                            <div class="modal fade" id="DestroySubItem{{$subitem->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title w-100" id="exampleModalLabel">Elminar Subitem</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            El Subitem se eliminara de la base de datos
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('subitems.destroy', $subitem->id) }}" method="POST">
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
                                    @can('convocatorias.create')
                                        <td class="text-center" width="10px">
                                            <button type="button" class="btn btn-secondary px-3 btn-sm" data-toggle="modal" data-target="#CreateDetalle{{$subitem->id}}"><i class="fas fa-plus"></i></button>
                                            <div class="modal fade" id="CreateDetalle{{$subitem->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        @include('meritos.items.subitems.detalles.create')
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @endcan
                                </tr>
                                {{-- Detalles --}}
                                @foreach ($subitem->detalles as $detalle)
                                    <tr class="">
                                        <td>{{$merito->indice}}.{{$item->indice}}.{{$subitem->indice}}.{{$detalle->indice}}</td>
                                        <td>{{$detalle->titulo}}</td>
                                        <td>{{$detalle->puntos}} pts.</td>
                                        @can('convocatorias.show')
                                            <td class="text-center" width="10px">
                                                <button type="button" class="btn btn-info px-3 btn-sm" data-toggle="modal" data-target="#ShowDetalle{{$detalle->id}}"><i class="fas fa-eye"></i></button>
                                                <div class="modal fade" id="ShowDetalle{{$detalle->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            @include('meritos.items.subitems.detalles.show')
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        @endcan
                                        @can('convocatorias.edit')
                                            <td class="text-center" width="10px">
                                                <button type="button" class="btn btn-warning px-3 btn-sm" data-toggle="modal" data-target="#EditDetalle{{$detalle->id}}"><i class="fas fa-edit"></i></button>
                                                <div class="modal fade" id="EditDetalle{{$detalle->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            @include('meritos.items.subitems.detalles.edit')
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        @endcan
                                        @can('convocatorias.destroy')
                                            <td class="text-center" width="10px">
                                                <button type="button" class="btn btn-danger px-3 btn-sm" data-toggle="modal" data-target="#DestroyDetalle{{$detalle->id}}"><i class="fas fa-trash-alt"></i></button>
                                                <div class="modal fade" id="DestroyDetalle{{$detalle->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title w-100" id="exampleModalLabel">Elminar Detalle</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                El Detalle se eliminara de la base de datos
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('detalles.destroy', $detalle->id) }}" method="POST">
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
                                        @can('convocatorias.create')
                                            <td></td>
                                        @endcan
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Calificacion de meritos --}}
        @can('meritos.certificados.calificar')
            <div>
                <h4><strong>Postulaciones</strong></h4>
                <table class="table table-sm table-hover table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">
                                <strong>Nombre del postulante</strong>
                            </th>
                            <th class="text-center">
                                <strong>Apellido del postulante</strong>
                            </th>
                            <th class="text-center">
                                <strong>Fecha de subscripcion</strong>
                            </th>
                            @can('certificados.index')
                                <th class="text-center">
                                    <strong>Certificados subidos</strong>
                                </th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Postulaciones --}}
                        @foreach ($convocatoria->postulations as $postulation)
                            <tr>
                                <td>{{$postulation->user->name}}</td>
                                <td>{{$postulation->user->apellido}}</td>
                                <td>{{$postulation->created_at}}</td>
                                @can('certificados.index')
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
        @endcan
    </article>
</div>
@endsection