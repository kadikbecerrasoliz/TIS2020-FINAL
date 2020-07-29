<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Crear Calificacion</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('calificaciones.store', [$postulation->id, $postulationRequerimiento->id]) }}" method="POST">
        {{ csrf_field() }}
            @foreach($postulationRequerimiento->requerimiento->requerimientoTematicas as $requerimientoTematica)
                <div class="form-row">
                    <div class="col">
                        <div class="md-form">
                            <input
                                type="number"
                                id="item-{{$requerimientoTematica->id}}"
                                class="form-control"
                                aria-describedby="{{$requerimientoTematica->id}}HelpBlock"
                                name="{{$requerimientoTematica->id}}"
                                required
                                min="0"
                                max="{{$requerimientoTematica->puntos}}"
                            >
                            <label for="{{$requerimientoTematica->id}}">{{$requerimientoTematica->tematica->name}} (Maximo: {{$requerimientoTematica->puntos}})</label>
                        </div>
                    </div>
                </div>
            @endforeach
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary waves-effect" type="submit" data-toggle="modal">Calificar</button>
        </div>
    </form>
</div>