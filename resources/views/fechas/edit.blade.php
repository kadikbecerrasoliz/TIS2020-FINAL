<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Editar Evento</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('fechas.update', $fecha->id) }}" method="POST" class="text-center">
        {{ csrf_field() }}
        {{ @method_field('PUT') }}
        <div class="form-row">
            <div class="col">
                <label for="roles">Convocatoria</label>
                <select class="custom-select" id="convocatoria_id" name="convocatoria_id">
                    <option value="{{$fecha->convocatoria->id}}"> {{$fecha->convocatoria->titulo}} </option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="text"  id="materialRegisterFormName" class="form-control" aria-describedby="materialRegisterFormNameHelpBlock" name="evento" value="{{ $fecha->evento }}" required>
                    <label for="materialRegisterFormName">Evento *</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="time"  id="materialRegisterFormhoraIni" class="form-control" aria-describedby="materialRegisterFormhoraIniHelpBlock" name="horaIni" value="{{ $fecha->horaIni }}" required>
                    <label for="materialRegisterFormhoraIni">Hora de Inicio *</label>
                </div>
            </div>
            <div class="col">
                <div class="md-form">
                    <input type="date"  id="materialRegisterFormfechaIni" class="form-control" aria-describedby="materialRegisterFormfechaIniHelpBlock" name="fechaIni" value="{{ $fecha->fechaIni }}" required>
                    <label for="materialRegisterFormfechaIni">Fecha de Inicio *</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="time"  id="materialRegisterFormhoraFin" class="form-control" aria-describedby="materialRegisterFormhoraFinHelpBlock" name="horaFin" value="{{ $fecha->horaFin }}" required>
                    <label for="materialRegisterFormhoraFin">Hora de Fin *</label>
                </div>
            </div>
            <div class="col">
                <div class="md-form">
                    <input type="date"  id="materialRegisterFormfechaFin" class="form-control" aria-describedby="materialRegisterFormfechaFinHelpBlock" name="fechaFin" value="{{ $fecha->fechaFin }}" required>
                    <label for="materialRegisterFormfechaFin">Fecha de Fin *</label>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary waves-effect" type="submit" data-toggle="modal">Registrar</button>
        </div>
    </form>
</div>