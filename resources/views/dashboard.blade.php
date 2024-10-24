<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .legend-item {
            list-style: none;
            margin-bottom: 5px;
        }

        .legend-item span {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Dashboard - Tank Rehabilitation Summary</h2>
        
        <div class="row">
            <!-- Tank Rehabilitation Card -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Tank Rehabilitation Status</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="tankStatusChart"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Legend -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Status Legend</h4>
                    </div>
                    <div class="card-body">
                        <ul id="legend"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Data from your Laravel Controller
        var statuses = @json($statuses);
        var statusCounts = @json($statusCounts);

        // Colors for each status
        var colors = [
            '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', 
            '#FF9F40', '#66FF66', '#FF3333', '#99CCFF', '#FFCC99', 
            '#FF6699', '#99FF33', '#FF66FF', '#3399FF', '#FF9999'
        ];

        // Initialize Chart.js bar chart
        var ctx = document.getElementById('tankStatusChart').getContext('2d');
        var tankStatusChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: statuses, // These won't be displayed in the chart but will be in the legend
                datasets: [{
                    data: statusCounts,
                    backgroundColor: colors,
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: false // Disable the default legend
                },
                scales: {
                    xAxes: [{
                        display: false // Disable x-axis labels
                    }]
                }
            }
        });

        // Add custom legend
        var legendContainer = document.getElementById('legend');
        statuses.forEach(function(status, index) {
            var legendItem = document.createElement('li');
            legendItem.classList.add('legend-item');
            legendItem.innerHTML = `<span style="background-color: ${colors[index]};"></span>${status}`;
            legendContainer.appendChild(legendItem);
        });
    </script>
</body>
</html>
