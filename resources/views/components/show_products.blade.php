<div class="container-fluid">
    <div class="row" id="product-list">
        @forelse ($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3 p-3">
                <div class="card h-100 product-card @if ($product->stock < 1) opacity-50 pe-none @endif">
                    <div class="card-body position-relative">

                        <img src="@if ($product->stock < 1) {{ asset('imgs/NoStock.jpg') }}
                        @else
                            {{ asset('storage/' . $product->image) }} @endif"
                            alt="{{ $product->product_name }}"
                            class="card-img @if ($product->stock < 1) grayscale @endif">


                        <!-- Stock Badge -->
                        <div class="position-absolute" style="top: 10px; right: 10px; z-index: 10;">
                            @if ($product->stock < 1)
                                <span class="badge bg-secondary"><small>No stock
                                    </small></span>
                            @elseif($product->stock <= 10)
                                <span class="badge bg-danger"><small>Low Stock
                                        ({{ $product->stock }})
                                    </small></span>
                            @elseif($product->stock < 15)
                                <span class="badge bg-warning text-dark"><small>Low Stock
                                        ({{ $product->stock }})</small></span>
                            @else
                                <span class="badge bg-success"><small>In Stock</small></span>
                            @endif
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-between align-items-start">
                            <h6 class="mb-1">{{ $product->product_name }}</h6>
                            <p class="text-muted mb-2">₱{{ number_format($product->price, 2) }}</p>
                        </div>

                        <!-- Hidden values for JS -->
                        <input type="hidden" class="product-name" value="{{ $product->product_name }}">
                        <input type="hidden" class="product-id" value="{{ $product->pid }}">
                        <input type="hidden" class="product-price" value="{{ $product->price }}">
                        <input type="hidden" class="product-stock" value="{{ $product->stock }}">


                        <button onclick="getItems(this)"
                            class="btn btn-sm w-100 add-product-btn 
                            @if ($product->stock < 1) btn-secondary disabled @else btn-outline-success @endif"
                            @if ($product->stock < 1) disabled @endif>
                            {{ $product->stock < 1 ? 'Disabled' : 'Add to Order' }}
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <div class="alert alert-info">No products available</div>
            </div>
        @endforelse
    </div>
</div>
