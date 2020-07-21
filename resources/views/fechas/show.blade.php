<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Detalles de Evento</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <table class="table table-sm table-hover table-bordered">
        <tbody>
            <tr>
                <td>Evento</td>
                <td>{{$fecha->evento}}</td>
            </tr>
            <tr>
                <td>Hora de Inicio</td>
                <td>{{$fecha->horaIni}}</td>
            </tr>
            <tr>
                <td>Fecha de Inicio</td>
                <td>{{$fecha->fechaIni}}</td>
            </tr>
            <tr>
                <td>Hora de Fin</td>
                <td>{{$fecha->horaFin}}</td>
            </tr>
            <tr>
                <td>Fecha de Fin</td>
                <td>{{$fecha->fechaFin}}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>