<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Crear Requisito</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('requisitos.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="col">
                <label for="roles">Convocatoria</label>
                <select class="custom-select" id="convocatoria_id" name="convocatoria_id">
                    <option value="{{$convocatoria->id}}"> {{$convocatoria->titulo}} </option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <textarea type="text" id="message" rows="2" class="form-control md-textarea" name="detalle" value="{{ old('detalle') }}" required></textarea>
                    <label for="message">Detalle *</label>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary waves-effect" type="submit" data-toggle="modal">Registrar</button>
        </div>
    </form>
</div>