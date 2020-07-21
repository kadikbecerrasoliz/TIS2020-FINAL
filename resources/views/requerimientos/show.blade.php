<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Detalles de Requerimiento</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <table class="table table-sm table-hover table-bordered">
        <tbody>
            <tr>
                <td>Items</td>
                <td>{{$requerimiento->items}}</td>
            </tr>
            <tr>
                <td>Cantidad</td>
                <td>{{$requerimiento->cantidad}}</td>
            </tr>
            <tr>
                <td>Horas Academicas</td>
                <td>{{$requerimiento->hrsAcademic}}</td>
            </tr>
            <tr>
                <th>Destino</th>
                <td>{{$requerimiento->materia->name}}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>