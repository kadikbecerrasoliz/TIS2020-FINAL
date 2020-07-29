<div id="list-example" class="list-group">
    @can('roles.index')
        <a class="list-group-item list-group-item-action" href="{{ route('roles.index') }}">
            <span class="text-left">
                <i class="fas fa-address-card "></i> Roles
            </span>
        </a>
    @endcan
    @can('users.index')
        <a class="list-group-item list-group-item-action" href="{{ route('users.index') }}">
            <span class="text-left">
                <i class=" fas fa-user"></i> Usuarios
            </span>
        </a>
    @endcan
    @can('materias.index')
        <a class="list-group-item list-group-item-action" href="{{ route('materias.index') }}">
            <span class="text-left">
                <i class="fas fa-pen-alt"></i> Materias/Auxiliaturas
            </span>
        </a>
    @endcan
    @can('tematicas.index')
        <a class="list-group-item list-group-item-action" href="{{ route('tematicas.index') }}">
            <span class="text-left">
                <i class="fas fa-pen-alt"></i> Tematica
            </span>
        </a>
    @endcan
    @can('convocatorias.index')
        <a class="list-group-item list-group-item-action" href="{{ route('convocatorias.index') }}">
            <span class="text-left">
                <i class=" fas fa-clipboard"></i> Convocatoria
            </span>
        </a>
    @endcan
    @can('solicituds.index')
        <a class="list-group-item list-group-item-action" href="{{ route('solicituds.index') }}">
            <span class="text-left">
                <i class="fas fa-pen-alt"></i> Solicitudes
            </span>
        </a>
    @endcan
    @can('postulations.index')
        <a class="list-group-item list-group-item-action" href="{{ route('postulations.index') }}">
            <span class="text-left">
                <i class="fas fa-pen-alt"></i> Postulaciones
            </span>
        </a>
    @endcan
    @can('archivos.show')
        <a class="list-group-item list-group-item-action" href="{{ route('convocatorias.revision.index') }}">
            <span class="text-left">
                <i class="fas fa-pen-alt"></i> Revisiones
            </span>
        </a>
    @endcan
    <div><hr></div>
    @can('postulantes.index')
        <a class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#collapsePost" aria-expanded="true" aria-controls="collapsePost">
            <span class="text-left">
                <i class=" fas fa-user"></i> Postulante
            </span>
        </a>
        <nav class="nav nav-pills flex-column collapse" id="collapsePost">
            <a class="list-group-item list-group-item-action" href="{{ route('postulantes.solicitudes') }}">
                <span class="text-left pl-1">
                    <i class="fas fa-user-graduate"></i> Mis Solicitudes
                </span>
            </a>
            <a class="list-group-item list-group-item-action" href="{{ route('postulantes.postulations') }}">
                <span class="text-left pl-1">
                    <i class="fas fa-user-graduate"></i> Mis Postulaciones
                </span>
            </a>
        </nav>
    @endcan
</div>