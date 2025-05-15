<div class="dropdown">
    <button class="btn btn-outline-danger form-control dropdown-toggle d-flex align-items-center" type="button"
        id="cashierDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="me-2"><i class="bi bi-person-square fs-5"></i></span>
        <span class="d-none d-md-inline">

            {{ __(Auth::user()->role->roles) }}

        </span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="cashierDropdown">

        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item py-2 text-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                </a>
            </form>
        </li>
    </ul>
</div>
