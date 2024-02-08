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
                <p class="fs-3 fw-bolder"><i class="bi bi-file-earmark"></i></i> Edit Data Pengguna</p>
            </div>
            <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="ms-5">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col">
                            <input type="text" name="name" class="form-control" value="{{ isset($data['name']) ? $data['name'] : old('name') }}" style="width: 500px" id="nama">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col">
                            <input type="email" name="email" class="form-control" value="{{ isset($data['email']) ? $data['email'] : old('email') }}" style="width: 500px" id="email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col">
                            <input type="password" name="password" class="form-control" value="{{ isset($data['password']) ? $data['password'] : old('password') }}" style="width: 500px" id="password">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="c_password" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                        <div class="col">
                            <input type="password" name="c_password" class="form-control" value="{{ isset($data['c_password']) ? $data['c_password'] : old('c_password') }}" style="width: 500px" id="c_password">
                        </div>
                    </div>
                    <div style="margin-left: 50%">
                        <a href="{{ url('master') }}" class="btn btn-danger me-2" style="width: 100px">Back</a>
                        <button type="submit" class="btn btn-primary" style="width: 150px;">Submit</button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</div>
@endsection
