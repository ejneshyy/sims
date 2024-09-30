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

<?php include '../includes/header.php';?>
<?php include '../includes/sidenav.php';?>


      <div class="content-wrapper">
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0"><span class="fa fa-sort-numeric-up-alt"></span> Age Reports</h1>
                  </div>
                  <div class="col-sm-6">
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
                  <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                     <div class="card">
                        <div class="card-body">
                           <div class="chart-title">
                              <h4>Report By Age Bracket </h4>
                           </div>
                           <table class="table table-bordered mytable">
                              <thead>
                                 <tr>
                                    <td><h6>Age Bracket</h6></td>
                                    <td><h6>Number</h6></td>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 foreach ($age_brackets as $bracket => $count) {
                                     echo "<tr><td>" . htmlspecialchars($bracket) . "</td><td>" . htmlspecialchars($count) . "</td></tr>";
                                 }
                                 ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                     <div class="card">
                        <div class="card-body">
                           <div class="chart-title">
                              <h4>Graphical Representation of Age Report</h4><br>
                           </div>
                           <canvas id="bargraph"></canvas>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
      </div>
      </section>
   </div>
   </div>
   <!-- jQuery -->
   <script src="../../asset/jquery/jquery.min.js"></script>
   <script src="../../asset/js/adminlte.js"></script>
   <script src="../../asset/js/chart.js"></script>
   <script>
      document.addEventListener("DOMContentLoaded", function () {
         // Dynamic data for chart
         var ageBrackets = <?php echo json_encode(array_keys($age_brackets)); ?>;
         var ageCounts = <?php echo json_encode(array_values($age_brackets)); ?>;

         // Bar Chart
         var barChartData = {
            labels: ageBrackets,
            datasets: [{
               label: 'Total Senior',
               backgroundColor: 'rgb(79,129,189)',
               borderColor: 'rgba(0, 158, 251, 1)',
               borderWidth: 1,
               data: ageCounts
            }]
         };

         var ctx = document.getElementById('bargraph').getContext('2d');
         window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
               responsive: true,
               legend: {
                  display: false,
               }
            }
         });

      });
   </script>
       <?php include '../includes/footer.php';?>
    
</body>

</html>
