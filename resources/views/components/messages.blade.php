<div class="p-3" style="z-index: 11" id="messages-container">
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert"
            style="position: fixed; top: 90px; right: 20px; z-index: 11111; width: 350px;">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach

    @if (session('success'))
        {{-- play notification --}}
        <audio src="{{ asset('audio/success.mp3') }}" autoplay></audio>
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert"
            style="position: fixed; top: 90px; right: 20px; z-index: 11111; width: 300px;">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <audio src="{{ asset('audio/error.mp3') }}" autoplay></audio>
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert"
            style="position: fixed; top: 90px; right: 20px; z-index: 11111; width: 300px;">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
