@extends('layout.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="sidebar col-md-3">
            {{-- sidebar --}}
            @include('additional.sidebar')
            {{-- sidebar --}}
        </div>
        <main class="col-md-9 col-lg-10 px-md-4">
            <div class="col">
                <div class="d-flex flex-row position-absolute top-50 start-50 translate-middle ms-5">
                    table
                </div>
            </div>
        </main>
    </div>
</div>

@endsection
