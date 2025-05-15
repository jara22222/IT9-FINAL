@foreach ($products as $product)
    <div class="modal fade" id="editModal{{ $product->pid }}" tabindex="-1"
        aria-labelledby="editModalLabel{{ $product->pid }}" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 800px;">
            <div class="modal-content">
                <form action="{{ route('update.products', ['pid' => $product->pid]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header text-white" style="background-color: #3a4b8a;">
                        <h5 class="modal-title" id="editModalLabel{{ $product->pid }}">Edit Product</h5>
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
                                    <label for="product_name_{{ $product->pid }}" class="form-label">Product
                                        name</label>
                                    <input type="text" value="{{ old('product', $product->product_name) }}"
                                        class="form-control" id="product_name_{{ $product->pid }}" name="product"
                                        required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="category_{{ $product->pid }}" class="form-label">Category</label>
                                    <select name="category" id="category_{{ $product->pid }}" class="form-select"
                                        required>
                                        <option value="" disabled>Select category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->ptid }}"
                                                {{ $category->ptid == $product->ptid ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="supplier_{{ $product->pid }}" class="form-label">Supplier</label>
                                    <select name="supplier" id="supplier_{{ $product->pid }}" class="form-select"
                                        required>
                                        <option value="" disabled>Select supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->sid }}"
                                                {{ $supplier->sid == $product->sid ? 'selected' : '' }}>
                                                {{ $supplier->company_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="price_{{ $product->pid }}" class="form-label">Price</label>
                                    <input type="number" min="0" step=".01" class="form-control"
                                        id="price_{{ $product->pid }}" name="price"
                                        value="{{ old('price', $product->price) }}" required>
                                </div>



                                <div class="col-12 mb-3">
                                    <label for="description_{{ $product->pid }}" class="form-label">Description</label>
                                    <textarea class="form-control" id="description_{{ $product->pid }}" name="description" rows="3">{{ old('description', $product->product_desc) }}</textarea>
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
                                        <input type="file" name="image" class="form-control"
                                            id="inputGroupFile_{{ $product->pid }}" accept="image/*">
                                    </div>
                                    @if ($product->image)
                                        <small class="text-muted d-block mt-1">Current image: <a
                                                href="{{ asset('storage/' . $product->image) }}"
                                                target="_blank">View</a></small>
                                    @endif
                                    <small class="text-muted">Accepted formats: JPG/PNG/WebP</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
