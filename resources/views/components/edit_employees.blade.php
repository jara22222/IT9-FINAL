@foreach ($employees as $employee)
    <div class="modal fade" id="editModal{{ $employee->eid }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog " style="max-width: 800px;">
            <div class="modal-content">
                <form action="{{ route('edit-employees', ['eid' => $employee->eid]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h5 class="modal-title ">Edit <span class="text-warning"> {{ $employee->first_name }}</span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="label mb-3">
                            <p class="h4 fw-bold">Employees personal details</p>

                        </div>
                        <div class="mb-3 row d-flex">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">First name</label>
                                <input type="text" value="{{ $employee->first_name }}" placeholder="Enter First Name"
                                    class="form-control" id="firstName" name="first_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">Middle name</label>
                                <input type="text" value="{{ $employee->middle_name }}"
                                    placeholder="Enter Middle Name" class="form-control" id="firstName"
                                    name="middle_name" required>
                            </div>

                            <div class="col-md-6">
                                <label for="firstName" class="form-label">Last name</label>
                                <input type="text" value="{{ $employee->last_name }}" placeholder="Enter Last Name"
                                    class="form-control" id="firstName" name="last_name" required>
                            </div>

                            <div class="col-md-6">
                                <label for="firstName" class="form-label">Age</label>
                                <input type="number" min="0" placeholder="Enter age"
                                    value="{{ $employee->age }}" class="form-control" id="firstName" name="age"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label for="firstName" class="form-label">Gender</label>
                                <select name="gender" id="" class="form-control" required>
                                    <option value="" data-bs-toggle="dropdown" selected disabled>
                                        Select gender
                                    </option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="firstName" class="form-label">Birth Date</label>
                                <input type="date" placeholder="Select date"
                                    value="{{ $employee->birthday->format('Y-m-d') }}" class="form-control"
                                    id="firstName" name="birthday" required>
                            </div>
                        </div>
                        <hr>
                        <div class="label mb-3">
                            <p class="h4 fw-bold">Employees Contacts</p>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">Email</label>
                                <input type="email" value="{{ $employee->email }}" placeholder="JohnDoe@gmail.com"
                                    class="form-control" id="firstName" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">Phone No.</label>
                                <input type="text" value="{{ $employee->phone }}" placeholder="09292396588"
                                    class="form-control" id="firstName" name="phone" required>
                            </div>

                        </div>

                        <hr>
                        <div class="label mb-3">
                            <p class="h4 fw-bold">Employees Address</p>

                        </div>

                        @foreach ($employee->addresses as $address)
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">Street</label>
                                    <input type="text" value="{{ $address->street }}" placeholder="Enter Street"
                                        class="form-control" id="firstName" name="street" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">City</label>
                                    <input type="text" value="{{ $address->city }}" placeholder="Enter City"
                                        class="form-control" id="firstName" name="city" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">Province</label>
                                    <input type="text" value="{{ $address->province }}"
                                        placeholder="Enter Province" class="form-control" id="firstName"
                                        name="province" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">Zip</label>
                                    <input type="number" value="{{ $address->zip }}" placeholder="Enter Zip"
                                        class="form-control" id="firstName" name="zip" required>
                                </div>
                        @endforeach

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </form>
        </div>
    </div>
    </div>
@endforeach
