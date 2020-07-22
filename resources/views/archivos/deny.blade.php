<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Documento siendo rechazado</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('archivos.deny', $archivo->id) }}" method="POST" class="text-center">
        {{ csrf_field() }}
        {{ @method_field('PUT') }}
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="text" id="materialRegisterFormName" class="form-control" aria-describedby="materialRegisterFormNameHelpBlock" name="motivo" required autofocus>
                    <label for="materialRegisterFormName">Diga el porque *</label>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary waves-effect" type="submit" data-toggle="modal">Rechazar documento</button>
        </div>
    </form>
</div>