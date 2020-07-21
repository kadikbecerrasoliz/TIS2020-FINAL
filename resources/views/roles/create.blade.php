<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Crear Rol</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('roles.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="col">
                <div class="md-form">
                    <input type="text"  id="materialRegisterFormName" class="form-control" aria-describedby="materialRegisterFormNameHelpBlock" name="name" value="{{ old('name') }}" required>
                    <label for="materialRegisterFormName">Nombre *</label>
                </div>
            </div>
            <div class="col">
                <div class="md-form">
                    <input type="text"  id="materialRegisterFormNDescripción" class="form-control" aria-describedby="materialRegisterFormNDescripciónHelpBlock" name="description" value="{{ old('description') }}" required>
                    <label for="materialRegisterFormNDescripción">Descripción *</label>
                </div>
            </div>
        </div>
        <div class="text-center">
            <label><strong>Asignar permisos</strong></label>
        </div>
        <div class="form-row">
            <div class="col d-flex justify-content-center">
                <div class="custom-control custom-checkbox d-flex flex-row">
                    <input type="checkbox" class="custom-control-input" id="customCheck2" name='special' value="no-access">
                    <label class="custom-control-label" for="customCheck2">Ningún Acceso (Visitante)</label>
                </div>
            </div>
        </div>
        <div class="text-center">
            <label><strong>Asignar permisos especiales</strong></label>
        </div>
        <div class="d-flex justify-content-center">
            <div class="w-50">
                <label class="mdb-main-label">Escoger permisos (Elección multiple Ctrl+Click)</label>
                <select class="custom-select" id="permissions[]" name="permissions[]" multiple size="10">
                    @foreach ($permissions as $permission)
                        <option value="{{$permission->id}}">{{$permission->name}}</option>
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