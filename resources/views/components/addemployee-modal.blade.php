<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px;">
        <div class="modal-content">
            <form action="{{ route('add-employees') }}" method="POST" hx-target="body" hx-swap="innerHTML">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add New Employees</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="label mb-3">
                        <p class="h4 fw-bold">Employees personal details</p>

                    </div>
                    <div class="mb-3 row d-flex">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First name</label>
                            <input type="text" value="{{ old('first_name') }}" placeholder="Enter First Name"
                                class="form-control" id="firstName" name="first_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">Middle name</label>
                            <input type="text" value="{{ old('middle_name') }}" placeholder="Enter Middle Name"
                                class="form-control" id="firstName" name="middle_name" required>
                        </div>

                        <div class="col-md-6">
                            <label for="firstName" class="form-label">Last name</label>
                            <input type="text" value="{{ old('last_name') }}" placeholder="Enter Last Name"
                                class="form-control" id="firstName" name="last_name" required>
                        </div>

                        <div class="col-md-6">
                            <label for="firstName" class="form-label">Age</label>
                            <input type="number" min="0" placeholder="Enter age" value="{{ old('age') }}"
                                class="form-control" id="firstName" name="age" required>
                        </div>

                        <div class="col-md-6">
                            <label for="firstName" class="form-label">Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="" data-bs-toggle="dropdown" selected disabled>Select Gender
                                </option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="firstName" class="form-label">Birth Date</label>
                            <input type="date" placeholder="Select date" value="{{ old('birthday') }}"
                                class="form-control" id="firstName" name="birthday" required>
                        </div>
                    </div>
                    <hr>
                    <div class="label mb-3">
                        <p class="h4 fw-bold">Employees Contacts</p>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">Email</label>
                            <input type="email" value="{{ old('email') }}" placeholder="JohnDoe@gmail.com"
                                class="form-control" id="firstName" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">Phone No.</label>
                            <input type="text" value="{{ old('phone') }}" placeholder="09292396588"
                                class="form-control" id="firstName" name="phone" required>
                        </div>

                    </div>

                    <hr>
                    <div class="label mb-3">
                        <p class="h4 fw-bold">Employees Address</p>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">Street</label>
                            <input type="text" value="{{ old('street') }}" placeholder="Enter Street"
                                class="form-control" id="firstName" name="street" required>
                        </div>
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">City</label>
                            <input type="text" value="{{ old('city') }}" placeholder="Enter City"
                                class="form-control" id="firstName" name="city" required>
                        </div>
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">Province</label>
                            <input type="text" value="{{ old('province') }}" placeholder="Enter Province"
                                class="form-control" id="firstName" name="province" required>
                        </div>
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">Zip</label>
                            <input type="number" value="{{ old('zip') }}" placeholder="Enter Zip"
                                class="form-control" id="firstName" name="zip" required>
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
