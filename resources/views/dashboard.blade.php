@extends('layout.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="sidebar col-md-3">
            {{-- sidebar --}}
            @include('additional.sidebar')
            {{-- sidebar --}}
        </div>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex flex-row position-absolute top-50 start-50 translate-middle ms-5">
                <div class="col me-3">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <div class="card-title" style="max-width: 250px; height: 150px;">
                                <h3>Jumlah Pengguna</h3>
                                <p>13</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card bg-danger">
                        <div class="card-body">
                            <div class="card-title" style="max-width: 250px; height: 150px;">
                                <h3>Jumlah Pengguna</h3>
                                <p>13</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection
