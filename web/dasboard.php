<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Water Tank Monitoring Dashboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="css/dasboard.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="dashboard-header text-center mb-4">
            <h1>Water Tank Monitoring Dashboard</h1>
            <h3>Real-time monitoring of water tank height and turbidity</h3>
        </header>

        <!-- MQTT Connection Status -->
        <section class="row mb-4">
            <div class="col-12">
                <div class="card bg-info text-white text-center">
                    <div class="card-body">
                        <i class="fas fa-plug fa-2x mb-3"></i>
                        <h5 class="card-title">Device Connection</h5>
                        <p class="card-text" id="mqttStatus">Loading...</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Dashboard Content -->
        <div class="row">
            <!-- Data Cards Column -->
            <div class="col-md-6">
                <!-- Water Height Data -->
                <div class="card-deck mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body text-center">
                            <i class="fas fa-tint fa-2x mb-3"></i>
                            <h5 class="card-title">Current Water Height</h5>
                            <p class="card-text" id="currentHeight">Loading...</p>
                        </div>
                    </div>
                    <div class="card bg-primary text-white">
                        <div class="card-body text-center">
                            <i class="fas fa-tint fa-2x mb-3"></i>
                            <h5 class="card-title">Water Level Status</h5>
                            <p class="card-text" id="waterLevelStatus">Loading...</p>
                        </div>
                    </div>
                </div>

                <!-- Water Turbidity Data -->
                <div class="card-deck mb-4">
                    <div class="card bg-success text-white">
                        <div class="card-body text-center">
                            <i class="fas fa-water fa-2x mb-3"></i>
                            <h5 class="card-title">Current Water Turbidity</h5>
                            <p class="card-text" id="currentTurbidity">Loading...</p>
                        </div>
                    </div>
                    <div class="card bg-success text-white">
                        <div class="card-body text-center">
                            <i class="fas fa-water fa-2x mb-3"></i>
                            <h5 class="card-title">Water Turbidity Status</h5>
                            <p class="card-text" id="waterTurbidityStatus">Loading...</p>
                        </div>
                    </div>
                </div>

                <!-- Max, Min, and Average Data -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card bg-warning text-white text-center">
                            <div class="card-body">
                                <i class="fas fa-arrow-up fa-2x mb-3"></i>
                                <h5 class="card-title">Max Water Height</h5>
                                <p class="card-text" id="maxHeight">Loading...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card bg-danger text-white text-center">
                            <div class="card-body">
                                <i class="fas fa-arrow-down fa-2x mb-3"></i>
                                <h5 class="card-title">Min Water Height</h5>
                                <p class="card-text" id="minHeight">Loading...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card bg-success text-white text-center">
                            <div class="card-body">
                                <i class="fas fa-chart-line fa-2x mb-3"></i>
                                <h5 class="card-title">Avg Water Height</h5>
                                <p class="card-text" id="avgHeight">Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card bg-warning text-white text-center">
                            <div class="card-body">
                                <i class="fas fa-arrow-up fa-2x mb-3"></i>
                                <h5 class="card-title">Max Turbidity</h5>
                                <p class="card-text" id="maxTurbidity">Loading...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card bg-danger text-white text-center">
                            <div class="card-body">
                                <i class="fas fa-arrow-down fa-2x mb-3"></i>
                                <h5 class="card-title">Min Turbidity</h5>
                                <p class="card-text" id="minTurbidity">Loading...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card bg-success text-white text-center">
                            <div class="card-body">
                                <i class="fas fa-chart-line fa-2x mb-3"></i>
                                <h5 class="card-title">Avg Turbidity</h5>
                                <p class="card-text" id="avgTurbidity">Loading...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Column -->
            <div class="col-md-6">
                <div class="chart-container mb-4">
                    <canvas id="waterHeightChart"></canvas>
                </div>
                <div class="chart-container mb-4">
                    <canvas id="waterTurbidityChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-dark">Back to Dashboard</a>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
