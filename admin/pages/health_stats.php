<?php include '../includes/header.php'; ?>
<?php include '../includes/sidenav.php'; ?>

<?php
// Database connection
include('../db_conn.php');

// Initialize counters for each condition
$sickly_conditions = [
    'Asthma' => 0,
    'Tuberculosis' => 0,
    'Hypertension' => 0,
    'Diabetic' => 0,
    'Kidney Failure' => 0,
    'Heart Failure' => 0,
    'Others' => 0,
];

$disability_conditions = [
    'Blind' => 0,
    'Cripple (Unable to walk)' => 0,
    'Cross Eyed' => 0,
    'Deaf/Impaired Hearing' => 0,
    'Mental Disability' => 0,
    'Others' => 0,
];

// Query to fetch all senior profiles for health statistics
$queryHealth = "SELECT sickly_conditions, disability FROM senior_profiles";
$resultHealth = $conn->query($queryHealth);

// Process each row for sickly and disability conditions
if ($resultHealth && $resultHealth->num_rows > 0) {
    while ($row = $resultHealth->fetch_assoc()) {
        // Process sickly conditions
        $sickly = explode(",", $row['sickly_conditions']);
        foreach ($sickly as $condition) {
            $condition = trim($condition);
            if (isset($sickly_conditions[$condition])) {
                $sickly_conditions[$condition]++;
            }
        }

        // Process disability conditions
        $disabilities = explode(",", $row['disability']);
        foreach ($disabilities as $condition) {
            $condition = trim($condition);
            if (isset($disability_conditions[$condition])) {
                $disability_conditions[$condition]++;
            }
        }
    }
}

// Close the connection
$conn->close();
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1 class="m-0"><i class="fa fa-heartbeat"></i> Health Condition Reports</h1>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Reports</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Sickly Condition Report Table -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header text-white bg-primary">
                            <h5 class="mb-0"><i class="fa fa-list-alt"></i> Sickly Conditions Report</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Condition</th>
                                        <th>Number of Seniors</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($sickly_conditions as $condition => $count): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($condition); ?></td>
                                            <td><?= htmlspecialchars($count); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Sickly Condition Chart -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header text-white bg-success">
                            <h5 class="mb-0"><i class="fa fa-chart-pie"></i> Sickly Conditions Graph</h5>
                        </div>
                        <div class="card-body">
                            <div id="sicklyChart" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <!-- Disability Condition Report Table -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header text-white bg-primary">
                            <h5 class="mb-0"><i class="fa fa-list-alt"></i> Disability Conditions Report</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Disability</th>
                                        <th>Number of Seniors</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($disability_conditions as $disability => $count): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($disability); ?></td>
                                            <td><?= htmlspecialchars($count); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Disability Condition Chart -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header text-white bg-success">
                            <h5 class="mb-0"><i class="fa fa-chart-pie"></i> Disability Conditions Graph</h5>
                        </div>
                        <div class="card-body">
                            <div id="disabilityChart" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- JavaScript Libraries -->
<script src="../../asset/jquery/jquery.min.js"></script>
<script src="../../asset/js/adminlte.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
        // Draw Sickly Conditions Chart
        var sicklyData = google.visualization.arrayToDataTable([
            ['Condition', 'Number'],
            <?php
            foreach ($sickly_conditions as $condition => $count) {
                echo "['" . htmlspecialchars($condition) . "', " . htmlspecialchars($count) . "],";
            }
            ?>
        ]);

        var sicklyOptions = {
            title: 'Sickly Conditions Distribution',
            chartArea: { width: '80%', height: '80%' },
            pieHole: 0.4,
            colors: ['#4285F4', '#EA4335', '#FBBC05', '#34A853', '#9C27B0', '#FF9800', '#009688'],
        };

        var sicklyChart = new google.visualization.PieChart(document.getElementById('sicklyChart'));
        sicklyChart.draw(sicklyData, sicklyOptions);

        // Draw Disability Conditions Chart
        var disabilityData = google.visualization.arrayToDataTable([
            ['Disability', 'Number'],
            <?php
            foreach ($disability_conditions as $disability => $count) {
                echo "['" . htmlspecialchars($disability) . "', " . htmlspecialchars($count) . "],";
            }
            ?>
        ]);

        var disabilityOptions = {
            title: 'Disability Conditions Distribution',
            chartArea: { width: '80%', height: '80%' },
            pieHole: 0.4,
            colors: ['#8E24AA', '#FFC107', '#03A9F4', '#FF5722', '#4CAF50', '#FFEB3B'],
        };

        var disabilityChart = new google.visualization.PieChart(document.getElementById('disabilityChart'));
        disabilityChart.draw(disabilityData, disabilityOptions);
    }
</script>

<?php include '../includes/footer.php'; ?>
</body>
</html>
