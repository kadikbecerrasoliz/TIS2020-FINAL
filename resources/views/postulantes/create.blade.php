@extends('layouts.app')

@section('content')
<div class="row m-0">
  <div class="col">
      <h3>Registro de postulante</h3>
  </div>
</div>
<div class="row justify-content-md-center m-0" style="position: relative; height: 450px; margin-top: .5rem; overflow: auto;">
  <div class="col col-lg-6 col-sm-12">
    @include('opcion.error')
    @include('opcion.validacion')
    @include('opcion.confirmacion')
    <form action="{{ route('postulantes.store') }}" method="POST" class="text-center">
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
            <input type="email" id="materialRegisterFormEmail" class="form-control" aria-describedby="materialRegisterFormEmailHelpBlock" name='email' value="{{ old('email') }}" required>
            <label for="materialRegisterFormEmail">Email *</label>
          </div>
        </div>
        <div class="col">
          <div class="md-form">
            <input type="password" id="materialRegisterFormPassword" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" name='password' value="{{ old('password') }}" required>
            <label for="materialRegisterFormPassword">Password *</label>
          </div>
        </div>
      </div>
      <button class="btn btn-primary waves-effect" type="submit" data-toggle="modal">Registrar</button>
    </form>
  </div>
</div>
@endsection