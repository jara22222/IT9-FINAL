<div class="mt-3">
    <div class="table-responsive-lg ">
        <div class="table-viewer" id="tableContent" style="position: relative; max-height: 400px; overflow: auto;">
            <table class="table table-striped text-center shadow-sm ">
                <thead style="position: sticky; top: 0; background: white; z-index: 1;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order #</th>
                        <th scope="col">Employee</th>
                        <th scope="col">Orders</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Price</th>
                        <th scope="col">Payment type</th>
                        <th scope="col">Order_date</th>


                    </tr>
                </thead>
                <tbody>

                    @forelse ($histories as $history)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td> {{ $history->oid }} </td>
                            <td>{{ $history->orders->employees->first_name }}
                                {{ $history->orders->employees->middle_name }}
                                {{ $history->orders->employees->last_name }}</td>
                            <td>{{ $history->products->product_name }}</td>
                            <td>{{ $history->qty }}</td>
                            <td>
                                <div class="flex text-start align-center ">

                                    ₱ {{ $history->products->price }}</div>
                            </td>
                            <td>{{ $history->orders->p_type }}</td>
                            <td>{{ $history->created_at->format('F. j, Y : g:i A') }}</td>




                        </tr>
                    @empty
                        <x-no-data />
                    @endforelse

                </tbody>
            </table>

        </div>
    </div>

</div>
