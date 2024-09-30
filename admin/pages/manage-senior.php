<?php include '../includes/header.php';?>
<?php include '../includes/sidenav.php';?>

<style>
   /* Ensure the icons in the sidebar are white */
   .main-sidebar .nav-link .nav-icon {
       color: white !important;
   }

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

   .bg-warning { background-color: #ffc107; }
   .bg-success { background-color: #28a745; }
   .bg-info { background-color: #17a2b8; }
   .bg-danger { background-color: #dc3545; }
   .bg-primary { background-color: #007bff; }
   .bg-indigo { background-color: #6610f2; }

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

<!-- Alert Messages -->
<div class="container text-center">
    <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
        <div class="alert alert-success" id="success-alert">
            <?php if (isset($_GET['action']) && $_GET['action'] == 'update'): ?>
                Senior citizen updated successfully!
            <?php elseif (isset($_GET['action']) && $_GET['action'] == 'delete'): ?>
                Senior citizen deleted successfully!
            <?php else: ?>
                Senior citizen added successfully!
            <?php endif; ?>
        </div>
    <?php elseif (isset($_GET['status']) && $_GET['status'] == 'error'): ?>
        <div class="alert alert-error" id="error-alert">
            <?php if (isset($_GET['action']) && $_GET['action'] == 'update'): ?>
                Error updating senior citizen: <?php echo htmlspecialchars($_GET['message']); ?>
            <?php elseif (isset($_GET['action']) && $_GET['action'] == 'delete'): ?>
                Error deleting senior citizen: <?php echo htmlspecialchars($_GET['message']); ?>
            <?php else: ?>
                Error adding senior citizen: <?php echo htmlspecialchars($_GET['message']); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<div class="content-wrapper">
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0"><span class="fa fa-blind"></span> List of Senior Citizens</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right"></ol>
            </div>
         </div>
      </div>
   </div>

   <section class="content">
       <div class="container-fluid">
          <div class="card card-info elevation-2">
             <br>
             <!-- Gender Filter -->
             <div class="filter-container">
                <label for="genderFilter">Filter by Gender:</label>
                <select id="genderFilter" class="form-control" style="width: 200px; display: inline-block;">
                    <option value="">All</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
             </div>
             <div class="col-md-12">
                <table id="example1" class="table table-bordered">
                   <thead class="btn-cancel">
                      <tr>
                         <th>ID No.</th>
                         <th>Name</th>
                         <th>Age</th>
                         <th>Gender</th>
                         <th>Address</th>
                         <th>Status</th>
                         <th>Action</th>
                      </tr>
                   </thead>
                   <tbody id="seniorTableBody">
                   <?php
                   // Include database connection
                   include('../db_conn.php');

                   // Query to fetch senior citizens data along with barangay_assigned
                   $query = "
                       SELECT sp.senior_id, sp.first_name, sp.middle_name, sp.last_name, sp.age, sp.birthday, sp.gender, 
                              sp.address, sp.status, bc.barangay_assigned 
                       FROM senior_profiles sp
                       JOIN barangay_captains bc ON sp.barangay_assigned = bc.barangay_assigned
                   ";

                   // Execute the query
                   $result = mysqli_query($conn, $query);

                   // Check if the query returns any result
                   if ($result && mysqli_num_rows($result) > 0) {
                       // Loop through each row and display data
                       while ($row = mysqli_fetch_assoc($result)) {
                           echo "<tr>";
                           echo "<td>SNR-" . htmlspecialchars($row['senior_id']) . "</td>";
                           echo "<td><p class='info'><small class='text-danger'></small> " . htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['middle_name']) . " " . htmlspecialchars($row['last_name']) . "</p></td>";
                           echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                           echo "<td>" . htmlspecialchars($row['gender']) . "</td>"; // Display gender value
                           echo "<td>" . htmlspecialchars($row['barangay_assigned']) . "</td>";
                           echo "<td class='text-center'><span class='badge bg-success'>" . htmlspecialchars($row['status']) . "</span></td>";
                           echo "<td class='text-center'>
                         

                                  <a class='btn btn-sm btn-success' href='#' data-toggle='modal' data-target='#editModal' 
                                  data-id='" . htmlspecialchars($row['senior_id']) . "' data-firstname='" . htmlspecialchars($row['first_name']) . "' 
                                  data-middlename='" . htmlspecialchars($row['middle_name']) . "' data-lastname='" . htmlspecialchars($row['last_name']) . "' 
                                  data-gender='" . htmlspecialchars($row['gender']) . "' data-birthday='" . htmlspecialchars($row['birthday']) . "' 
                                  data-age='" . htmlspecialchars($row['age']) . "' data-barangay='" . htmlspecialchars($row['barangay_assigned']) . "' 
                                  data-status='" . htmlspecialchars($row['status']) . "'><i class='fa fa-user-edit'></i> Update</a>

                                  <a class='btn btn-sm btn-danger' href='#' data-toggle='modal' data-target='#deleteModal' 
                                  data-id='" . htmlspecialchars($row['senior_id']) . "'><i class='fa fa-trash-alt'></i> Delete</a>
                                  </td>";
                           echo "</tr>";
                       }
                   } else {
                       echo "<tr><td colspan='7'>No records found.</td></tr>";
                   }

                   // Close the connection
                   mysqli_close($conn);
                   ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </section>
</div>

<!-- View Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Senior Citizen Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Create a form-like structure using table or bordered divs -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label><strong>Full Name:</strong></label>
                            <p id="view_full_name" class="form-control border"></p>
                        </div>
                        <div class="col-md-6 form-group">
                            <label><strong>Gender:</strong></label>
                            <p id="view_gender" class="form-control border"></p>
                        </div>
                        <div class="col-md-6 form-group">
                            <label><strong>Birthday:</strong></label>
                            <p id="view_birthday" class="form-control border"></p>
                        </div>
                        <div class="col-md-6 form-group">
                            <label><strong>Age:</strong></label>
                            <p id="view_age" class="form-control border"></p>
                        </div>
                        <div class="col-md-12 form-group">
                            <label><strong>Address:</strong></label>
                            <p id="view_address" class="form-control border"></p>
                        </div>
                        <div class="col-md-6 form-group">
                            <label><strong>Contact Number:</strong></label>
                            <p id="view_contact_number" class="form-control border"></p>
                        </div>
                        <div class="col-md-6 form-group">
                            <label><strong>Status:</strong></label>
                            <p id="view_status" class="form-control border"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Senior Citizen Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../update_senior.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="edit_senior_id" name="senior_id">
                    
                    <!-- Your Details Section -->
                    <div class="form-section">
                        <h6 class="section-title">Your Details</h6>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="edit_first_name">First Name:</label>
                                <input type="text" class="form-control form-field" id="edit_first_name" name="first_name" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="edit_middle_name">Middle Name:</label>
                                <input type="text" class="form-control form-field" id="edit_middle_name" name="middle_name">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="edit_last_name">Last Name:</label>
                                <input type="text" class="form-control form-field" id="edit_last_name" name="last_name" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="edit_gender">Gender:</label>
                                <select class="form-control form-field" id="edit_gender" name="gender" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Address and Contact Details Section -->
                    <div class="form-section">
                        <h6 class="section-title">Contact and Address Details</h6>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="edit_birthday">Birthday:</label>
                                <input type="date" class="form-control form-field" id="edit_birthday" name="birthday" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="edit_age">Age:</label>
                                <input type="number" class="form-control form-field" id="edit_age" name="age" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="edit_address">Address:</label>
                                <textarea class="form-control form-field" id="edit_address" name="address" required></textarea>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="edit_contact_number">Contact Number:</label>
                                <input type="text" class="form-control form-field" id="edit_contact_number" name="contact_number">
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Information</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .form-section {
        margin-bottom: 20px;
        border: 1px solid #ccc;
        padding: 15px;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    .section-title {
        font-weight: bold;
        margin-bottom: 15px;
        text-transform: uppercase;
        font-size: 14px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 5px;
    }
    .form-field {
        border: 1px solid #333;
        box-shadow: none;
    }
    .modal-lg {
        max-width: 80%;
    }
</style>


<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Senior Citizen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../delete_senior.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" id="delete_senior_id" name="senior_id">
                    <p>Are you sure you want to delete this senior citizen?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../includes/footer.php';?>

<script>
   $(document).ready(function() {
    // Edit Modal: Populate the fields
    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal

        // Extract data from the button's data-* attributes
        var seniorId = button.data('id');
        var firstName = button.data('firstname');
        var middleName = button.data('middlename');
        var lastName = button.data('lastname');
        var gender = button.data('gender');
        var birthday = button.data('birthday');
        var age = button.data('age');
        var barangay = button.data('barangay'); 
        var contactNumber = button.data('contact');

        // Set the modal's input fields
        var modal = $(this);
        modal.find('#edit_senior_id').val(seniorId);
        modal.find('#edit_first_name').val(firstName);
        modal.find('#edit_middle_name').val(middleName);
        modal.find('#edit_last_name').val(lastName);
        modal.find('#edit_gender').val(gender);
        modal.find('#edit_birthday').val(birthday);
        modal.find('#edit_age').val(age);
        modal.find('#edit_address').val(barangay);
        modal.find('#edit_contact_number').val(contactNumber);
    });

    // Delete Modal: Populate the hidden input field
    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var seniorId = button.data('id');

        var modal = $(this);
        modal.find('#delete_senior_id').val(seniorId);
    });

    // Show alert messages for a few seconds and then hide them
    $('.alert').show().delay(3000).fadeOut();
});
</script>

<script>
       $(document).ready(function() {
        // Existing code for modals...

        // Show alert messages for a few seconds and then hide them
        $('.alert').show().delay(3000).fadeOut();

        // Gender Filter
        $('#genderFilter').on('change', function() {
            var selectedGender = $(this).val();
            loadSeniorData(selectedGender);
        });

        function loadSeniorData(gender) {
            $.ajax({
                url: 'fetch.php',
                type: 'POST',
                data: {gender: gender},
                success: function(data) {
                    $('#seniorTableBody').html(data);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        }
    });
    </script>
</body>
</html>
