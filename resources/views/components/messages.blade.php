<div class="p-3" style="z-index: 11">

    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert"
            style="position: fixed; top: 90px; right: 20px; z-index: 11111; width: 350px;">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>

            {{ $error }}



        </div>
    @endforeach
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert"
            style="position: fixed; top: 90px; right: 20px; z-index: 11111; width: 300px;">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert"
            style="position: fixed; top: 90px; right: 20px; z-index: 11111; width: 300px;">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            {{ session('error') }}


        </div>
    @endif
</div>
