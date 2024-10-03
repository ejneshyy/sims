<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Senior Citizen Information System</title>
   <!-- Font Awesome -->
   <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="../asset/css/adminlte.min.css">
   <link rel="stylesheet" href="../asset/css/style.css">
   <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

   <style>
      /* Ensure the icons in the sidebar are white */
      .main-sidebar .nav-link .nav-icon {
          color: white !important;
      }

      /* Ensure the icons remain white when active or hovered */
      .main-sidebar .nav-link.active .nav-icon,
      .main-sidebar .nav-link:hover .nav-icon {
          color: white !important;
      }

      /* Style the info-boxes */
      .info-box {
          border-radius: 8px;
          background: #fff;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
          margin-bottom: 20px;
          display: flex;
          align-items: center;
          padding: 15px;
      }

      .info-box-icon {
          border-radius: 50%;
          color: #fff;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 24px;
          height: 60px;
          width: 60px;
      }

      .info-box-content {
          margin-left: 15px;
          flex: 1;
      }

      .info-box-text {
          margin: 0;
          font-size: 16px;
          color: #333;
      }

      .info-box-number {
          margin: 0;
          font-size: 24px;
          font-weight: bold;
          color: #333;
      }

      /* Responsive adjustments */
      @media (max-width: 767.98px) {
          .info-box {
              flex-direction: column;
              align-items: flex-start;
          }

          .info-box-icon {
              margin-bottom: 10px;
          }

          .info-box-content {
              margin-left: 0;
          }
      }

      /* Background colors for the icons */
      .bg-warning { background-color: #ffc107; }
      .bg-success { background-color: #28a745; }
      .bg-info { background-color: #17a2b8; }
      .bg-danger { background-color: #dc3545; }
      .bg-primary { background-color: #007bff; }
      .bg-indigo { background-color: #6610f2; }
   </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light" style="background-color:white;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- User Image -->
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button">
                        <img src="../asset/img/avatar.png" class="img-circle" alt="User Image" width="30">
                    </a>
                </li>
                <!-- Fullscreen -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <!-- Logout -->
             <!-- admin/includes/header.php -->
<li class="nav-item">
    <a class="nav-link" href="../logout.php">
        <i class="fas fa-sign-out-alt"></i>
    </a>
</li>

            </ul>
        </nav>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="../asset/img/osca-w.png" alt="DSMS Logo" width="200">
            </a>
            <br>
            <!-- Sidebar Menu -->
            <div class="sidebar">
                <nav class="mt-2">
                    <!-- Sidebar Menu Items -->
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                       data-accordion="false">
                        <!-- Dashboard -->
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fa-solid fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <!-- Barangay -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-hotel"></i>
                                <p>Barangay</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/add-barangay-captain.php" class="nav-link">
                                        <i class="nav-icon fa-solid fa-plus-square"></i>
                                        <p>Add Barangay</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/view-barangays.php" class="nav-link">
                                    <i class="nav-icon fa-solid fa-eye"></i>

                                        <p>View</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/manage-barangay-captain.php" class="nav-link">
                                        <i class="nav-icon fa-solid fa-list"></i>
                                        <p>Manage</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Senior Citizen -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-blind"></i>
                                <p>Senior Citizen</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/add-senior.php" class="nav-link">
                                        <i class="nav-icon fa-solid fa-user-plus"></i>
                                        <p>Application Form</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/manage-senior.php" class="nav-link">
                                        <i class="nav-icon fa-solid fa-user-edit"></i>
                                        <p>Manage</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Users -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-user-tie"></i>
                                <p>Users</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                  
                                <li class="nav-item">
                                <a href="pages/admin_users.php" class="nav-link <?= ($current_page == 'admin_users.php') ? 'active' : '' ?>">
                                        <i class="nav-icon fa-solid fa-user-shield"></i>
                                        <p>Admin</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Reports -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa-solid fa-chart-pie"></i>
                                <p>Reports</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/age-report.php" class="nav-link">
                                        <i class="nav-icon fa-solid fa-sort-numeric-up-alt"></i>
                                        <p>Age Bracket</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/gender-report.php" class="nav-link">
                                        <i class="nav-icon fa-solid fa-venus-mars"></i>
                                        <p>Gender</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/health_stats.php" class="nav-link">
                                    <i class=" nav-icon fa-solid fa-heart-pulse"></i>
                                        <p>Health Statistics</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/barangay-report.php" class="nav-link">
                                        <i class="nav-icon fa-solid fa-hotel"></i>
                                        <p>Barangay</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Add other navigation items here -->
                    </ul>
                </nav>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
           <!-- Content Header -->
           <div class="content-header">
              <div class="container-fluid">
                 <div class="row mb-2">
                    <div class="col-sm-6">
                       <h1 class="m-0"><span class="fa fa-tachometer-alt"></span> Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                       <ol class="breadcrumb float-sm-right">
                       </ol>
                    </div>
                 </div>
              </div>
           </div>

           <!-- Main content -->
           <section class="content">
               <div class="container-fluid">
                   <!-- PHP code to fetch data from database -->
                   <?php
                   // Include database connection
                   $conn = new mysqli("localhost", "root", "", "senior_db");

                   if ($conn->connect_error) {
                       die("Connection failed: " . $conn->connect_error);
                   }

                   // Query to get the total number of barangays
                   $queryBarangays = "SELECT COUNT(*) AS total FROM barangay_captains";
                   $resultBarangays = mysqli_query($conn, $queryBarangays);
                   $dataBarangays = mysqli_fetch_assoc($resultBarangays);
                   $totalBarangays = $dataBarangays['total'];

                   // Query to get the total number of senior citizens
                   $querySeniors = "SELECT COUNT(*) AS total FROM senior_profiles";
                   $resultSeniors = mysqli_query($conn, $querySeniors);
                   $dataSeniors = mysqli_fetch_assoc($resultSeniors);
                   $totalSeniors = $dataSeniors['total'];

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

                   // Close the database connection
                   $conn->close();
                   ?>
                   <!-- Info Boxes -->
                   <div class="row">
                       <!-- Barangay Info Bo -->
                       <div class="col-12 col-sm-6 col-md-4">
                            <a href="pages/view-barangays.php"> <div class="info-box">
                               <span class="info-box-icon bg-warning"><i class="fas fa-house-user"></i></span>
                               <div class="info-box-content">
                                   <h5 class="info-box-text">Barangays</h5>
                                   <h2 class="info-box-number"><?php echo $totalBarangays; ?></h2>
                               </div>
                           </div>
                       </div>
                       <!-- Senior Citizens Info Box -->
                       <div class="col-12 col-sm-6 col-md-4">
                         <a href="pages/manage-senior.php"><div class="info-box">
                               <span class="info-box-icon bg-success"><i class="fas fa-blind"></i></span>
                               <div class="info-box-content">
                                   <h5 class="info-box-text">Senior Citizens</h5>
                                   <h2 class="info-box-number"><?php echo $totalSeniors; ?></h2>
                               </div>
                           </div>
                       </div>
                       <!-- Male Seniors Info Box -->
                       <div class="col-12 col-sm-6 col-md-4">
                       <a href="pages/manage-senior.php"><div class="info-box">
                               <span class="info-box-icon bg-primary"><i class="fas fa-male"></i></span>
                               <div class="info-box-content">
                                   <h5 class="info-box-text">Male Seniors</h5>
                                   <h2 class="info-box-number"><?php echo $totalMaleSeniors; ?></h2>
                               </div>
                           </div>
                       </div>
                       <!-- Female Seniors Info Box -->
                       <div class="col-12 col-sm-6 col-md-4">
                       <a href="manage-senior.html"><div class="info-box">
                               <span class="info-box-icon bg-indigo"><i class="fas fa-female"></i></span>
                               <div class="info-box-content">
                                   <h5 class="info-box-text">Female Seniors</h5>
                                   <h2 class="info-box-number"><?php echo $totalFemaleSeniors; ?></h2>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
           <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="../asset/jquery/jquery.min.js"></script>
    <script src="../asset/js/adminlte.js"></script>
</body>

</html>
