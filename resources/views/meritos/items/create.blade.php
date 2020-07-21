<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Crear Item</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('items.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-row pb-2">
            <div class="col">
                <label for="roles">Merito</label>
                <select class="custom-select" id="merito_id" name="merito_id">
                    <option selected value="{{$merito->id}}"> {{$merito->tipo}} </option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="text"  id="materialRegisterFormTitulo" class="form-control" aria-describedby="materialRegisterFormTituloHelpBlock" name="titulo" value="{{ old('titulo') }}" required>
                    <label for="materialRegisterFormTitulo">Titulo *</label>
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