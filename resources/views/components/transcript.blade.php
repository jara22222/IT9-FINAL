<div>
    <div class="p-1 rounded-3 border border-dark" style="background-color: #5649bd">
        <div class="border border-dark rounded-3 bg-white shadow-sm p-3 overflow-y-auto" style="height: 465px;">
            <h5 class="mb-3">Transaction</h5>
            <table class="table table-sm" id="transaction-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="transaction-body">
                    <!-- Transaction items will be added here dynamically -->
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <h5>Total: ₱<span id="transaction-total">0.00</span></h5>
            </div>
        </div>
    </div>
    <div class="buttons mt-3">
        <div class="d-flex justify-content-between gap-2 p-3 border border-dark rounded-4"
            style="background-color: #00c684">
            <button class="btn btn-info shadow-md form-control border-dark" id="pay-button">Pay</button>
            <button class="btn btn-warning shadow-md form-control border-dark" id="cancel-button">Cancel</button>
        </div>
    </div>
</div>
