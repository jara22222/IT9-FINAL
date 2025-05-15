let items = [];
function getItems(button) {
    const card = button.closest(".card");
    const productName = card.querySelector(".product-name").value;
    const pid = card.querySelector(".product-id").value;
    const price = parseFloat(card.querySelector(".product-price").value);
    const stock = parseInt(card.querySelector(".product-stock").value);

    const existingItem = items.find((i) => i.pid === pid);

    if (existingItem) {
        if (existingItem.quantity + 1 > stock) {
            alert("Cannot add more. Stock limit reached.");
            return;
        }
        existingItem.quantity += 1;
    } else {
        if (stock < 1) {
            alert("This item is out of stock.");
            return;
        }
        items.push({
            product_name: productName,
            pid: pid,
            price: price,
            quantity: 1,
            stock: stock, // Optional, for reference
        });
    }

    renderTranscript();
}

function renderTranscript() {
    const transcriptDiv = document.getElementById("transcript");
    transcriptDiv.innerHTML = ""; // Clear before rendering again

    let grandTotal = 0;

    // Header row
    const headerHtml = `
        <div class="d-flex fw-bold border-bottom pb-1 small text-muted">
            <div class="flex-grow-1">Product</div>
            <div style="width: 50px;">Qty</div>
            <div style="width: 60px;">Price</div>
            <div style="width: 70px;">Total</div>
            <div style="width: 80px;" class="text-end">Total</div>
        </div>`;
    transcriptDiv.insertAdjacentHTML("beforeend", headerHtml);

    // Item rows
    items.forEach((item, index) => {
        const itemTotal = item.price * item.quantity;
        grandTotal += itemTotal;

        const itemHtml = `
            <div class="d-flex align-items-center border-bottom py-1 small">
                <div class="flex-grow-1 text-truncate">🛒 ${
                    item.product_name
                }</div>
                <div style="width: 50px;">${item.quantity}</div>
                <div style="width: 60px;">₱${item.price.toFixed(2)}</div>
                <div style="width: 70px;" class="text-end">₱${itemTotal.toFixed(
                    2
                )}</div>
                <button onclick="decrementItem(${index})" class="btn btn-sm btn-warning btn-xs ms-2 py-0 px-1">➖</button>
            </div>`;
        transcriptDiv.insertAdjacentHTML("beforeend", itemHtml);
    });

    // Grand total row
    const totalHtml = `
        <div class="mt-2 fw-bold text-end small border-top pt-2">
            Total: ₱${grandTotal.toFixed(2)}
        </div>`;
    transcriptDiv.insertAdjacentHTML("beforeend", totalHtml);
}

function decrementItem(index) {
    if (items[index].quantity > 1) {
        items[index].quantity -= 1;
    } else {
        items.splice(index, 1); // Remove if quantity reaches 0
    }
    renderTranscript();
}

//PAYMENT METHOD

function togglePaymentFields() {
    const method = document.getElementById("payment-method").value;
    const cashFields = document.getElementById("cash-fields");
    const gcashFields = document.getElementById("gcash-fields");
    const p_type = document.getElementById("p_type");

    cashFields.classList.add("d-none");
    gcashFields.classList.add("d-none");

    if (method === "cash") {
        cashFields.classList.remove("d-none");
        p_type.value = method;
    } else if (method === "gcash") {
        p_type.value = method;
        gcashFields.classList.remove("d-none");
    }
}

