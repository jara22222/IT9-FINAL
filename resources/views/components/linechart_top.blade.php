<div class="card">
    <div class="card-header">
        <p class="h5">Daily Sales</p>
    </div>
    <div class="card-body">
        <canvas id="lineChart" style="min-height: 380px">

        </canvas>
    </div>

    <div class="card-footer">

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById("lineChart");

    new Chart(ctx, {
        type: "line",
        data: {
            labels: {!! json_encode($dates) !!},
            datasets: [{
                label: "Daily Sales",
                data: {!! json_encode($totals) !!},
                backgroundColor: "rgba(54, 162, 235, 0.2)",
                borderColor: "rgba(54, 162, 235, 1)",
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {

            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '₱' + value.toFixed(2);
                        }
                    }
                }
            }
        }

    });
</script>
