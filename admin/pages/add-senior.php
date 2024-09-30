<?php
// Include your database connection
$conn = new mysqli("localhost", "root", "", "senior_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all the Barangay Captains' assigned barangays from the database
$barangayQuery = "SELECT DISTINCT barangay_assigned FROM barangay_captains";
$result = $conn->query($barangayQuery);

$barangays = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $barangays[] = $row['barangay_assigned'];
    }
} else {
    die("No Barangay Captains found.");
}

?>
    <?php include '../includes/header.php';?>
    <?php include '../includes/sidenav.php';?>


        <!-- Content Wrapper -->
        <div class="content-wrapper">
           <div class="content-header">
              <div class="container-fluid">
                 <div class="row mb-2">
                    <div class="col-sm-6 animated bounceInRight">
                       <h1 class="m-0"><span class="fa fa-user-plus"></span> Application Form</h1>
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
        <div class="card card-info">
            <div class="card card-outline card-info">
                <form action="../insert-profile.php" method="post" onsubmit="return validateForm()">
                    <div class="card-body">
                        
                        <!-- Personal Details Section -->
                        <div class="form-section">
                            <h6 class="section-title">Personal Details</h6>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="seniorId">Senior ID</label>
                                        <input type="text" id="seniorId" name="senior_id" class="form-control form-field" placeholder="SNR-123" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" id="firstName" name="first_name" class="form-control form-field" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="middleName">Middle Name</label>
                                        <input type="text" id="middleName" name="middle_name" class="form-control form-field" placeholder="Middle Name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" id="lastName" name="last_name" class="form-control form-field" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select id="gender" name="gender" class="form-control form-field" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="birthday">Birthday</label>
                                        <input type="date" id="birthday" name="birthday" class="form-control form-field" onchange="calculateAge()" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input type="number" id="age" name="age" class="form-control form-field" placeholder="Age" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="birthPlace">Birth Place</label>
                                        <input type="text" id="birthPlace" name="birth_place" class="form-control form-field" placeholder="Birth Place">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Additional Details Section -->
                        <div class="form-section">
                            <h6 class="section-title">Additional Details</h6>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="religion">Religion</label>
                                        <input type="text" id="religion" name="religion" class="form-control form-field" placeholder="Religion">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="civilStatus">Civil Status</label>
                                        <select id="civilStatus" name="civil_status" class="form-control form-field">
                                            <option value="">Select Civil Status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                            <option value="Divorced">Divorced</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="spouseName">Spouse Name</label>
                                        <input type="text" id="spouseName" name="spouse_name" class="form-control form-field" placeholder="Spouse Name">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="spouseContact">Spouse Contact Number</label>
                                        <input type="text" id="spouseContact" name="spouse_contact_number" class="form-control form-field" placeholder="Spouse Contact Number">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Barangay and Address Section -->
                        <div class="form-section">
                            <h6 class="section-title">Barangay and Address</h6>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="barangay">Barangay</label>
                                        <select id="barangay" name="barangay_assigned" class="form-control form-field" required>
                                            <option value="">Select Barangay</option>
                                            <?php foreach ($barangays as $barangay): ?>
                                                <option value="<?php echo htmlspecialchars($barangay); ?>">
                                                    <?php echo htmlspecialchars($barangay); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea id="address" name="address" class="form-control form-field" placeholder="Address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

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
    .card-footer {
        text-align: center;
    }
</style>

    <script>
        function calculateAge() {
           var birthdayInput = document.getElementById('birthday');
           var ageInput = document.getElementById('age');

           if (!birthdayInput.value) {
              return; // Do nothing if no date is provided
           }

           var birthday = new Date(birthdayInput.value);
           var today = new Date();
           var age = today.getFullYear() - birthday.getFullYear();
           var monthDifference = today.getMonth() - birthday.getMonth();

           if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthday.getDate())) {
              age--;
           }

           ageInput.value = age;

           // Alert if age is below 60
           if (age < 60) {
              alert("Not Qualified to be a member!");
           }
        }

        function validateForm() {
           var ageInput = document.getElementById('age');
           var age = parseInt(ageInput.value, 10);

           if (isNaN(age) || age < 60) {
              alert("Not Qualified to be a member!");
              return false; // Prevent form submission
           }

           // Proceed with form submission
           return true;
        }
    </script>

<?php include '../includes/footer.php';?>
   

</body>

</html>
<?php
// Close the database connection
$conn->close();
?>
