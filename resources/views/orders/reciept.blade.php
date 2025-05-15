<!DOCTYPE html>
<html>

    <head>
        <title>Receipt</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }

            .receipt {
                width: 300px;
                margin: 0 auto;
            }

            .header {
                text-align: center;
            }

            .items {
                width: 100%;
                border-collapse: collapse;
            }

            .items td {
                padding: 5px;
                border-bottom: 1px dashed #ccc;
            }

            .total {
                font-weight: bold;
                text-align: right;
            }

            @media print {
                .no-print {
                    display: none;
                }

                body {
                    font-size: 12px;
                }
            }
        </style>
    </head>

    <body>
        <div class="receipt">
            <div class="header">
                <h2>Your Store</h2>
                <p>Order #{{ $order->oid }}</p>
                <p>{{ $order->created_at->format('m/d/Y H:i') }}</p>
            </div>

            <table class="items">
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $item->product->product_name }} x{{ $item->qty }}</td>
                        <td>₱{{ number_format($item->price_at_order * $item->qty, 2) }}</td>
                    </tr>
                @endforeach
            </table>

            <div class="total">
                <p>Total: ₱{{ number_format($order->total, 2) }}</p>
            </div>

            <div class="no-print" style="text-align: center; margin-top: 20px;">
                <button onclick="window.print()">Print Receipt</button>
                <button onclick="window.close()">Close</button>
            </div>
        </div>

        <script>
            // Auto-print if not already printed
            if (!window.matchMedia || !window.matchMedia('print').matches) {
                window.print();
            }
        </script>
    </body>

</html>
