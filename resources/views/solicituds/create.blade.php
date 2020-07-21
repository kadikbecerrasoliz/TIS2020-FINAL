<div class="modal-header text-center">
    <h4 class="modal-title w-100 font-weight-bold">Solicitud de Postulacion</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body mx-3">
    <form action="{{ route('solicituds.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="col">
                <label for="roles">Convocatoria</label>
                <select class="custom-select" id="convocatoria_id" name="convocatoria_id">
                    <option value="{{$convocatoria->id}}"> {{$convocatoria->titulo}} </option>
                </select>
            </div>
        </div>
        <div class="form-row pt-4">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">Valorado Estudiante</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" name="valorado" accept=".pdf" class="custom-file-input" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Escoger Archio</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row pt-4">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon02">Valorado kardex</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" name="kardex" accept=".pdf"class="custom-file-input" id="inputGroupFile02"
                        aria-describedby="inputGroupFileAddon02">
                      <label class="custom-file-label" for="inputGroupFile02">Escoger Archio</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-primary waves-effect" type="submit" data-toggle="modal">Registrar</button>
        </div>
    </form>
</div>