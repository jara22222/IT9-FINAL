@foreach ($categories as $category)
    <div class="modal fade" id="editModal{{ $category->ptid }}" tabindex="-1"
        aria-labelledby="editModalLabel{{ $category->ptid }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('edit-categories', ['ptid' => $category->ptid]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $category->ptid }}">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName{{ $category->ptid }}" class="form-label">Category Name</label>
                            <input type="text" value="{{ old('category_name', $category->category_name) }}"
                                placeholder="Enter Category Name"
                                class="form-control @error('category_name') is-invalid @enderror"
                                id="categoryName{{ $category->ptid }}" name="category_name" required>
                            @error('category_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
