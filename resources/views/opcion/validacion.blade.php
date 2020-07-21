@if(session('negacion'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            &times;
        </button>
        <p>{{ session('negacion') }}</p>
    </div>
@endif