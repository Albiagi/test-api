@extends('layout.main')

@section('content')
<div class="container-xxl">
    {{-- navbar --}}
        @include('additional.navbar')
    {{-- navbar --}}
    <div class="row">
        {{-- sidebar --}}
            @include('additional.sidebar')
        {{-- sidebar --}}
        <main class="col-md-9 col-lg-10 px-md-4">
            <div class="d-flex flex-row position-absolute top-50 start-50 translate-middle ms-5">
                <div class="card shadow-sm h-100 py-2 me-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h1 bolder mb-2 font-weight-bold text-gray-800">{{ $data['total'] }}</div>
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Penguna Terdaftar</div>
                            </div>
                            <div class="col-auto">
                                <i class="h1 bolder bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-left-primary shadow-sm h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h1 bolder mb-2 font-weight-bold text-gray-800">{{ $data['total'] }}</div>
                                <div class="text-xs bolder text-uppercase mb-1 me-2">Pengguna Aktif</div>
                            </div>
                            <div class="col-auto">
                                <i class="h1 bolder bi bi-person-check-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection
