@foreach ($users as $user)
    <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('update.user', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Edit Suppliers</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>


                    <div class="modal-body">

                        <div class="label mb-3 d-flex">
                            <p class="h4 fw-bold">Users personal details</p>&nbsp;<i
                                class="bi fs-5 bi-exclamation-circle-fill text-info" data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Please fill out form correctly"></i>
                            </i>

                        </div>
                        <div class="my-2 row d-flex">
                            <div class="col-md-12">
                                <label for="firstName" class="form-label">Username</label>
                                <input type="text" value="{{ $user->name }}" placeholder="Enter Name"
                                    class="form-control" id="name" name="name" required>
                            </div>
                            <div class="my-2 col-md-12">
                                <label for="firstName" class="form-label">New password</label>
                                <input type="password" placeholder="Enter password" class="form-control" id="branch"
                                    name="password" required>
                            </div>
                            <div class="my-2 col-md-12">
                                <label for="firstName" class="form-label">Re-enter password</label>
                                <input type="password" placeholder="confirm_password" class="form-control"
                                    id="branch" name="confirm_password" required>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
