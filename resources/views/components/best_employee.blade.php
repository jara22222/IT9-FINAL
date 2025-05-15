<div class="mt-3">
    <div class="table-responsive-lg ">
        <div class="table-viewer" id="tableContent" style="position: relative; max-height: 400px; overflow: auto;">
            <table class="table table-striped text-center shadow-sm ">
                <thead style="position: sticky; top: 0; background: white; z-index: 1;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">employee #</th>
                        <th scope="col">Employee</th>
                        <th scope="col">Transactions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($counts as $order)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $order->eid }}</td>
                            <td>{{ $order->employees->first_name }} {{ $order->employees->middle_name }}
                                {{ $order->employees->last_name }}</td>
                            <td>{{ $order->total_orders }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <x-no-data />
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>
