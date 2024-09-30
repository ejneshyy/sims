<?php
// Database connection
include('../db_conn.php');

// Query to get the total number of seniors per barangay
$queryBarangay = "SELECT barangay_assigned, COUNT(*) AS total_seniors FROM senior_profiles GROUP BY barangay_assigned";
$resultBarangay = mysqli_query($conn, $queryBarangay);

$barangay_names = [];
$barangay_counts = [];

if ($resultBarangay && mysqli_num_rows($resultBarangay) > 0) {
    while ($row = mysqli_fetch_assoc($resultBarangay)) {
        $barangay_names[] = $row['barangay_assigned'];
        $barangay_counts[] = $row['total_seniors'];
    }
} else {
    die("No data found for barangays.");
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
                     <h1 class="m-0"><span class="fa fa-hotel"></span> Barangay Reports</h1>
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
                              <h4>Report By Barangay </h4>
                           </div>
                           <table class="table table-bordered mytable">
                              <thead>
                                 <tr>
                                    <td><h6>Barangay</h6></td>
                                    <td><h6>Number</h6></td>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 foreach ($barangay_names as $index => $barangay_name) {
                                    echo "<tr><td>" . htmlspecialchars($barangay_name) . "</td><td>" . htmlspecialchars($barangay_counts[$index]) . "</td></tr>";
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
                              <h4>Graphical Representation of Barangay Report</h4><br>
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
         var barangayNames = <?php echo json_encode($barangay_names); ?>;
         var barangayCounts = <?php echo json_encode($barangay_counts); ?>;

         // Bar Chart
         var barChartData = {
            labels: barangayNames,
            datasets: [{
               label: 'Total Seniors',
               backgroundColor: 'rgb(79,129,189)',
               borderColor: 'rgba(0, 158, 251, 1)',
               borderWidth: 1,
               data: barangayCounts
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
