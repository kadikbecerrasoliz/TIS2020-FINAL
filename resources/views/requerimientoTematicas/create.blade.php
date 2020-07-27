<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Crear item de conocimiento</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('requerimientoTematicas.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-row pb-2">
            <div class="col">
                <label for="roles">Requerimiento</label>
                <select class="custom-select" id="requerimiento_id" name="requerimiento_id">
                    <option selected value="{{$requerimiento->id}}"> {{$requerimiento->materia->name}} </option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="roles">Tematicas</label>
                <select class="custom-select" id="tematica_id" name="tematica_id">
                @foreach ($tematicas as $tematica)
                    <option value="{{$tematica->id}}"> {{$tematica->name}} </option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="number"  id="materialRegisterFormpuntos" class="form-control" aria-describedby="materialRegisterFormpuntosHelpBlock" name="puntos" value="{{ old('puntos') }}" required>
                    <label for="materialRegisterFormpuntos">Puntaje *</label>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary waves-effect" type="submit" data-toggle="modal">Registrar</button>
        </div>
    </form>
</div>