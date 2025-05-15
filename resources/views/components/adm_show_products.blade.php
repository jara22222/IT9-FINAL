<div class="mt-3">
    <div class="table-responsive-lg ">
        <div class="table-viewer " id="tableContent" style="position: relative; max-height: 400px; overflow: auto;">
            <table class="table table-striped text-center shadow-sm ">
                <thead style="position: sticky; top: 0; background: white; z-index: 1;">
                    <tr>

                        <th scope="col">#</th>
                        <th scope="col">
                            Product #
                        </th>

                        <th scope="col">Product name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Created</th>
                        <th scope="col">Updated</th>
                        <th scope="col">Delete</th>



                    </tr>
                </thead>
                <tbody>

                    @forelse ($products as $product)
                        <tr>

                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $product->pid }}</td>
                            <td>
                                {{ $product->product_name }}
                            </td>
                            <td>{{ $product->categories->category_name }}</td>
                            <td>{{ $product->suppliers->company_name }}</td>
                            <td>{{ $product->stock }}</td>

                            <td>{{ $product->created_at->format('F. j, Y : g:i A') }}</td>
                            <td>{{ $product->updated_at->format('F. j, Y : g:i A') }}</td>
                            <td class="d-flex gap-2 justify-content-center">
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $product->pid }}"">
                                    <i class="bi bi-pencil-square fs-6"></i>
                                </button>

                                <x-delete-button :route="route('delete.products', ['pid' => $product->pid])" />
                            </td>


                        </tr>
                    @empty
                        <x-no-data />
                    @endforelse

                </tbody>
            </table>
        </div>

        <x-admin_-product_-edit :suppliers="$suppliers" :categories="$categories" :products="$products" />


    </div>
</div>

</div>
