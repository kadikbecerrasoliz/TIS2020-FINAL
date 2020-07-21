<div class="modal-header text-center">
  <h5 class="modal-title w-100" id="exampleModalLabel">Crear Usuario</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <form action="{{ route('users.store') }}" method="POST" class="text-center">
    {{ csrf_field() }}
    <div class="form-row">
      <div class="col">
        <div class="md-form">
          <input type="text" id="materialRegisterFormName" class="form-control" name='name' value="{{ old('name') }}" required>
          <label for="materialRegisterFormName">Nombre *</label>
        </div>
      </div>
      <div class="col">
        <div class="md-form">
          <input type="text" id="materialRegisterFormApellido" class="form-control" name='apellido' value="{{ old('apellido') }}" required>
          <label for="materialRegisterFormApellido">Apellido *</label>
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col">
        <div class="md-form">
          <input type="text" id="materialRegisterFormSis" class="form-control" name='sis' value="{{ old('sis') }}" required>
          <label for="materialRegisterFormSis">Codigo SIS *</label>
        </div>
      </div>
      <div class="col">
        <div class="md-form">
          <input type="text" id="materialRegisterFormCi" class="form-control" name='ci' value="{{ old('ci') }}" required>
          <label for="materialRegisterFormCi">CI *</label>
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col">
        <div class="md-form">
          <input type="email" id="materialRegisterFormEmail" class="form-control" aria-describedby="materialRegisterFormEmailHelpBlock" name='email' required>
          <label for="materialRegisterFormEmail">Email *</label>
        </div>
      </div>
      <div class="col">
        <div class="md-form">
          <input type="password" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" name='password'  required>
          <label for="materialRegisterFormPassword">Password *</label>
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col">
        <label for="roles">Rol</label>
        <select class="custom-select" id="roles" name="roles">
          @foreach ($roles as $role)
              <option value="{{$role->id}}"> {{$role->name}} </option>
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