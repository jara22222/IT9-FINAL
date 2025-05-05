@foreach ($employees as $employee)
    <div class="modal fade" id="userModal{{ $employee->eid }}" tabindex="-1" aria-labelledby="userModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('register.user', ['eid' => $employee->eid]) }}" method="POST">

                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="userModalLabel">Add User {{ $employee->eid }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">Username</label>
                            <input type="text" value="{{ old('usersname') }}" placeholder="John Doe"
                                class="form-control" id="firstName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="firstName" class="form-label">Role</label>

                            <select name="rid" id="" class="form-select">
                                <option value="" data-bs-toggle="dropdown" selected disabled>
                                    Select role
                                </option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->rid }}">{{ $role->roles }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="firstName" class="form-label">Password</label>
                            <input type="password" value="{{ old('password') }}" placeholder="Enter Password"
                                class="form-control" id="firstName" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="firstName" class="form-label">Confirm Password</label>
                            <input type="password" value="{{ old('confirm_password') }}" placeholder="Re-enter Password"
                                class="form-control" id="firstName" name="confirm_password" required>
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
