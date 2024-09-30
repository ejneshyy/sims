<!-- header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./../asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="../../asset/css/adminlte.min.css">
   <link rel="stylesheet" href="../../asset/css/style.css">
   <link rel="stylesheet" href="../../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light" style="background-color:white;">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button">
                        <img src="../../asset/img/avatar.png" class="img-circle" alt="User Image" width="30">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
<!-- admin/includes/header.php -->
<li class="nav-item">
    <a class="nav-link" href="../../logout.php">
        <i class="fas fa-sign-out-alt"></i>
    </a>
</li>

            </ul>
        </nav>
    </div>


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