@extends('layouts.app')

@section('content')
<div class="row m-0">
    <div class="col">
        <h3>Listar Convocatoria</h3>
    </div>
</div>
<div style="position: relative; height: 460px; margin-top: .5rem; overflow: auto;">
    @include('opcion.error')
    @include('opcion.validacion')
    @include('opcion.confirmacion')
    @foreach ($convocatorias as $convocatoria)
        <article class="article p-3 z-depth-1">
            <h2 class="article__title">{{ $convocatoria->titulo }}</h2>
            <div class="article__date">{{ $convocatoria->fechaIni }} - {{ $convocatoria->fechaFin }}</div>
            <div class="article__content">{{ $convocatoria->description }}</div>
            <div class="d-flex">
                <form action="{{ route('convoc.show', $convocatoria->id) }}" method="GET">
                    <button class="btn btn-info px-3 btn-sm" type="submit"><i class="fas fa-eye"></i></button>
                </form>
            </div>
      </article>
    @endforeach
</div>
@endsection