function updateChange() {
    const total = items.reduce(
        (sum, item) => sum + item.price * item.quantity,
        0
    );
    const cashReceived = parseFloat(
        document.getElementById("cash-amount").value || 0
    );
    const changeOutput = document.getElementById("change-output");

    if (cashReceived >= total) {
        const change = cashReceived - total;
        changeOutput.textContent = `Change: ₱${change.toFixed(2)}`;
    } else {
        changeOutput.textContent = "Insufficient amount!";
    }
}
function validateGCashPayment() {
    const total = items.reduce(
        (sum, item) => sum + item.price * item.quantity,
        0
    );
    const gcashAmount = parseFloat(
        document.getElementById("gcash-amount").value || 0
    );
    const validationMsg = document.getElementById("gcash-validation-msg");

    if (gcashAmount === "") {
        alert("Please provide cash!");
        return;
    }

    if (gcashAmount === total) {
        validationMsg.textContent = "✅ Amount matches total.";
        validationMsg.classList.remove("text-danger");
        validationMsg.classList.add("text-success");
    } else {
        validationMsg.textContent = "❌ Amount must match total.";
        validationMsg.classList.remove("text-success");
        validationMsg.classList.add("text-danger");
    }
}

function submitOrder() {
    const eid = document.getElementById("eid").value;
    const paymentMethod = document.getElementById("payment-method").value;
    const totalAmount = items.reduce(
        (sum, item) => sum + item.price * item.quantity,
        0
    );

    if (!paymentMethod) {
        alert("Select a payment method.");
        return;
    }

    if (!items.length) {
        alert("No items placed.");
        return;
    }

    // Validate GCash fields if GCash is selected
    if (paymentMethod === "gcash") {
        const gcashAmountInput = document.getElementById("gcash-amount").value;
        const gcashRef = document.getElementById("gcash-ref").value.trim();
        const gcashAmount = parseFloat(gcashAmountInput);

        if (!gcashAmountInput || isNaN(gcashAmount)) {
            alert("Please enter a valid GCash payment amount.");
            return;
        }

        if (gcashAmount !== totalAmount) {
            alert(
                `GCash payment must match the total amount: ₱${totalAmount.toFixed(
                    2
                )}.`
            );
            return;
        }

        if (!gcashRef) {
            alert("Please enter the GCash reference number.");
            return;
        }
    }

    // Ask to print the receipt
    const shouldPrint = confirm(
        "Do you want to print the receipt before submitting?"
    );
    if (shouldPrint) {
        const receiptHTML = `
            <html>
                <head>
                    <title>Receipt</title>
                    <style>
                        body { font-family: monospace; padding: 20px; }
                        .center { text-align: center; }
                        .line { border-top: 1px dashed #000; margin: 10px 0; }
                        .item-row { display: flex; justify-content: space-between; }
                        .footer { margin-top: 20px; font-size: 12px; text-align: center; }
                    </style>
                </head>
                <body>
                    <div class="center">
                        <h3>PAY COMPUTER RECIEPT</h3>
                        <div>${timestamp}</div>
                        <div>Employee ID: ${eid}</div>
                    </div>
                    <div class="line"></div>
                    ${items
                        .map(
                            (item) => `
                        <div class="item-row">
                           <span>${item.product_name} x${item.quantity}</span>

                            <span>₱${(item.price * item.quantity).toFixed(
                                2
                            )}</span>
                        </div>
                    `
                        )
                        .join("")}
                    <div class="line"></div>
                    <div class="item-row">
                        <strong>Total</strong>
                        <strong>₱${totalAmount.toFixed(2)}</strong>
                    </div>
                    <div class="item-row">
                        <span>Payment:</span>
                        <span>${paymentMethod}</span>
                    </div>
                    <div class="footer">
                        Thank you for your purchase!
                    </div>
                </body>
            </html>
        `;

        const printWindow = window.open("", "", "width=400,height=600");
        printWindow.document.write(receiptHTML);
        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
    }

    // Set total value
    document.getElementById("total").value = totalAmount.toFixed(2);

    // Clear existing item inputs
    const container = document.getElementById("items-container");
    container.innerHTML = "";

    // Add items as hidden inputs
    items.forEach((item, index) => {
        container.insertAdjacentHTML(
            "beforeend",
            `
            <input type="hidden" name="items[${index}][pid]" value="${item.pid}">
            <input type="hidden" name="items[${index}][qty]" value="${item.quantity}">
        `
        );
    });

    // Submit the form
    document.getElementById("orderForm").submit();
}

var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});
