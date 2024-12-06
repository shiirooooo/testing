<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Tank Monitoring Dashboard</title>
    <!-- Bootstrap 4 CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Chart.js for the Graph -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Set background image */
        body {
            background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(image/backgorund.jpg) !important;
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
            color: white;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 50px;
            background: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            padding: 30px;
            border-radius: 15px;
        }

        /* Header styles */
        .dashboard-header {
            text-align: center;
            margin-bottom: 30px;
        }

        h1, h3 {
            font-size: 36px;
            color: #fff;
        }

        .row {
            margin-top: 20px;
        }

        /* Card styling */
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.2); /* Slightly transparent background */
            color: white;
        }

        .card-body {
            text-align: center;
            padding: 20px;
        }

        .card-title {
            font-size: 20px;
        }

        .card-text {
            font-size: 18px;
            font-weight: bold;
        }

        .chart-container {
            margin: 30px 0;
            padding: 30px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.2);
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #333;
        }

        .table thead {
            background-color: #1a233a;
            color: white;
        }

        /* Button styling */
        .btn-custom {
            background-color: #00b0ff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
        }

        .btn-custom:hover {
            background-color: #0080ff;
        }

        .back-btn {
            margin-top: 20px;
            text-align: center;
        }

        .back-btn a {
            font-size: 20px;
            color: white;
            padding: 10px 25px;
            background-color: #333;
            border-radius: 5px;
            text-decoration: none;
        }

        .back-btn a:hover {
            background-color: #555;
        }

        .card i {
            font-size: 40px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="dashboard-header">
            <h1>Water Tank Monitoring Dashboard</h1>
            <h3>Real-time monitoring of water tank height and water clarity</h3>
        </div>

        <!-- Cards for Key Data -->
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <i class="fas fa-tint"></i>
                        <h5 class="card-title">Current Water Height</h5>
                        <p class="card-text">3.5 meters</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <i class="fas fa-water"></i>
                        <h5 class="card-title">Current Water Clarity</h5>
                        <p class="card-text">50 TDS</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Water Height and Clarity Graph -->
        <div class="chart-container">
            <canvas id="waterTankChart"></canvas>
        </div>

        <!-- Recent Data Table -->
        <div>
            <h3>Recent Monitoring Data</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Water Height (m)</th>
                        <th>Water Clarity (TDS)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024-12-05 10:00</td>
                        <td>3.5</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>2024-12-05 09:30</td>
                        <td>3.3</td>
                        <td>55</td>
                    </tr>
                    <tr>
                        <td>2024-12-05 09:00</td>
                        <td>3.2</td>
                        <td>58</td>
                    </tr>
                    <tr>
                        <td>2024-12-05 08:30</td>
                        <td>3.8</td>
                        <td>48</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Back Button to Index -->
        <div class="back-btn">
            <a href="index.php">Back to Dashboard</a>
        </div>
    </div>

    <!-- Chart.js Script for Water Height and Clarity Graph -->
    <script>
        var ctx = document.getElementById('waterTankChart').getContext('2d');
        var waterTankChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['2024-12-05 08:30', '2024-12-05 09:00', '2024-12-05 09:30', '2024-12-05 10:00'],
                datasets: [{
                    label: 'Water Height (m)',
                    data: [3.8, 3.2, 3.3, 3.5],
                    borderColor: '#00b0ff',
                    borderWidth: 2,
                    fill: false
                }, {
                    label: 'Water Clarity (TDS)',
                    data: [48, 58, 55, 50],
                    borderColor: '#28a745',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Water Tank Monitoring (Height & Clarity)'
                    },
                    legend: {
                        position: 'top'
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Time'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Values'
                        }
                    }
                }
            }
        });
    </script>

    <!-- Bootstrap 4 JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
