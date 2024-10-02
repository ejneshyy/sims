<?php
// Include your database connection
include('../db_conn.php');

// Initialize age brackets
$age_brackets = [
    '60-70' => 0,
    '71-80' => 0,
    '81-90' => 0,
    '91-100' => 0,
    '100 up' => 0,
];

// Query to get the number of seniors in each age bracket
$query = "
    SELECT CASE
        WHEN age BETWEEN 60 AND 70 THEN '60-70'
        WHEN age BETWEEN 71 AND 80 THEN '71-80'
        WHEN age BETWEEN 81 AND 90 THEN '81-90'
        WHEN age BETWEEN 91 AND 100 THEN '91-100'
        ELSE '100 up'
    END AS age_bracket, COUNT(*) AS total
    FROM senior_profiles
    WHERE age >= 60
    GROUP BY age_bracket
";

$result = mysqli_query($conn, $query);

// Store results in $age_brackets array
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $age_brackets[$row['age_bracket']] = $row['total'];
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
                    <h1 class="m-0"><i class="fa fa-chart-bar"></i> Age Reports</h1>
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
                <!-- Age Bracket Report Table -->
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-header text-white bg-primary">
                            <h5 class="mb-0"><i class="fa fa-list-alt"></i> Report By Age Bracket</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Age Bracket</th>
                                        <th>Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($age_brackets as $bracket => $count): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($bracket); ?></td>
                                            <td><?= htmlspecialchars($count); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Graphical Representation of Age Report -->
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
        var ageBrackets = <?= json_encode(array_keys($age_brackets)); ?>;
        var ageCounts = <?= json_encode(array_values($age_brackets)); ?>;

        var ctx = document.getElementById('bargraph').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ageBrackets,
                datasets: [{
                    label: 'Total Seniors',
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    data: ageCounts
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
                        display: true,
                        position: 'top'
                    }
                }
            }
        });
    });
</script>

<?php include '../includes/footer.php'; ?>
</body>
</html>
