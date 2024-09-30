<?php
// Database connection
include('../db_conn.php');

// Query to get the number of male seniors
$queryMaleSeniors = "SELECT COUNT(*) AS total FROM senior_profiles WHERE gender = 'Male'";
$resultMaleSeniors = mysqli_query($conn, $queryMaleSeniors);
$dataMaleSeniors = mysqli_fetch_assoc($resultMaleSeniors);
$totalMaleSeniors = $dataMaleSeniors['total'];

// Query to get the number of female seniors
$queryFemaleSeniors = "SELECT COUNT(*) AS total FROM senior_profiles WHERE gender = 'Female'";
$resultFemaleSeniors = mysqli_query($conn, $queryFemaleSeniors);
$dataFemaleSeniors = mysqli_fetch_assoc($resultFemaleSeniors);
$totalFemaleSeniors = $dataFemaleSeniors['total'];

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
                     <h1 class="m-0"><span class="fa fa-venus-mars"></span> Gender Reports</h1>
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
                  <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                     <div class="card">
                        <div class="card-body">
                           <div class="chart-title">
                              <h4>Report By Gender</h4>
                           </div>
                           <table class="table table-bordered mytable">
                              <thead>
                                 <tr>
                                    <td><h6>Gender</h6></td>
                                    <td><h6>Number</h6></td>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>Male</td>
                                    <td><?php echo $totalMaleSeniors; ?></td>
                                 </tr>
                                 <tr>
                                    <td>Female</td>
                                    <td><?php echo $totalFemaleSeniors; ?></td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                     <div class="card">
                        <div class="card-body">
                           <div class="chart-title">
                              <h4>Report by Gender</h4><br>
                           </div>
                           <div id="piechart" style="width: 500px; height: 500px;"></div>
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
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', { 'packages': ['corechart'] });
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
         var data = google.visualization.arrayToDataTable([
            ['Gender', 'Number'],
            ['Male', <?php echo $totalMaleSeniors; ?>],
            ['Female', <?php echo $totalFemaleSeniors; ?>],
         ]);

         var options = {
            title: 'Gender Distribution'
         };

         var chart = new google.visualization.PieChart(document.getElementById('piechart'));
         chart.draw(data, options);
      }
   </script>
   <?php include '../includes/footer.php';?>


</body>

</html>
