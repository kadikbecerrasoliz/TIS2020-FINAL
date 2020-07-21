<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Crear Convocatoria</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('convocatorias.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="text"  id="materialRegisterFormName" class="form-control" aria-describedby="materialRegisterFormNameHelpBlock" name="titulo" value="{{ old('titulo') }}" required>
                    <label for="materialRegisterFormName">Titulo *</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <textarea type="text" id="message" rows="2" class="form-control md-textarea" name="description" value="{{ old('description') }}" required></textarea>
                    <label for="message">Descripción *</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="date"  id="materialRegisterFormName" class="form-control" aria-describedby="materialRegisterFormNameHelpBlock" name="fechaIni" value="{{ old('fechaIni') }}" required>
                    <label for="materialRegisterFormName">Fecha de inicio *</label>
                </div>
            </div>
            <div class="col">
                <div class="md-form">
                    <input type="date"  id="materialRegisterFormNDescripción" class="form-control" aria-describedby="materialRegisterFormNDescripciónHelpBlock" name="fechaFin" value="{{ old('fechaFin') }}" required>
                    <label for="materialRegisterFormNDescripción">Fecha final *</label>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary waves-effect" type="submit" data-toggle="modal">Registrar</button>
        </div>
    </form>
</div>