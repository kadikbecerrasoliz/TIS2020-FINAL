<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Editar Subitem</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('detalles.update', $detalle->id) }}" method="POST" class="text-center">
        {{ csrf_field() }}
        {{ @method_field('PUT') }}
        <div class="form-row pb-2">
            <div class="col">
                <label for="roles">Subitem</label>
                <select class="custom-select" id="subitem_id" name="subitem_id">
                    <option selected value="{{$subitem->id}}"> {{$subitem->titulo}} </option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="text"  id="materialRegisterFormTitulo" class="form-control" aria-describedby="materialRegisterFormTituloHelpBlock" name="titulo" value="{{ $detalle->titulo }}" required>
                    <label for="materialRegisterFormTitulo">Titulo *</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="number"  min="0" id="materialRegisterFormpuntos" class="form-control" aria-describedby="materialRegisterFormpuntosHelpBlock" name="puntos" value="{{ $detalle->puntos }}" required>
                    <label for="materialRegisterFormpuntos">Puntaje *</label>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary waves-effect" type="submit" data-toggle="modal">Guardar</button>
        </div>
    </form>
</div>