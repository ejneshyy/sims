<?php
// Database connection
include('../db_conn.php');

// Query to get the number of male and female seniors
$queryGenderSeniors = "
    SELECT gender, COUNT(*) AS total 
    FROM senior_profiles 
    WHERE gender IN ('Male', 'Female') 
    GROUP BY gender
";
$resultGenderSeniors = mysqli_query($conn, $queryGenderSeniors);

// Initialize gender counts
$totalMaleSeniors = 0;
$totalFemaleSeniors = 0;

if ($resultGenderSeniors) {
    while ($row = mysqli_fetch_assoc($resultGenderSeniors)) {
        if ($row['gender'] === 'Male') {
            $totalMaleSeniors = $row['total'];
        } elseif ($row['gender'] === 'Female') {
            $totalFemaleSeniors = $row['total'];
        }
    }
}

// Close the connection
mysqli_close($conn);
?>

<?php include '../includes/header.php'; ?>
<?php include '../includes/sidenav.php'; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                    <h1 class="m-0"><i class="fa fa-venus-mars"></i> Gender Reports</h1>
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
                <!-- Gender Report Table -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header text-white bg-primary">
                            <h5 class="mb-0"><i class="fa fa-list-alt"></i> Report By Gender</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Gender</th>
                                        <th>Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Male</td>
                                        <td><?= htmlspecialchars($totalMaleSeniors); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Female</td>
                                        <td><?= htmlspecialchars($totalFemaleSeniors); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Graphical Representation of Gender Report -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header text-white bg-success">
                            <h5 class="mb-0"><i class="fa fa-chart-pie"></i> Graphical Representation</h5>
                        </div>
                        <div class="card-body">
                            <div id="piechart" style="width: 100%; height: 400px;"></div>
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
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Gender', 'Number'],
            ['Male', <?= $totalMaleSeniors; ?>],
            ['Female', <?= $totalFemaleSeniors; ?>],
        ]);

        var options = {
            title: 'Gender Distribution',
            chartArea: { width: '80%', height: '80%' },
            pieHole: 0.4,
            colors: ['#4285F4', '#EA4335'],
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>

<?php include '../includes/footer.php'; ?>
</body>
</html>
