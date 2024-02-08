@if (Session::has('error'))
    <div class="alert alert-danger" id="error">
        {!! Session::get('error') !!}
    </div>
@endif

@if (Session::has('success'))
    <div class="pt-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    </div>
@endif