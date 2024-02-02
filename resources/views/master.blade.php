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
                <div class="row">
                    <div class="col">
                        <a href="{{ url('master/create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i> Tambah</a>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th >No</th>
                            <th style="width: 40%">Nama Pengguna</th>
                            <th style="width: 40%">Email</th>
                            <th >Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Albiagi</td>
                            <td>albyagiw@gmail.com</td>
                            <td>
                                <button class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
