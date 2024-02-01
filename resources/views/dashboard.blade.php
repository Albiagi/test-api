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
            <div class="d-flex flex-row position-absolute top-50 start-50 translate-middle ms-5">
                <div class="col me-3">
                    <div class="card border-0 shadow-sm" style="background-color: rgb(53, 122, 84);">
                        <div class="card-body text-center row d-flex align-items-center" style="min-width: 180px; min-height: 180px;">
                            <p class="card-title text-white" style="font-size: 70px; font-weight:700;">15</p>
                            <h4 class="text-white">Pengguna Terdaftar</h4>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0 shadow-sm" style="background-color: rgb(50, 124, 114);">
                        <div class="card-body text-center row d-flex align-items-center" style="min-width: 150px; min-height: 180px;">
                            <p class="card-title text-white" style="font-size: 70px; font-weight:700;">2</p>
                            <h4 class="text-white">Pengguna Aktif</h4>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection
