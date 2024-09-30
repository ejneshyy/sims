<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "senior_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch barangay data
$sql = "SELECT id, barangay_name, contact_number, email, contact_person, contact_person_number FROM barangay";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Senior Citizen Information System</title>
   <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="../asset/css/adminlte.min.css">
   <link rel="stylesheet" href="../asset/css/style.css">
   <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../asset/css/adminlte.min.css">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/tables/datatables-bs4/css/dataTables.bootstrap4.min.css">
   
   
      <!-- Content Wrapper -->
      <div class="content-wrapper">
         <div class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0"><span class="fa fa-hotel"></span> Manage Barangay</h1>
                  </div>
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                     </ol>
                  </div>
               </div>
            </div>
         </div>

         <section class="content">
            <div class="container-fluid">
               <div class="card card-info elevation-2">
                  <div class="col-md-12">
                     <table id="example1" class="table table-bordered">
                        <thead class="btn-cancel">
                           <tr>
                              <th>Barangay Name</th>
                              <th>Contact</th>
                              <th>Email</th>
                              <th>Contact Person</th>
                              <th>Contact Person No.</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           // Check if there are any rows returned
                         if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['barangay_name'] . "</td>";
        echo "<td>" . $row['contact_number'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['contact_person'] . "</td>";
        echo "<td>" . $row['contact_person_number'] . "</td>";
        echo "<td class='text-center'>
                <a class='btn btn-sm btn-success edit-btn' href='#' data-id='" . $row['id'] . "' data-barangay_name='" . $row['barangay_name'] . "' data-contact_number='" . $row['contact_number'] . "' data-email='" . $row['email'] . "' data-contact_person='" . $row['contact_person'] . "' data-contact_person_number='" . $row['contact_person_number'] . "' data-toggle='modal' data-target='#edit'><i class='fa fa-edit'></i> Update</a>
                <a class='btn btn-sm btn-danger delete-btn' href='#' data-id='" . $row['id'] . "' data-toggle='modal' data-target='#delete'><i class='fa fa-trash-alt'></i> Delete</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No records found.</td></tr>";
}                           $conn->close();
                           ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>
   
 <!-- Alerts -->
<div class="container text-center">
    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
        <div class="alert alert-success" id="success-alert">
            <?php if (isset($_GET['action']) && $_GET['action'] == 'update'): ?>
                Barangay updated successfully!
            <?php elseif (isset($_GET['action']) && $_GET['action'] == 'delete'): ?>
                Barangay deleted successfully!
            <?php else: ?>
                Barangay added successfully!
            <?php endif; ?>
        </div>
    <?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
        <div class="alert alert-error" id="error-alert">
            <?php if (isset($_GET['action']) && $_GET['action'] == 'update'): ?>
                Error updating barangay: <?php echo htmlspecialchars($_GET['message']); ?>
            <?php elseif (isset($_GET['action']) && $_GET['action'] == 'delete'): ?>
                Error deleting barangay: <?php echo htmlspecialchars($_GET['message']); ?>
            <?php else: ?>
                Error adding barangay: <?php echo htmlspecialchars($_GET['message']); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
<style type="text/css">/* Centering alert messages */
.alert {
    padding: 15px;
    margin: 0 auto;
    width: 2s0%; /* Adjust the width as needed */
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
    font-weight: bolder;
}

.alert-error {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
}
</style>


   <!-- Modals -->
   <!-- Update Modal -->
   <div id="edit" class="modal animated rubberBand delete-modal" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
            <div class="modal-body text-center">
               <form id="updateForm" method="POST" action="update_barangay.php">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="card-header">
                              <span class="fa fa-hotel"> Barangay Information</span>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label>Barangay Name</label>
                                    <input type="text" class="form-control" id="barangay_name" name="barangay_name" placeholder="Barangay Name">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control" id="contact" name="contact_number" placeholder="Contact Number">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Contact Person</label>
                                    <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Contact Person">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Contact Person Number</label>
                                    <input type="text" class="form-control" id="contact_person_number" name="contact_person_number" placeholder="Contact Person Number">
                                 </div>
                              </div>
                              <input type="hidden" id="barangay_id" name="barangay_id">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card-footer">
                     <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
                     <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <!-- Delete Modal -->
   <div id="delete" class="modal animated rubberBand delete-modal" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-body text-center">
               <img src="../asset/img/sent.png" alt="" width="50" height="46">
               <h3>Are you sure you want to delete this Barangay?</h3>
               <form id="deleteForm" method="POST" action="delete_barangay.php">
                  <input type="hidden" id="delete_barangay_id" name="barangay_id">
                  <div class="m-t-20">
                     <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                     <button type="submit" class="btn btn-danger">Delete</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <!-- Scripts -->
   <script src="../asset/jquery/jquery.min.js"></script>
   <script src="../asset/js/bootstrap.bundle.min.js"></script>
   <script src="../asset/js/adminlte.js"></script>
   <script src="../asset/tables/datatables/jquery.dataTables.min.js"></script>
   <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script>
        $(function () {
            $("#example1").DataTable();

            // Show alert if it exists
            if ($('#success-alert').length > 0) {
                $('#success-alert').fadeIn().delay(5000).fadeOut();
            }
            if ($('#error-alert').length > 0) {
                $('#error-alert').fadeIn().delay(5000).fadeOut();
            }
        });
    </script>
    <script type="text/javascript">$(document).ready(function() {
    // Populate the Edit Modal with data
    $('.edit-btn').on('click', function() {
        var id = $(this).data('id');
        var barangayName = $(this).data('barangay_name');
        var contactNumber = $(this).data('contact_number');
        var email = $(this).data('email');
        var contactPerson = $(this).data('contact_person');
        var contactPersonNumber = $(this).data('contact_person_number');

        // Set values in the modal
        $('#barangay_id').val(id);
        $('#barangay_name').val(barangayName);
        $('#contact').val(contactNumber);
        $('#email').val(email);
        $('#contact_person').val(contactPerson);
        $('#contact_person_number').val(contactPersonNumber);
    });

    // Populate the Delete Modal with barangay ID
    $('.delete-btn').on('click', function() {
        var id = $(this).data('id');
        $('#delete_barangay_id').val(id);
    });
});
</script>

</html>
