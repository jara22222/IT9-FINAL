<div class="shadow-sm rounded-3" style="background-color: azure;">
    <form action="{{ route('pos.orders') }}" method="POST" id="orderForm" class="vh-100 d-flex flex-column">
        @csrf
        <input type="hidden" name="eid" id="eid" value="{{ Auth::user()->eid }}">
        <input type="hidden" name="total" id="total">
        <div id="items-container"></div>
        <div class="p-2 flex-grow-1 d-flex flex-column">
            <div class="transcript-header mt-3">
                <p class="h5 mb-2">Order Summary</p>
            </div>


            <div id="transcript" class=" rounded p-2 mb-3 overflow-auto" style="max-height: 600px;">

            </div>


            <div id="payment-section" class="mt-auto">

                <div id="total-display" class="fw-bold text-end small mb-2"></div>

                <label class="form-label fw-bold">Payment Method:</label>
                <select id="payment-method" class="form-select mb-2" onchange="togglePaymentFields()">
                    <option value="" selected disabled>Select Payment Method</option>
                    <option value="cash">Cash</option>
                    <option value="gcash">GCash</option>
                </select>
                <input type="hidden" id="p_type" value="" name="p_type">

                <div id="cash-fields" class="d-none">
                    <label for="cash-amount" class="form-label">Cash Received:</label>
                    <input type="number" id="cash-amount" class="form-control mb-2" min="0" step="0.01"
                        oninput="updateChange()">
                    <div id="change-output" class="text-success fw-bold"></div>
                </div>


                <div id="gcash-fields" class="d-none">
                    <label for="gcash-amount" class="form-label">GCash Payment Amount:</label>
                    <input type="number" id="gcash-amount" class="form-control mb-2" step="0.01" min="0"
                        oninput="validateGCashPayment()">

                    <label for="gcash-ref" class="form-label">GCash Reference Number:</label>
                    <input type="text" id="gcash-ref" class="form-control mb-2">

                    <div id="gcash-validation-msg" class="fw-bold"></div>
                </div>
            </div>
        </div>


        <div class="border-top p-2">
            <button type="button" class="btn btn-success w-100" onclick="submitOrder()">Pay</button>

        </div>
    </form>

</div>
