<div class="sidebar h-100 d-flex flex-column">

    <!-- Sidebar Header -->
    <div class="sidebar-header my-2 gap-2 rounded-3 d-flex align-items-center justify-content-center"
        style="height: 89px; background-color: #dceadc;">
        <a href="#" class="text-decoration-none fs-1">
            <i class="bi bi-motherboard text-success"></i>
        </a>
        <small class="fw-bold">PAY </small><small class="text-success fw-bold">COMPUTER</small>
    </div>
    <!-- Navigation -->
    <nav class="flex-grow-1 overflow-auto p-3">
        <ul class="nav flex-column">
            <li class="nav-item mb-2 d-none d-lg-block">
                <small class="text-muted text-uppercase">Menu</small>
            </li>

            <li class="nav-item mb-2">
                <a class="nav-link text-dark  {{ request()->routeIs('dashboard.data') ? 'active text-white fw-bold bg-success rounded-2' : '' }}"
                    href="{{ route('dashboard.data') }}">
                    <i class="bi bi-speedometer2 me-2"></i>
                    <span class="d-none d-lg-inline">Dashboard</span>
                </a>
            </li>

            <!-- Employees Dropdown -->
            <li class="nav-item mb-2 dropdown">
                <a class="nav-link text-dark dropdown-toggle 
                   {{ request()->routeIs('employees') || request()->routeIs('roles') || request()->routeIs('accounts') ? 'active  text-white fw-bold bg-success rounded-2' : '' }}"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-people me-2"></i>
                    <span class="d-none d-lg-inline">Employees</span>
                </a>
                <ul class="dropdown-menu  bg-clay-green">
                    <li><a class="dropdown-item text-dark {{ request()->routeIs('employees') ? 'active  text-white fw-bold bg-success rounded-2' : '' }}"
                            href="{{ route('employees') }}">View Employees</a></li>
                    <li><a class="dropdown-item {{ request()->routeIs('roles') ? 'active  text-white fw-bold bg-success rounded-2' : '' }}"
                            href="{{ route('roles') }}">View Roles</a></li>
                    <li><a class="dropdown-item {{ request()->routeIs('accounts') ? 'active  text-white fw-bold bg-success rounded-2' : '' }}"
                            href="{{ route('accounts') }}">View Accounts</a></li>
                </ul>
            </li>

            <!-- Products Dropdown -->
            <li class="nav-item mb-2 dropdown">
                <a class="nav-link dropdown-toggle  text-dark
                   {{ request()->routeIs('show.products') || request()->routeIs('show.products') ? 'active  text-white fw-bold bg-success rounded-2' : '' }}"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-box-seam me-2"></i>
                    <span class="d-none d-lg-inline">Products</span>
                </a>
                <ul class="dropdown-menu  bg-clay-green">
                    <li><a class="dropdown-item text-dark" href="{{ route('show.products') }}">View Products</a></li>
                    <li><a class="dropdown-item text-dark {{ request()->routeIs('suppliers') ? 'active  text-white fw-bold bg-success rounded-2' : '' }}"
                            href="{{ route('suppliers') }}">View Suppliers</a></li>
                    <li><a class="dropdown-item text-dark {{ request()->routeIs('show.products') ? 'active text-white fw-bold bg-success rounded-2' : '' }}"
                            href="{{ route('show-categories') }}">View Categories</a></li>
                </ul>
            </li>

            <!-- Reports Dropdown -->
            <li class="nav-item mb-2 dropdown">
                <a class="nav-link dropdown-toggle  text-dark
                   {{ request()->routeIs('admin.transaction') || request()->routeIs('admin.transaction') ? 'active  text-white fw-bold bg-success rounded-2' : '' }}"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bar-chart"></i>
                    <span class="d-none d-lg-inline">Reports</span>
                </a>
                <ul class="dropdown-menu  bg-clay-green">
                    <li><a class="dropdown-item  bg-clay-green text-dark {{ request()->routeIs('admin.transaction') ? 'active  text-white fw-bold bg-success rounded-2' : '' }}"
                            href="{{ route('admin.transaction') }}">Transaction History</a></li>

                    <li><a class="dropdown-item  bg-clay-green text-dark {{ request()->routeIs('admin.sales') ? 'active text-white fw-bold bg-success rounded-2' : '' }}"
                            href="{{ route('admin.sales') }}">Sales History</a></li>
                </ul>
            </li>


        </ul>
    </nav>

    <!-- Profile Section -->
    <div class="p-3 border-top">
        <div class="mt-3">
            <x-account />
        </div>
    </div>
</div>
