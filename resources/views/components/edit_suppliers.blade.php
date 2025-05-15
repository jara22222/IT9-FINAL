@foreach ($suppliers as $supplier)
    <div class="modal fade" id="editModal{{ $supplier->sid }}" tabindex="-1" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('update-suppliers', ['sid' => $supplier->sid]) }}" method="POST" hx-target="body"
                    hx-swap="innerHTML">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Edit Suppliers</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>


                    <div class="modal-body">

                        <div class="label mb-3 d-flex">
                            <p class="h4 fw-bold">Suppliers personal details</p>&nbsp;<i
                                class="bi fs-5 bi-exclamation-circle-fill text-info" data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Please fill out form correctly"></i>
                            </i>

                        </div>
                        <div class="mb-3 row d-flex">
                            <div class="col-md-12 my-2">
                                <label for="firstName" class="form-label">Suppliers/Company name</label>
                                <input type="text" value="{{ $supplier->company_name }}" placeholder="Enter Name"
                                    class="form-control" id="company_name" name="company_name" required>
                            </div>
                            <div class="col-md-12 my-2">

                                <label for="firstName" class="form-label">Branch name</label>
                                <input type="text" placeholder="Enter Branch Name"
                                    value="{{ $supplier->address->branch ?? 'n/a' }}" class="form-control"
                                    id="branch" name="branch" required>

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
