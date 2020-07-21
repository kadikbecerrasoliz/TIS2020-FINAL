@extends('layouts.app')

@section('content')
<div class="row m-0">
    <div class="col">
        <h3>Listar Solicitudes</h3>
    </div>
</div>
<div style="position: relative; height: 460px; margin-top: .5rem; overflow: auto;">
    @include('opcion.error')
    @include('opcion.validacion')
    @include('opcion.confirmacion')
    @foreach ($solicituds as $solicitud)
        <article class="article p-3 z-depth-1">
            <h2 class="article__title">{{ $solicitud->convocatoria->titulo }}</h2>
            <div class="article__date">{{ $solicitud->convocatoria->fechaIni }} - {{ $solicitud->convocatoria->fechaFin }}</div>
            <div class="article__content">{{ $solicitud->convocatoria->description }}</div>
        </article>
    @endforeach
</div>
@endsection