<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Editar Requerimiento</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('requerimientos.update', $requerimiento->id) }}" method="POST" class="text-center">
        {{ csrf_field() }}
        {{ @method_field('PUT') }}
        <div class="form-row">
            <div class="col">
                <label for="roles">Convocatoria</label>
                <select class="custom-select" id="convocatoria_id" name="convocatoria_id">
                    <option value="{{$requerimiento->convocatoria->id}}"> {{$requerimiento->convocatoria->titulo}} </option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="number"  id="materialRegisterFormItem" class="form-control" aria-describedby="materialRegisterFormItemHelpBlock" name="items" value="{{$requerimiento->items}}" required autofocus>
                    <label for="materialRegisterFormItem">Items *</label>
                </div>
            </div>
            <div class="col">
                <div class="md-form">
                    <input type="number"  id="materialRegisterFormCant" class="form-control" aria-describedby="materialRegisterFormCantHelpBlock" name="cantidad" value="{{$requerimiento->cantidad}}" required autofocus>
                    <label for="materialRegisterFormCant">Cantidad *</label>
                </div>
            </div>
            <div class="col">
                <div class="md-form">
                    <input type="number"  id="materialRegisterFormHrs" class="form-control" aria-describedby="materialRegisterFormHrsHelpBlock" name="hrsAcademic" value="{{$requerimiento->hrsAcademic}}" required autofocus>
                    <label for="materialRegisterFormHrs">Hrs Academicas *</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="roles">Materias</label>
                <select class="custom-select" id="materia_id" name="materia_id">
                    <option selected value="{{$requerimiento->materia->id}}"> {{$requerimiento->materia->name}} </option>
                    @foreach ($materias as $materia)
                        <option value="{{$materia->id}}"> {{$materia->name}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary waves-effect" type="submit" data-toggle="modal">Guardar Cambios</button>
        </div>
    </form>
</div>