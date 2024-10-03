<?php
// Start the session
session_start();

// Include database connection
include '../db_conn.php';

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

// Include header and sidebar
include '../includes/header.php';
include '../includes/sidenav.php';

// Handle success and error messages
$status = isset($_GET['status']) ? $_GET['status'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';
$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';

?>

    <!-- Custom Styles -->
    <style>
        /* Your existing styles */
        /* ... */
        /* Centering alert messages */
        .alert {
            padding: 15px;
            margin: 0 auto;
            width: 50%;
            border: 1px solid transparent;
            border-radius: 4px;
            position: fixed;
            top: 80px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            display: none;
            border-radius: 50px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
            font-weight: bold;
        }

        .alert-error {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
  

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Alert Messages -->
            <?php if ($status == 'success'): ?>
                <div class="alert alert-success" id="success-alert">
                    <?php if ($action == 'add'): ?>
                        Admin user added successfully!
                    <?php elseif ($action == 'update'): ?>
                        Admin user updated successfully!
                    <?php elseif ($action == 'delete'): ?>
                        Admin user deleted successfully!
                    <?php endif; ?>
                </div>
            <?php elseif ($status == 'error'): ?>
                <div class="alert alert-error" id="error-alert">
                    Error: <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <!-- Content Header -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><span class="fa fa-user-shield"></span> Admin Users</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right"></ol>
                        </div>
                        <!-- "Add New" Button -->
                        <a class="btn btn-sm elevation-2" href="#" data-toggle="modal" data-target="#addModal"
                           style="margin-top: 20px;margin-left: 10px;background-color: #e4c79f;">
                            <i class="fa fa-user-plus"></i> Add New
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-info elevation-2">
                        <br>
                        <div class="col-md-12">
                            <table id="adminUsersTable" class="table table-bordered table-hover">
                                <thead class="btn-cancel">
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Contact Number</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Fetch admin users from the database
                                    $sql = "SELECT admin_id, full_name, contact_number, username FROM admin_users";
                                    $result = $conn->query($sql);

                                    if ($result && $result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row['full_name']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['contact_number']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                                            echo "<td>************</td>"; // Mask the password
                                            echo "<td class='text-center'>
                                                <a class='btn btn-sm btn-success' href='#' data-toggle='modal' data-target='#editModal'
                                                    data-id='" . htmlspecialchars($row['admin_id']) . "'
                                                    data-fullname='" . htmlspecialchars($row['full_name']) . "'
                                                    data-contact='" . htmlspecialchars($row['contact_number']) . "'
                                                    data-username='" . htmlspecialchars($row['username']) . "'>
                                                    <i class='fa fa-user-edit'></i> Update
                                                </a>
                                                <a class='btn btn-sm btn-danger' href='#' data-toggle='modal' data-target='#deleteModal'
                                                    data-id='" . htmlspecialchars($row['admin_id']) . "'>
                                                    <i class='fa fa-trash-alt'></i> Delete
                                                </a>
                                            </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>No admin users found.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Modals -->
        <!-- Add Admin User Modal -->
        <div id="addModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="add_admin_user.php" method="POST">
                            <div class="card-body">
                                <div class="card-header">
                                    <span class="fa fa-user-shield"> Admin Profile Information</span>
                                </div>
                                <!-- Form Fields -->
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" name="contact_number" class="form-control" placeholder="Contact Number">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Admin User Modal -->
        <div id="editModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="update_admin_user.php" method="POST">
                            <input type="hidden" name="admin_id" id="edit_admin_id">
                            <div class="card-body">
                                <div class="card-header">
                                    <span class="fa fa-user-edit"> Admin Profile Information</span>
                                </div>
                                <!-- Form Fields -->
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="full_name" id="edit_full_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" name="contact_number" id="edit_contact_number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" id="edit_username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Password (leave blank to keep current password)</label>
                                    <input type="password" name="password" class="form-control" placeholder="New Password">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn btn-info">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Admin User Modal -->
        <div id="deleteModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-body text-center">
                     <img src="../asset/img/sent.png" alt="" width="50" height="46">
                     <h3>Are you sure you want to delete this admin user?</h3>
                     <form action="delete_admin_user.php" method="POST">
                        <input type="hidden" name="admin_id" id="delete_admin_id">
                        <div class="m-t-20">
                           <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                           <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include '../includes/footer.php';?>

        <!-- Scripts -->
        <!-- jQuery -->
        <script src="../asset/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../asset/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../asset/js/adminlte.min.js"></script>
        <!-- DataTables & Plugins -->
        <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
        <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../asset/tables/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../asset/tables/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <!-- Custom Script -->
        <script>
            $(function () {
                $("#adminUsersTable").DataTable();

                // Show alert messages for a few seconds and then hide them
                $('.alert').show().delay(3000).fadeOut();

                // Populate Edit Modal with data
                $('#editModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var adminId = button.data('id');
                    var fullName = button.data('fullname');
                    var contactNumber = button.data('contact');
                    var username = button.data('username');

                    var modal = $(this);
                    modal.find('#edit_admin_id').val(adminId);
                    modal.find('#edit_full_name').val(fullName);
                    modal.find('#edit_contact_number').val(contactNumber);
                    modal.find('#edit_username').val(username);
                });

                // Populate Delete Modal with data
                $('#deleteModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var adminId = button.data('id');

                    var modal = $(this);
                    modal.find('#delete_admin_id').val(adminId);
                });
            });
        </script>
    </div>
</body>

</html>
