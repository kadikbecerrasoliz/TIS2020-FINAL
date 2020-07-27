<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Editar tematica</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('tematicas.update', $tematica->id) }}" method="POST" class="text-center">
        {{ csrf_field() }}
        {{ @method_field('PUT') }}
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="text" id="tematicalRegisterFormName" class="form-control" aria-describedby="tematicalRegisterFormNameHelpBlock" name="name" value="{{$tematica->name}}" required autofocus>
                    <label for="tematicalRegisterFormName">Nombre de tematica *</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="text" id="tematicalRegisterFormName" class="form-control" aria-describedby="tematicalRegisterFormNameHelpBlock" name="codigo" value="{{$tematica->codigo}}" required autofocus>
                    <label for="tematicalRegisterFormName">Codigo de tematica *</label>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary waves-effect" type="submit" data-toggle="modal">Registrar</button>
        </div>
    </form>
</div>