<!-- sidenav.php -->

<?php
// Get the current page filename
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="../../asset/img/osca-w.png" alt="DSMS Logo" width="200">
    </a>
    <br>
    <!-- Sidebar Menu -->
    <div class="sidebar">
        <nav class="mt-2">
            <!-- Sidebar Menu Items -->
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="../index.php" class="nav-link <?= ($current_page == 'index.php') ? 'active' : '' ?>">
                        <i class="nav-icon fa-solid fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- Barangay -->
                <li class="nav-item <?= in_array($current_page, ['add-barangay-captain.php', 'view-barangays.php', 'manage-barangay-captain.php']) ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= in_array($current_page, ['add-barangay-captain.php', 'view-barangays.php', 'manage-barangay-captain.php']) ? 'active' : '' ?>">
                        <i class="nav-icon fa-solid fa-hotel"></i>
                        <p>Barangay</p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add-barangay-captain.php" class="nav-link <?= ($current_page == 'add-barangay-captain.php') ? 'active' : '' ?>">
                                <i class="nav-icon fa-solid fa-plus-square"></i>
                                <p>Add Barangay</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view-barangays.php" class="nav-link <?= ($current_page == 'view-barangays.php') ? 'active' : '' ?>">
                                <i class="nav-icon fa-solid fa-eye"></i>
                                <p>View</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="manage-barangay-captain.php" class="nav-link <?= ($current_page == 'manage-barangay-captain.php') ? 'active' : '' ?>">
                                <i class="nav-icon fa-solid fa-list"></i>
                                <p>Manage</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Senior Citizen -->
                <li class="nav-item <?= in_array($current_page, ['add-senior.php', 'manage-senior.php']) ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= in_array($current_page, ['add-senior.php', 'manage-senior.php']) ? 'active' : '' ?>">
                        <i class="nav-icon fa-solid fa-blind"></i>
                        <p>Senior Citizen</p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="add-senior.php" class="nav-link <?= ($current_page == 'add-senior.php') ? 'active' : '' ?>">
                                <i class="nav-icon fa-solid fa-user-plus"></i>
                                <p>Application Form</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="manage-senior.php" class="nav-link <?= ($current_page == 'manage-senior.php') ? 'active' : '' ?>">
                                <i class="nav-icon fa-solid fa-user-edit"></i>
                                <p>Manage</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Users -->
                <li class="nav-item <?= in_array($current_page, ['barangay.html', 'admin.html']) ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= in_array($current_page, ['barangay.html', 'admin.html']) ? 'active' : '' ?>">
                        <i class="nav-icon fa-solid fa-user-tie"></i>
                        <p>Users</p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="admin_users.php" class="nav-link <?= ($current_page == 'admin_users.php') ? 'active' : '' ?>">
                                <i class="nav-icon fa-solid fa-user-shield"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Reports -->
                <li class="nav-item <?= in_array($current_page, ['age-report.php', 'gender-report.php', 'barangay-report.php']) ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= in_array($current_page, ['age-report.php', 'gender-report.php', 'barangay-report.php']) ? 'active' : '' ?>">
                        <i class="nav-icon fa-solid fa-chart-pie"></i>
                        <p>Reports</p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="age-report.php" class="nav-link <?= ($current_page == 'age-report.php') ? 'active' : '' ?>">
                                <i class="nav-icon fa-solid fa-sort-numeric-up-alt"></i>
                                <p>Age Bracket</p>
                            </a>
                        </li>
                        <li class="nav-item">
                                    <a href="health_stats.php" class="nav-link">
                                    <i class=" nav-icon fa-solid fa-heart-pulse"></i>
                                        <p>Health Statistics</p>
                                    </a>
                                </li>
                        <li class="nav-item">
                            <a href="gender-report.php" class="nav-link <?= ($current_page == 'gender-report.php') ? 'active' : '' ?>">
                                <i class="nav-icon fa-solid fa-venus-mars"></i>
                                <p>Gender</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="barangay-report.php" class="nav-link <?= ($current_page == 'barangay-report.php') ? 'active' : '' ?>">
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
