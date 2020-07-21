<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Editar Documento a Presentar</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('documentos.update', $documento->id) }}" method="POST" class="text-center">
        {{ csrf_field() }}
        {{ @method_field('PUT') }}
        <div class="form-row">
            <div class="col">
                <label for="roles">Convocatoria</label>
                <select class="custom-select" id="convocatoria_id" name="convocatoria_id">
                    <option value="{{$documento->convocatoria->id}}"> {{$documento->convocatoria->titulo}} </option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <textarea type="text" id="message" rows="2" class="form-control md-textarea" name="descripcion" required>{{$documento->descripcion}}</textarea>
                    <label for="message">Descripcion *</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <select class="browser-default custom-select" name="importancia">
                    <option selected value="{{$documento->importancia}}"> {{$documento->importancia}} </option>
                    <option value="No Obligatorio">No Obligatorio</option>
                    <option value="Obligatorio">Obligatorio</option>
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary waves-effect" type="submit" data-toggle="modal">Guardar Cambios</button>
        </div>
    </form>
</div>