<div class="sidebar h-100 d-flex flex-column">
    <!-- Sidebar Header -->
    <div class="sidebar-header p-3 py-4 border-bottom d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <a href="#" class="p-1 rounded" style="text-decoration:none;">
                <img src="{{ asset('imgs/LogoComputer.png') }}" style="width:30px;height:30px" alt="Home">
                <span class="ms-2 fs-6 fw-bold d-none d-lg-inline">P.C PAY COMPUTER</span>
            </a>
            <button class="sidebar-toggle d-lg-none ms-auto btn btn-link p-0" type="button">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-grow-1 overflow-auto p-3">
        <ul class="nav flex-column">
            <li class="nav-item mb-2 d-none d-lg-block">
                <small class="text-muted text-uppercase">Menu</small>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i>
                    <span class="d-none d-lg-inline">Dashboard</span>
                </a>
            </li>

            <li class="nav-item mb-2 dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-people me-2"></i>
                    <span class="d-none d-lg-inline">Employees</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('employees') }}">View Employees</a></li>
                    <li><a class="dropdown-item" href="{{ route('roles') }}">View Roles</a></li>
                    <li><a class="dropdown-item" href="{{ route('accounts') }}">View Accounts</a></li>
                </ul>
            </li>

            <li class="nav-item mb-2 dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-box-seam me-2"></i>
                    <span class="d-none d-lg-inline">Products</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">View Products</a></li>
                    <li><a class="dropdown-item" href="{{ route('suppliers') }}">View Suppliers</a></li>
                    <li><a class="dropdown-item" href="{{ route('show-categories') }}">View Categories</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Profile Section -->
    <div class="p-3 border-top">
        <div class="d-flex justify-content-center align-items-center">
            <img src="{{ asset('imgs/admin.jpg') }}" class="rounded-circle me-2" width="40" height="40">
            <div class="d-none d-lg-block">
                <p class="mb-0 fw-bold">Admin</p>
                <small class="text-muted">Administrator</small>
            </div>
        </div>
    </div>
</div>
