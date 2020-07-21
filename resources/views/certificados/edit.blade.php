<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Editar Archivo de Merito</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('certificados.update', $certificado->id) }}" method="POST" class="text-center">
        {{ csrf_field() }}
        {{ @method_field('PUT') }}
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="text" id="materialRegisterFormName" class="form-control" aria-describedby="materialRegisterFormNameHelpBlock" name="name" value="{{$certificado->name}}" required autofocus>
                    <label for="materialRegisterFormName">Titulo *</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    @if($certificado->merito_id !== null)
                        <div class="md-form">
                            <input type="number" id="materialRegisterPoints" class="form-control" aria-describedby="materialRegisterFormNameHelpBlock" name="merito" required autofocus>
                            <label for="materialRegisterPoints">Puntaje (maximo: {{$certificado->merito->puntos}}) *</label>
                        </div>
                    @elseif($certificado->item_id !== null)
                        <div class="md-form">
                            <input type="number" id="materialRegisterPoints" class="form-control" aria-describedby="materialRegisterFormNameHelpBlock" name="item" required autofocus>
                            <label for="materialRegisterPoints">Puntaje (maximo: {{$certificado->item->puntos}}) *</label>
                        </div>
                    @elseif($certificado->subitem_id !== null)
                        <div class="md-form">
                            <input type="number" id="materialRegisterPoints" class="form-control" aria-describedby="materialRegisterFormNameHelpBlock" name="subitem" required autofocus>
                            <label for="materialRegisterPoints">Puntaje (maximo: {{$certificado->subitem->puntos}}) *</label>
                        </div>
                    @elseif($certificado->detalle_id !== null)
                        <div class="md-form">
                            <input type="number" id="materialRegisterPoints" class="form-control" aria-describedby="materialRegisterFormNameHelpBlock" name="detalle" required autofocus>
                            <label for="materialRegisterPoints">Puntaje (maximo: {{$certificado->detalle->puntos}}) *</label>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary waves-effect" type="submit" data-toggle="modal">Cambiar</button>
        </div>
    </form>
</div>