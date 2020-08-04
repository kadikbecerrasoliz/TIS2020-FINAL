@extends('layouts.app')

@section('content')
<div class="row m-0">
    <div class="col">
        <h3>Listar calificaciones por requerimiento</h3>
    </div>
</div>

<div style="position: relative; height: 460px; margin-top: .5rem; overflow: auto;">
    @include('opcion.error')
    @include('opcion.validacion')
    @include('opcion.confirmacion')
    <article class="article p-4 m-4 z-depth-1">
        <div>
            {{-- Tabla de calificaciones por requerimiento --}}
            <div>
                <h4><strong>{{$requerimiento->materia->name}}</strong></h4>
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
                                <strong>Puntaje conocimientos</strong>
                            </th>
                            <th class="text-center">
                                <strong>Puntaje final</strong>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requerimientoPostulations as $requerimientoPostulation)
                            @foreach($requerimientoPostulation->calificaciones as $calificacion)
                                <tr>
                                    <td class="text-center">
                                        {{$calificacion->postulation->user->name}} {{$calificacion->postulation->user->apellido}}
                                    </td>
                                    <td class="text-center">
                                        {{$calificacion->postulation->puntaje_certificados}}
                                    </td>
                                    <td class="text-center">
                                        {{$calificacion->puntaje_final}}
                                    </td>
                                    <td class="text-center">
                                        {{$calificacion->puntaje_porcentual}}
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </article>
</div>
@endsection
