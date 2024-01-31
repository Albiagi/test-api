@extends('layout.main')

@section('content')
<div class="container-xxl">
    <div class="row">
        <div class="col">
            {{-- sidebar --}}
            @include('additional.sidebar')
            {{-- sidebar --}}
        </div>
        <div class="col">
            ini bagian isinya entar
        </div>
    </div>
</div>

@endsection
