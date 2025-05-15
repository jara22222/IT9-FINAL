<div class="mt-3">
    <div class="table-responsive-lg ">
        <div class="table-viewer" style="position: relative; max-height: 400px; overflow: auto;">
            <table class="table table-striped text-center shadow-sm ">
                <thead style="position: sticky; top: 0; background: white; z-index: 1;">
                    <tr>

                        <th scope="col">#</th>
                        <th scope="col">
                            Product #
                            @if (Auth::user()->role->roles === 'Manager')
                                <span data-bs-toggle="tooltip" title="Click rows to re-stock"
                                    class="badge bg-info text-dark" style="cursor: help; font-size: 1rem;">
                                    ?
                                </span>
                            @endif
                        </th>

                        <th scope="col">Product name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Created_at</th>



                    </tr>
                </thead>
                <tbody>

                    @forelse ($products as $product)
                        <tr
                            @if (Auth::user()->role->roles === 'Manager') data-bs-toggle="modal" data-bs-target="#editModal{{ $product->pid }}" @endif>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $product->pid }}</td>
                            <td class="d-flex justify-content-start align-items-center gap-5">
                                <img src="{{ asset('storage/' . $product->image) }}" alt=""
                                    style="max-width: 50px; max-height: 50px; border-radius: 4px;">
                                <small>{{ $product->product_name }}</small>
                            </td>
                            <td>{{ $product->categories->category_name }}</td>
                            <td>{{ $product->suppliers->company_name }}</td>
                            <td>{{ $product->stock }}</td>

                            <td>{{ $product->created_at->format('F. j, Y : g:i A') }}</td>

                            <td>

                            </td>


                        </tr>
                    @empty
                        <x-no-data />
                    @endforelse

                </tbody>
            </table>
            <x-add_stock :products="$products" />


        </div>
    </div>

</div>
