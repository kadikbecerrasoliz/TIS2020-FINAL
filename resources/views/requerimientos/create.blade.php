<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Crear Requerimiento</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('requerimientos.store') }}" method="POST">
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
                    <input type="number"  id="materialRegisterFormItem" class="form-control" aria-describedby="materialRegisterFormItemHelpBlock" name="items" value="{{ old('items') }}" required>
                    <label for="materialRegisterFormItem">Items *</label>
                </div>
            </div>
            <div class="col">
                <div class="md-form">
                    <input type="number"  id="materialRegisterFormCant" class="form-control" aria-describedby="materialRegisterFormCantHelpBlock" name="cantidad" value="{{ old('cantidad') }}" required>
                    <label for="materialRegisterFormCant">Cantidad *</label>
                </div>
            </div>
            <div class="col">
                <div class="md-form">
                    <input type="number"  id="materialRegisterFormHrs" class="form-control" aria-describedby="materialRegisterFormHrsHelpBlock" name="hrsAcademic" value="{{ old('hrsAcademic') }}" required>
                    <label for="materialRegisterFormHrs">Hrs Academicas *</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="roles">Materias</label>
                <select class="custom-select" id="materia_id" name="materia_id">
                @foreach ($materias as $materia)
                    <option value="{{$materia->id}}"> {{$materia->name}} </option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary waves-effect" type="submit" data-toggle="modal">Registrar</button>
        </div>
    </form>
</div>