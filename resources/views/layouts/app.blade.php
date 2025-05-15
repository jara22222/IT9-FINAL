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
            <main class="main-content" style="background-color:  rgb(244, 248, 244);">
                <header class="main-header sticky-top border-bottom pb-3 w-100 pt-2 "
                    style="background-color:  rgb(244, 248, 244);">
                    <div class="container-fluid d-flex align-items-end justify-content-between">
                        <div class="header details">
                            <h1 class="m-0 my-1 ">@yield('header', '')</h1>
                            <small class="text-muted">@yield('header-description', '')</small>
                        </div>






                        <div class="d-flex gap-3 align-items-center">
                            <div class="download">
                                <button class="btn btn-outline-success" title="Download Employee PDF" id="downloadPDF">
                                    <i class="bi bi-download"></i>
                                </button>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{ asset('imgs/admin.jpg') }}" class="rounded-circle me-2" width="40"
                                    height="40">
                                <div class="d-none d-lg-block">
                                    <p class="mb-0 fw-bold">
                                        {{ Auth::user()->name }}
                                    </p>
                                    <small class="text-muted">Administrator</small>
                                </div>
                            </div>
                        </div>

                    </div>

                </header>
                @yield('contents')
            </main>
        </div>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('script/script.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="{{ asset('script/dashboard.js') }}"></script>


        <script>
            document.getElementById('downloadPDF').addEventListener('click', function(event) {
                event.preventDefault();

                const element = document.getElementById('tableContent');

                const title = document.querySelector('.report-title')?.textContent.trim().replace(/\s+/g, '_') ||
                    'Report';
                const timestamp = new Date().toISOString().slice(0, 19).replace(/[:T]/g, '-');
                const filename = `${title}_${timestamp}.pdf`;


                const originalWidth = element.style.width;
                element.style.width = "100%";

                html2pdf().from(element).set({
                    margin: 0.3,
                    filename: filename,
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 3,
                        useCORS: true
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'a4',
                        orientation: 'landscape'
                    }
                }).save().then(() => {
                    // Reset styling
                    element.style.width = originalWidth;
                });
            });
        </script>



    </body>

</html>
