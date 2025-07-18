<div class="mt-3">
    <div class="table-responsive-lg ">
        <div class="table-viewer" id="tableContent" style="position: relative; max-height: 400px; overflow: auto;">
            <table class="table table-striped text-center shadow-sm ">
                <thead style="position: sticky; top: 0; background: white; z-index: 1;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id</th>
                        <th scope="col">Employee name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Birthdate</th>
                        <th scope="col">Account status</th>
                        <th scope="col">Created</th>
                        <th scope="col">Updated</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($employees as $employee)
                        <tr
                            @if ($employee->status === 0) data-bs-toggle="modal"
                            data-bs-target="#userModal{{ $employee->eid }}"
                            style="cursor: pointer;"
                            title="Click to add account" @endif>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $employee->eid }}</td>
                            <td>{{ $employee->first_name }} {{ $employee->middle_name }} {{ $employee->last_name }}</td>
                            <td>{{ $employee->age }}</td>
                            <td>{{ strtoupper($employee->gender) }}</td>
                            <td>{{ $employee->birthday->format('F. j, Y') }}</td>
                            <td>
                                <div class="badge {{ $employee->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $employee->status == 1 ? 'Registered' : 'Un registered' }}
                                </div>
                            </td>
                            <td>{{ $employee->created_at->format('F. j, Y : g:i A') }}</td>
                            <td>{{ $employee->updated_at->format('F. j, Y : g:i A') }}</td>

                            <td class="d-flex gap-2 justify-content-center">



                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $employee->eid }}">
                                    <i class="bi bi-pencil-square fs-6"></i>
                                </button>
                                <x-delete-button :route="route('delete-employees', ['eid' => $employee->eid])" />


                            </td>
                        </tr>
                    @empty
                        <x-no-data />
                    @endforelse

                </tbody>
            </table>
            <x-edit_employees :employees="$employees" />
        </div>
    </div>

</div>
