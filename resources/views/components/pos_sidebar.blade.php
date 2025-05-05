<div class="sidebar d-flex flex-column border-end" style="height: 100vh;">
    <div class="sidebar-header border-bottom d-flex align-items-center justify-content-center" style="height: 89px;">
        <a href="#" class="text-decoration-none fs-1">
            <i class="bi bi-motherboard"></i>
        </a>
    </div>

    <div class="sidebar-items flex-grow-1 d-flex flex-column justify-content-center align-items-center py-3">
        <div class="list-items my-2 w-100 px-2 d-flex justify-content-center">
            <a href="#" class="btn rounded-3 p-2 text-center active" style="width: 50px; height: 50px;"
                data-bs-toggle="tooltip" data-bs-placement="right" title="New Sale">
                <i class="bi bi-bag-plus-fill fs-5"></i>
            </a>
        </div>

        <div class="list-items my-2 w-100 px-2 d-flex justify-content-center">
            <a href="{{ route('pos.products') }}" class="btn rounded-3 p-2 text-center"
                style="width: 50px; height: 50px;" data-bs-toggle="tooltip" data-bs-placement="right" title="Products">
                <i class="bi bi-box-seam fs-5"></i>
            </a>
        </div>

      

        <div class="list-items my-2 w-100 px-2 d-flex justify-content-center">
            <a href="#" class="btn rounded-3 p-2 text-center" style="width: 50px; height: 50px;"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Reports">
                <i class="bi bi-graph-up fs-5"></i>
            </a>
        </div>
    </div>
</div>
