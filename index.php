<?php
session_start();

// If already logged in, redirect to admin dashboard
if (isset($_SESSION['admin_id'])) {
    header("Location: admin/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senior Citizen Information Management System</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="asset/css/adminlte.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .login-box {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card-body {
            padding: 30px;
            background-color: #f8f9fa; /* Subtle background */
        }

        .form-control {
            border: 1px solid #ced4da; /* Subtle border */
        }

        .btn-bg {
            background-color: rgba(231, 67, 100, 0.8); /* Slightly darker color */
            border: none;
        }

        .card-header {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-danger">
            <div class="card-header text-center">
                <a href="index.php" class="brand-link">
                    <img src="asset/img/osca logo.png" alt="DSMS Logo" width="200">
                </a>
            </div>
            <div class="card-body">
                <form action="login_action.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required autocomplete="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Display error message if login failed -->
                    <?php
                    if (isset($_GET['error'])) {
                        echo "<div class='alert alert-danger mt-3'>" . htmlspecialchars($_GET['error']) . "</div>";
                    }
                    ?>
                    <div class="row">
                        <div class="col-6 offset-3">
                            <button type="submit" class="btn btn-block btn-bg">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>