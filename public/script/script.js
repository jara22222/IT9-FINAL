document.addEventListener("DOMContentLoaded", function () {
    const toggleSidebar = document.querySelector(".toggle-sidebar");
    if (toggleSidebar) {
        toggleSidebar.addEventListener("click", function () {
            document.querySelector(".sidebar").classList.toggle("shrink");
        });
    }

    const alerts = document.querySelectorAll(".alert");
    alerts.forEach((alert) => {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 3000);
    });

    // POS functionality
    const productList = document.getElementById("product-list");
    const transactionBody = document.getElementById("transaction-body");
    const transactionTotal = document.getElementById("transaction-total");
    const payButton = document.getElementById("pay-button");
    const cancelButton = document.getElementById("cancel-button");

    let transactionItems = [];

    function updateTransactionTable() {
        transactionBody.innerHTML = "";
        let total = 0;
        transactionItems.forEach((item, index) => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${item.name}</td>
                <td><input type="number" min="1" value="${
                    item.quantity
                }" data-index="${index}" class="quantity-input form-control form-control-sm" style="width: 60px;"></td>
                <td>₱${item.price.toFixed(2)}</td>
                <td>₱${itemTotal.toFixed(2)}</td>
                <td><button class="btn btn-sm btn-danger remove-item-btn" data-index="${index}">Remove</button></td>
            `;
            transactionBody.appendChild(row);
        });
        transactionTotal.textContent = total.toFixed(2);
        attachQuantityListeners();
        attachRemoveListeners();
    }

    function attachQuantityListeners() {
        const quantityInputs = document.querySelectorAll(".quantity-input");
        quantityInputs.forEach((input) => {
            input.addEventListener("change", (e) => {
                const index = e.target.getAttribute("data-index");
                let value = parseInt(e.target.value);
                if (isNaN(value) || value < 1) {
                    value = 1;
                    e.target.value = 1;
                }
                transactionItems[index].quantity = value;
                updateTransactionTable();
            });
        });
    }

    function attachRemoveListeners() {
        const removeButtons = document.querySelectorAll(".remove-item-btn");
        removeButtons.forEach((button) => {
            button.addEventListener("click", (e) => {
                const index = e.target.getAttribute("data-index");
                transactionItems.splice(index, 1);
                updateTransactionTable();
            });
        });
    }

    productList.addEventListener("click", (e) => {
        if (e.target.classList.contains("add-product-btn")) {
            const id = e.target.getAttribute("data-id");
            const name = e.target.getAttribute("data-name");
            const price = parseFloat(e.target.getAttribute("data-price"));
            const existingItem = transactionItems.find(
                (item) => item.id === id
            );
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                transactionItems.push({ id, name, price, quantity: 1 });
            }
            updateTransactionTable();
        }
    });

    payButton.addEventListener("click", () => {
        if (transactionItems.length === 0) {
            alert("No items in the transaction.");
            return;
        }
        // Here you would typically send the transaction to the server for processing
        alert("Payment processed. Thank you!");
        transactionItems = [];
        updateTransactionTable();
    });

    cancelButton.addEventListener("click", () => {
        if (confirm("Are you sure you want to cancel the transaction?")) {
            transactionItems = [];
            updateTransactionTable();
        }
    });
});
document.addEventListener("DOMContentLoaded", function () {
    if (window.innerWidth > 992) {
        var tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="tooltip"]')
        );
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }

    function handleSidebar() {
        const sidebar = document.querySelector(".sidebar");
        if (window.innerWidth > 992) {
            sidebar.style.width = "200px";

            document.querySelectorAll(".sidebar-items span").forEach((el) => {
                el.classList.remove("d-none");
            });
        } else {
            sidebar.style.width = "100%";

            document.querySelectorAll(".sidebar-items span").forEach((el) => {
                el.classList.add("d-none");
            });
        }
    }

    window.addEventListener("resize", handleSidebar);
    handleSidebar();
});
