<div>
    <div class="table-responsive-lg ">
        <div class="table-viewer" style="position: relative; max-height: 400px; overflow: auto;">
            <table class="table table-striped text-center shadow-sm ">
                <thead style="position: sticky; top: 0; background: white; z-index: 1;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role #</th>
                        <th scope="col">Role name</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Updated_at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($roles as $role)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $role->rid }}</td>
                            <td>{{ $role->roles }}</td>
                            <td>{{ $role->created_at->format('F. j, Y : g:i A') }}</td>
                            <td>{{ $role->updated_at->format('F. j, Y : g:i A') }}</td>

                            <td class="d-flex gap-2 justify-content-center">
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $role->rid }}">
                                    <i class="bi bi-pencil-square fs-6"></i>
                                </button>
                                <x-delete-button :route="route('role.deleterole', ['rid' => $role->rid])" :role="$role" />

                            </td>
                        </tr>
                    @empty
                        <x-no-data />
                    @endforelse

                </tbody>
            </table>
            <x-editroles-modal :roles="$roles" />
        </div>
    </div>

</div>
