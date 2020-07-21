@extends('layouts.app')

@section('content')
<h3>
    @foreach (Auth::user()->roles as $role)
        Bienvenid@ {{$role->name}}
    @endforeach
</h3>
<div class="container">
    <div>
        <h4>
            Bienvenid@ {{ Auth::user()->name }}
        </h4>
    </div>
    <div class="">
        @include('opcion.error')
        @include('opcion.validacion')
        @include('opcion.confirmacion')


        <p>
            Bienvenido a la plataforma de control de laboratorio.
        </p>
        @foreach (Auth::user()->roles as $role)
            <p>
                Bienvenido  {{$role->name}} 
                <ul>
                    @if ($role->special == 'all-access')
                        Usted Tiene Control de Toda la Plataforma
                    @else
                        @if ($role->special == 'no-access')
                            Usted Tiene Control Limitado la Plataforma
                        @else
                            @if ($role->special == NULL)
                                @foreach ($role->permissions as $permission)
                                    <li>{{$permission->name}}: {{$permission->description}}</li>
                                @endforeach
                            @endif
                        @endif
                    @endif
                </ul>    
            </p>
        @endforeach
    </div>
</div>
<script>
    const alerta = document.querySelector('#alerta');
    alerta.addEventListener('click', () => {
        console.log('click');
        
        toastr["success"]("dfasd", "fadf")

        toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "md-toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        }
    });
</script>
@endsection
