<div class="card">
    <div class="card-header">
        <p class="h5">Best Seller Products</p>
    </div>
    <div class="card-body">
        <canvas id="barChart" style="min-height: 338px">

        </canvas>
    </div>
    <div class="card-footer">

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('barChart');

        const productNames = {!! json_encode($product) !!};
        const productTotals = {!! json_encode($tots) !!};

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: productNames,
                datasets: [{
                    label: 'Total Orders per Product',
                    data: productTotals,
                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    x: {
                        ticks: {
                            autoSkip: false,
                            maxRotation: 90,
                            minRotation: 45
                        }
                    }
                }
            }
        });
    });
</script>
