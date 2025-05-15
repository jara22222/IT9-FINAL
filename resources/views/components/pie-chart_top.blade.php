<div class="card">
    <div class="card-header">
        <p class="h5">Category Contribution</p>
    </div>
    <div class="card-body">
        <canvas id="pieChart" style="max-height: 338px">

        </canvas>
    </div>
    <div class="card-footer">

    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('pieChart').getContext('2d');

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: {!! json_encode($categories) !!},
                    datasets: [{
                        label: 'Orders per Category',
                        data: {!! json_encode($orders) !!},
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)'
                        ],
                        borderColor: 'rgba(255, 255, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        });
    </script>
