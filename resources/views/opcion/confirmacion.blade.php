@if(session('confirmacion'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
        <p>{{ session('confirmacion') }}</p>
    </div>
@endif