@extends('layout.main')

@section('content')
<br>
<br>
<br>
    <div class="container d-flex justify-content-center">
        <div class="mt-4 p-5 border shadow-sm" style="width: 450px">
            <form action="{{ url('login') }}" method="post">
                @csrf
                <h2 class="text-center mb-5 fw-bolder">Login</h2>
                
                {{-- error message starts --}}
                @if (Session::has('error'))
                    <div class="alert alert-danger" id="error">
                        {!! Session::get('error') !!}
                    </div>
                @endif
                {{-- error message ends --}}
                
                {{-- logout success message starts --}}
                @if (Session::has('success'))
                    <div class="pt-3">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                    </div>
                @endif
                {{-- logout success message starts --}}

                <div class="col-auto form-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-danger">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection