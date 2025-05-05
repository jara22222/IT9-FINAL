<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form hx-post="{{ route('add-category') }}" hx-target="body" hx-swap="innerHTML">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Category name</label>
                        <input type="text" value="{{ old('category_name') }}" placeholder="Enter Category Name"
                            class="form-control" id="firstName" name="category_name" required>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
