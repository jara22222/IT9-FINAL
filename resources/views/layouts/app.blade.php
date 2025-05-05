<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/adm_sidebar.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>@yield('title', '')</title>
        <!-- Make sure you have Bootstrap JS included (preferably at end of body) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="https://unpkg.com/htmx.org@1.9.10"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
        <div class="container-fluid vh-100 d-flex p-0 overflow-y-auto">

            <!-- Sidebar -->
            <div class="sidebar">
                <x-sidebar />


            </div>

            <!-- Main Content -->
            <main class="main-content">
                <header class="main-header sticky-top mb-3 w-100  bg-white pt-2 ">
                    <div class="container-fluid d-flex align-items-end justify-content-between">
                        <div class="header details">
                            <h1 class="m-0 my-1">@yield('header', '')</h1>
                            <small class="text-muted">@yield('header-description', '')</small>
                        </div>




                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle d-flex align-items-center"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true"
                                aria-label="Toggle dropdown menu">
                                <span class="me-2"><i class="bi bi-person-square fs-5"></i></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                <li>
                                    <h6 class="dropdown-header">Account</h6>
                                </li>
                                <li><a class="dropdown-item py-2" href="#">
                                        <i class="bi bi-gear-fill me-2"></i>Action
                                    </a></li>
                                <li><a class="dropdown-item py-2" href="#">
                                        <i class="bi bi-person-plus me-2"></i>Another action
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a class="dropdown-item py-2 text-danger" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
    this.closest('form').submit();">
                                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <hr>
                </header>
                @yield('contents')
            </main>
        </div>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('script/script.js') }}"></script>

    </body>

</html>
