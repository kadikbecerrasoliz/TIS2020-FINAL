<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Editar Puntaje de examen</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('postulations.editPuntajeExamen', $postulation->id) }}" method="POST" class="text-center">
        {{ csrf_field() }}
        {{ @method_field('PUT') }}
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <div class="md-form">
                        <input type="number" id="materialRegisterPoints" class="form-control" aria-describedby="materialRegisterFormNameHelpBlock" name="puntaje_examen" required autofocus>
                        <label for="materialRegisterPoints">Puntaje (maximo: 100) *</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary waves-effect" type="submit" data-toggle="modal">Editar</button>
        </div>
    </form>
</div>