<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>@yield('title', 'TechPOS')</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="https://unpkg.com/htmx.org@1.9.10"></script>
        <link rel="icon" href="{{ asset('imgs/computer.png') }}" />
        <link rel="stylesheet" href="{{ asset('css/pos.css') }}" />
    </head>

    <body>
        <div class="container-fluid vh-100 p-0 d-flex">
            <!-- Sidebar Component -->
            <x-pos_sidebar />

            <!-- Main Content -->
            <div class="main-content flex-grow-1 d-flex flex-column overflow-hidden">
                <header class="main-header sticky-top py-2 px-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h1 class="m-0">@yield('header', 'Point of Sale')</h1>
                            <small class="text-muted">@yield('header-description', 'PC Pay Computer Shop')</small>
                        </div>

                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle d-flex align-items-center"
                                type="button" id="cashierDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="me-2"><i class="bi bi-person-square fs-5"></i></span>
                                <span class="d-none d-md-inline">Cashier</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="cashierDropdown">
                                <li>
                                    <h6 class="dropdown-header">Account</h6>
                                </li>
                                <li><a class="dropdown-item py-2" href="#">
                                        <i class="bi bi-gear-fill me-2"></i>Settings
                                    </a></li>
                                <li><a class="dropdown-item py-2" href="#">
                                        <i class="bi bi-person-plus me-2"></i>Profile
                                    </a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
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
                    </div>
                </header>

                <div class="content-wrapper flex-grow-1 overflow-auto px-3">
                    @yield('contents')
                </div>
            </div>
        </div>

        <!-- Load Bootstrap JS at the end of body -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
        <script src="{{ asset('script/script.js') }}"></script>
    </body>

</html>
