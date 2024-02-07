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
        <main class="col-md-9">
            <div class="col mt-5 ms-4">
                <p class="fs-3 fw-bolder"><i class="bi bi-file-earmark"></i></i> Tambah Pengguna</p>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="ms-5">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col">
                            <input type="text" name="name" class="form-control" style="width: 500px" id="nama">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col">
                            <input type="email" name="email" class="form-control" style="width: 500px" id="email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col">
                            <input type="password" name="password" class="form-control" style="width: 500px" id="password">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="c_password" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                        <div class="col">
                            <input type="password" name="c_password" class="form-control" style="width: 500px" id="c_password">
                        </div>
                    </div>
                    <div style="margin-left: 62%">
                        <button type="submit" class="btn btn-primary" style="width: 150px;">Submit</button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</div>
@endsection
