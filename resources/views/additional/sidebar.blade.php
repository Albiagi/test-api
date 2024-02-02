<div class="d-flex flex-column border-end" style="width: 250px; min-height: 100vh;">
    <ul class="nav nav-pills flex-column ps-3 pe-3 mt-5">
        <li class="nav-item mb-2">
            <a href="{{ url('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="bi bi-house-fill"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('master') }}" class="nav-link {{ request()->is('master') ? 'active' : '' }}">
                <i class="bi bi-person-circle"></i>
                Master Pengguna
            </a>
        </li>
        <li class="nav-item mt-4">
            <a href="" class="nav-link">
                <i class="bi bi-box-arrow-left"></i>
                Logout
            </a>
        </li>
    </ul>
</div>