@extends('layouts.app')

@section('content')
<div class="row m-0">
    <div class="col">
        <h3>Listar Postulaciones</h3>
    </div>
</div>
<div style="position: relative; height: 460px; margin-top: .5rem; overflow: auto;">
    @include('opcion.error')
    @include('opcion.validacion')
    @include('opcion.confirmacion')
    @foreach ($postulations as $postulation)
        @if($postulation->convocatoria->fechaFin >= $today)
            <article class="article p-3 z-depth-1">
                <h2 class="article__title">{{ $postulation->convocatoria->titulo }}</h2>
                <div class="article__date">{{ $postulation->convocatoria->fechaIni }} - {{ $postulation->convocatoria->fechaFin }}</div>
                <div class="article__content">{{ $postulation->convocatoria->description }}</div>
                <div class="d-flex">
                    <form action="{{ route('postulantes.cargar', $postulation->id) }}" method="GET">
                        <button class="btn btn-info px-3 btn-sm" type="submit">Archivos de Convocatoria</button>
                    </form>
                </div>
            </article>
        @endif
    @endforeach
</div>
@endsection