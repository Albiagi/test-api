<div class="d-flex flex-column border-end" style="width: 250px; min-height: 90vh;">
    <ul class="nav nav-pills flex-column ps-3 pe-3 mt-5">
        <li class="nav-item mb-2">
            <a href="{{ url('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="bi bi-house-fill"></i>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('master') }}" class="nav-link {{ request()->is('master', 'master/create', 'master/edit/*') ? 'active' : '' }}">
                <i class="bi bi-person-circle"></i>
                Master Pengguna
            </a>
        </li>
        <li class="nav-item mt-4">
            <form action="{{ url('logout') }}" method="post">
                @csrf
                <button type="submit" class="nav-link">
                    <i class="bi bi-box-arrow-left"></i>
                    Logout
                </button>
            </form>
        </li>
    </ul>
</div>