<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel"></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <table class="table table-sm table-hover table-bordered">
        <tbody>
            <tr class="">
                <th><strong>Nombre</strong></th>
                <th>{{$user->name}}</th>
            </tr>
            <tr class="">
                <th><strong>Apellido</strong></th>
                <th>{{$user->apellido}}</th>
            </tr>
            <tr class="">
                <th><strong>Email</strong></th>
                <th>{{$user->email}}</th>
            </tr>
            <tr class="">
                <th><strong>Codigo Sis</strong></th>
                <th>{{$user->sis}}</th>
            </tr>
            <tr class="">
                <th><strong>CI</strong></th>
                <th>{{$user->ci}}</th>
            </tr>
            <tr class="">
                <th><strong>Rol</strong></th>
                <th>
                    @foreach ($user->roles as $rol)
                        <li>{{$rol->name}}</li>
                    @endforeach
                </th>
            </tr>
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>