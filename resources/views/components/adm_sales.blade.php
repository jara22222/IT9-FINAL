<div class="mt-3">
    <div class="table-responsive-lg ">
        <div class="table-viewer" id="tableContent" style="position: relative; max-height: 400px; overflow: auto;">
            <table class="table table-striped text-center shadow-sm ">
                <thead style="position: sticky; top: 0; background: white; z-index: 1;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Products</th>
                        <th scope="col">Total Items Sold</th>
                        <th scope="col">Total Sold</th>




                    </tr>
                </thead>
                <tbody>

                    @forelse ($sales as $sale)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td> {{ $sale->product_name }} </td>
                            <td> {{ $sale->total_selled }} </td>
                            <td> ₱ {{ number_format($sale->total, '2', ',') }} </td>





                        </tr>
                    @empty
                        <x-no-data />
                    @endforelse

                </tbody>
            </table>

        </div>
    </div>

</div>
