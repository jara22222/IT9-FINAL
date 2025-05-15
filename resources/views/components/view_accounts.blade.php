<div>
    <div class="table-responsive-lg ">
        <div class="table-viewer" id="tableContent" style="position: relative; max-height: 400px; overflow: auto;">
            <table class="table table-striped text-center shadow-sm ">
                <thead style="position: sticky; top: 0; background: white; z-index: 1;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Account #</th>
                        <th scope="col">Username</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Updated_at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->role->roles }}</td>
                            <td>{{ $user->created_at->format('F. j, Y : g:i A') }}</td>
                            <td>{{ $user->updated_at->format('F. j, Y : g:i A') }}</td>

                            <td class="d-flex gap-2 justify-content-center">
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $user->id }}">
                                    <i class="bi bi-pencil-square fs-6"></i>
                                </button>
                                <x-delete-button :route="route('delete.user', ['id' => $user->id])" :user="$user" />
                            </td>
                        </tr>
                    @empty
                        <x-no-data />
                    @endforelse

                </tbody>
            </table>
            <x-edit_accounts :users="$users" />
        </div>
    </div>

</div>
