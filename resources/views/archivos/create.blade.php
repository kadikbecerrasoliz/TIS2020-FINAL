<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Subir Documentos de Requisitos</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('archivos.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-row pb-4">
            <div class="col">
                <label for="roles">Documento</label>
                <select class="browser-default custom-select" id="documento_id" name="documento_id">
                    @foreach ($postulation->convocatoria->documentos as $documento)
                        <option value="{{$documento->id}}"> {{$documento->descripcion}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                      <input class="custom-file-input" type="file" name="file" id="inputGroupFile01" accept=".pdf" aria-describedby="inputGroupFileAddon01" >
                      <label class="custom-file-label" for="inputGroupFile01">Escoger Archivo</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-primary waves-effect" type="submit" data-toggle="modal">Registrar</button>
        </div>
    </form>
</div>