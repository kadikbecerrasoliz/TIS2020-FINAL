<div class="modal-header text-center">
    <h5 class="modal-title w-100" id="exampleModalLabel">Detalles de Item</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <table class="table table-sm table-hover table-bordered">
        <tbody>
            <tr>
                <td>Indice</td>
                <td>{{$subitem->indice}}</td>
            </tr>
            <tr>
                <td>Titulo</td>
                <td>{{$subitem->titulo}}</td>
            </tr>
            <tr>
                <td>Puntaje</td>
                <td>{{$subitem->puntos}}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>