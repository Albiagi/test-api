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
                @include('notify.message')
                <table class="table table-sm table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th >No</th>
                            <th style="width: 40%">Nama Pengguna</th>
                            <th style="width: 45%">Email</th>
                            <th >Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=$data['from']; ?>
                        @foreach ($data['data'] as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>
                                <a href="{{ url('master/edit/'.$item['id']) }}" class="btn btn-warning" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ url('master/user/'.$item['id']) }}" method="post" onsubmit="return confirm('Yakin akan menghapus data {{ $item['name'] }}?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
                @if ($data['links'])
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-sm">
                            @foreach ($data['links'] as $item)
                                <li class="page-item {{ $item['active']?'active' : '' }}"><a class="page-link" href="{{ $item['url2'] }}">{!! $item['label'] !!}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                @endif
            </div>
        </main>
    </div>
</div>
@endsection
