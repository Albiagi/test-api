<div class="d-flex flex-column border-end" style="width: 280px; min-height: 100vh;">
    <a href="{{ url('dashboard') }}" class="d-flex justify-content-center align-items-center mt-3 ms-2 link-body-emphasis text-decoration-none">
        <img src="{{ asset('img/logo_hma.png') }}" style="width: 40px" alt="logo hanatekindo">
        <span class="fs-4 fw-bolder" style="color: rgb(151, 23, 23)">PT. Hanatekindo</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column p-2 mb-auto" id="inav">
        <li class="nav-item mt-5" id="nav">
            <a href="{{ url('dashboard') }}" id="a" class="nav-link link-body-emphasis {{ ($ht === "Dashboard") ? 'active' : '' }}">
                <i class="bi bi-house-fill"></i>
                Dashboard
            </a>
        </li>
        <li class="mt-2">
            <a href="{{ url('master') }}" class="nav-link link-body-emphasis {{ ($ht === "Master Pengguna") ? 'active' : '' }}">
                <i class="bi bi-person-circle"></i>
                Master Pengguna
            </a>
        </li>
        <li class="my-5">
            <a href="#" class="nav-link link-body-emphasis">
                <i class="bi bi-box-arrow-left"></i>
                Logout
            </a>
        </li>
    </ul>
</div>