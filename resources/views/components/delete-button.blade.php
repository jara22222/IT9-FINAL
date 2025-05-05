@props(['route'])
<form action="{{ $route }}" method="POST" onsubmit= " return confirm('Are you sure?')">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-danger" type="submit"><i class="bi bi-trash fs-6"></i></button>
</form>
