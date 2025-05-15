<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px;">
        <div class="modal-content">
            <form action="{{ route('pos.addproducts') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header text-white" style="background-color: #3a4b8a;">
                    <h5 class="modal-title" id="addModalLabel">Add New Products</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Product Details Section -->
                    <div class="mb-4">
                        <div class="label mb-3">
                            <p class="h4 fw-bold">Product details</p>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="product_name" class="form-label">Product name</label>
                                <input type="text" value="{{ old('product_name') }}" placeholder="Enter product name"
                                    class="form-control" id="product_name" name="product" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" id="category" class="form-select">
                                    <option value="" selected disabled>Select category</option>
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->ptid }}">{{ $category->category_name }}</option>
                                    @empty
                                        <option value="">{{ __('No categories found!') }}</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="supplier" class="form-label">Supplier</label>
                                <select name="supplier" id="supplier" class="form-select">
                                    <option value="" selected disabled>Select supplier</option>
                                    @forelse ($suppliers as $supplier)
                                        <option value="{{ $supplier->sid }}">{{ $supplier->company_name }}</option>
                                    @empty
                                        <option value="">{{ __('No suppliers found!') }}</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" min="0" placeholder="0.00" step=".01"
                                    value="{{ old('price') }}" class="form-control" id="price" name="price"
                                    required>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="price" class="form-label">Stock</label>
                                <input type="number"placeholder="0" min="1" value="{{ old('stock') }}"
                                    class="form-control" id="stock" name="stock" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Image Upload Section -->
                    <div class="mb-3">
                        <div class="label mb-3">
                            <p class="h4 fw-bold">Import image</p>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="input-group">
                                    <input type="file" name="image" class="form-control" id="inputGroupFile04"
                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload"
                                        accept="image/*,.jpg,.jpeg,.png,.gif,.webp,.svg,.bmp,.tiff">
                                </div>
                                <small class="text-muted">Accepted formats: JPG/PNG</small>
                            </div>
                        </div>
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
