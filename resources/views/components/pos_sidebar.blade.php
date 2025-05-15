<div class="sidebar d-flex p-2 flex-column vh-100">

    <!-- Sidebar Header -->
    <div class="sidebar-header my-2 gap-2 rounded-3 d-flex align-items-center justify-content-center"
        style="height: 89px; background-color: #dceadc;">
        <a href="#" class="text-decoration-none fs-1">
            <i class="bi bi-motherboard text-success"></i>
        </a>
        <small class="fw-bold">PAY </small><small class="text-success fw-bold">COMPUTER</small>
    </div>

    <!-- Sidebar Items -->
    <div class="sidebar-items rounded-3 flex-grow-1 d-flex flex-column justify-content-center align-items-start py-3 px-3"
        style="background-color: #dceadc;">

        <!-- POS Item -->
        <div class="list-items my-2 w-100">
            <a href="{{ route('employee.dashboard') }}"
                class="btn rounded-3 d-flex p-2 gap-3 align-items-center w-100 
                {{ request()->routeIs('employee.dashboard') ? 'bg-success text-white' : 'btn-outline-success' }}">
                <i class="bi bi-bag-plus-fill fs-5"></i>
                <span>POS</span>
            </a>
        </div>

        <!-- Products Item -->
        <div class="list-items my-2 w-100">
            <a href="{{ route('pos.showproducts') }}"
                class="btn rounded-3 d-flex p-2 gap-3 align-items-center w-100 
                {{ request()->routeIs('pos.showproducts') ? 'bg-success text-white' : 'btn-outline-success' }}">
                <i class="bi bi-box-seam fs-5"></i>
                <span>Products</span>
            </a>
        </div>

        <!-- Reports Item -->
        <div class="list-items my-2 w-100">
            <a href="{{ route('pos.transaction_history') }}"
                class="btn rounded-3 d-flex p-2 gap-3 align-items-center w-100 
                {{ request()->routeIs('pos.transaction_history') ? 'bg-success text-white' : 'btn-outline-success' }}">
                <i class="bi bi-graph-up fs-5"></i>
                <span>Reports</span>
            </a>
        </div>

    </div>
</div>
