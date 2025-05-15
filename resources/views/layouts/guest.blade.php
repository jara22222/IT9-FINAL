<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <div class="sidebar">
                <x-pos_sidebar />
            </div>

            <!-- Main Content -->
            <div class="main-content flex-grow-1 d-flex overflow-hidden">


                <div class="content-wrapper flex-grow-1" style="min-width:82.20em">
                    @yield('contents')
                </div>
            </div>
        </div>

        <!-- Load Bootstrap JS at the end of body -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
        <script src="{{ asset('script/script.js') }}"></script>
        <script src="{{ asset('script/pos.js') }}"></script>
        <script src="https://unpkg.com/htmx.org@1.9.2"></script>
    </body>

</html>
