<?php
// Database connection
include('../db_conn.php');

// Query to get the total number of seniors per barangay
$queryBarangay = "SELECT barangay_assigned, COUNT(*) AS total_seniors FROM senior_profiles GROUP BY barangay_assigned";
$resultBarangay = mysqli_query($conn, $queryBarangay);

$barangay_data = [];
if ($resultBarangay) {
    while ($row = mysqli_fetch_assoc($resultBarangay)) {
        $barangay_data[] = [
            'name' => $row['barangay_assigned'],
            'count' => $row['total_seniors']
        ];
    }
} else {
    die("No data found for barangays.");
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
                    <h1 class="m-0"><i class="fa fa-hotel"></i> Barangay Reports</h1>
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
                <!-- Barangay Report Table -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-header text-white bg-primary">
                            <h5 class="mb-0"><i class="fa fa-list-alt"></i> Report By Barangay</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Barangay</th>
                                        <th>Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($barangay_data as $barangay): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($barangay['name']); ?></td>
                                            <td><?= htmlspecialchars($barangay['count']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Graphical Representation of Barangay Report -->
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header text-white bg-success">
                            <h5 class="mb-0"><i class="fa fa-chart-pie"></i> Graphical Representation</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="bargraph"></canvas>
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
<script src="../../asset/js/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var barangayNames = <?= json_encode(array_column($barangay_data, 'name')); ?>;
        var barangayCounts = <?= json_encode(array_column($barangay_data, 'count')); ?>;

        var ctx = document.getElementById('bargraph').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: barangayNames,
                datasets: [{
                    label: 'Total Seniors',
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    data: barangayCounts
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>

<?php include '../includes/footer.php'; ?>
</body>
</html>
