<div>
    <div class="table-responsive-lg ">
        <div class="table-viewer" style="position: relative; max-height: 400px; overflow: auto;">
            <table class="table table-striped text-center shadow-sm ">
                <thead style="position: sticky; top: 0; background: white; z-index: 1;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Supplier id</th>
                        <th scope="col">Company name</th>
                        <th scope="col">Branch name</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Updated_at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($suppliers as $supplier)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $supplier->sid }}</td>
                            <td>{{ $supplier->company_name }}</td>
                            <td>
                                @foreach ($supplier->addresses as $address)
                                    {{ $address->branch }}
                                @endforeach
                            </td>
                            <td>{{ $supplier->created_at->format('F. j, Y : g:i A') }}</td>
                            <td>{{ $supplier->updated_at->format('F. j, Y : g:i A') }}</td>

                            <td class="d-flex gap-2 justify-content-center">
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $supplier->sid }}">
                                    <i class="bi bi-pencil-square fs-6"></i>
                                </button>
                                {{-- <x-delete-button :route="route('role.deleterole', ['sid' => $supplier->sid])" :supplier="$supplier" /> --}}

                            </td>
                        </tr>
                    @empty
                        <x-no-data />
                    @endforelse

                </tbody>
            </table>
            <x-edit_suppliers :suppliers="$suppliers" />
        </div>
    </div>

</div>
