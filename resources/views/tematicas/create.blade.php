<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Crear Tematica</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('tematicas.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="text"  id="tematicalRegisterFormName" class="form-control" aria-describedby="tematicalRegisterFormNameHelpBlock" name="name" value="{{ old('name') }}" required>
                    <label for="tematicalRegisterFormName">Nombre de tematica *</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="text"  id="tematicalRegisterFormCod" class="form-control" aria-describedby="tematicalRegisterFormNameHelpBlock" name="codigo" value="{{ old('codigo') }}" required>
                    <label for="tematicalRegisterFormCod">Codigo de tematica *</label>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary waves-effect" type="submit" data-toggle="modal">Registrar</button>
        </div>
    </form>
</div>