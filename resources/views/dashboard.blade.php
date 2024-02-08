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
                <div class="card border-left-primary shadow h-100 py-2 me-3">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Earnings (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Earnings (Monthly)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection
