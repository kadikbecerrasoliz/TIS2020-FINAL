<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Detalles de Rol</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <table class="table table-sm table-hover table-bordered">
        <tbody>
            <tr>
                <th><strong>Código</strong></th>
                <td>{{$role->id}}</td>
            </tr>
            <tr>
                <th><strong>Nombre</strong></th>
                <td>{{$role->name}}</td>
            </tr>
            <tr>
                <th><strong>Descripción</strong></th>
                <td>{{$role->description}}</td>
            </tr>
            <tr>
                <th><strong>Acceso</strong></th>
                <td>
                    @if ($role->special == null)
                        Acceso Especial                                    
                    @else
                        @if ($role->special == 'all-access')
                            Acceso Total
                        @else
                            @if ($role->special == 'no-access')
                                Sin Acceso (visitante)
                            @endif
                        @endif
                    @endif
                </td>
            </tr>
            <tr>
                <th><strong>Pribilegios</strong></th>
                <td>
                    @foreach ($role->permissions as $permission)
                        <li>{{$permission->name}}</li>
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>