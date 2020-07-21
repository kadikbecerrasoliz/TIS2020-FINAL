<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Crear Merito</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('meritos.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-row pb-2">
            <div class="col">
                <label for="roles">Convocatoria</label>
                <select class="custom-select" id="convocatoria_id" name="convocatoria_id">
                    <option selected value="{{$convocatoria->id}}"> {{$convocatoria->titulo}} </option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="text"  id="materialRegisterFormclase" class="form-control" aria-describedby="materialRegisterFormclaseHelpBlock" name="tipo" value="{{ old('tipo') }}" required>
                    <label for="materialRegisterFormclase">Clase *</label>
                </div>
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