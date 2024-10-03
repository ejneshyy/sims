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
                    <div class="card-body" style="font-family: Arial, sans-serif; line-height: 1.5;">
                        
                        <!-- Personal Details Section -->
                        <div class="form-section mb-4 p-4" style="border: 1px solid #ced4da; border-radius: 8px;">
                            <h6 class="section-title mb-3" style="font-size: 1.2rem; font-weight: bold; color: #495057;">Personal Details</h6>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="seniorId"><strong>OSCA ID</strong></label>
                                        <input type="text" id="seniorId" name="senior_id" class="form-control form-field" placeholder="SNR-123" required>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="firstName"><strong>First Name</strong></label>
                                        <input type="text" id="firstName" name="first_name" class="form-control form-field" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="middleName"><strong>Middle Name</strong></label>
                                        <input type="text" id="middleName" name="middle_name" class="form-control form-field" placeholder="Middle Name">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="lastName"><strong>Last Name</strong></label>
                                        <input type="text" id="lastName" name="last_name" class="form-control form-field" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                    <div class="form-group">
                        <label for="suffix"><strong>Suffix</strong></label>
                        <select id="suffix" name="suffix" class="form-control form-field">
                            <option value="">Select Suffix</option>
                            <option value="Jr.">Jr.</option>
                            <option value="Sr.">Sr.</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                        </select>
                    </div>
                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="gender"><strong>Gender</strong></label>
                                        <select id="gender" name="gender" class="form-control form-field" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="birthday"><strong>Birthday</strong></label>
                                        <input type="date" id="birthday" name="birthday" class="form-control form-field" onchange="calculateAge()" required>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="age"><strong>Age</strong></label>
                                        <input type="number" id="age" name="age" class="form-control form-field" placeholder="Age" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="form-group">
                                        <label for="birthPlace"><strong>Birth Place</strong></label>
                                        <input type="text" id="birthPlace" name="birth_place" class="form-control form-field" placeholder="Birth Place">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="education"><strong>Educational Attainment:</strong></label>
                                    <select id="education" name="educational_attainment" class="form-control form-field" style="border-radius: 8px;">
                                        <option value="">Select Educational Attainment</option>
                                        <option value="Elementary">Elementary</option>
                                        <option value="High School">High School</option>
                                        <option value="Vocational">Vocational</option>
                                        <option value="College">College</option>
                                        <option value="Postgraduate">Postgraduate</option>
                                    </select>
                                </div>
                            </div>
                         </div>
                     </div>

                    <!-- Additional Details Section -->
                <div class="form-section mb-4 p-4" style="border: 1px solid #ced4da; border-radius: 8px;">
                    <h6 class="section-title mb-3" style="font-size: 1.2rem; font-weight: bold; color: #495057;">Additional Details</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="religion"><strong>Religion</strong></label>
                                <input type="text" id="religion" name="religion" class="form-control form-field" placeholder="Religion">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <label for="civilStatus"><strong>Civil Status</strong></label>
                                <select id="civilStatus" name="civil_status" class="form-control form-field" onchange="toggleSpouseInfo()">
                                    <option value="">Select Civil Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Divorced">Divorced</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Spouse Information Section (Visible only if Married is selected) -->
                    <div id="spouseInfo" style="display: none;">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="spouseFirstName"><strong>Spouse First Name</strong></label>
                                    <input type="text" id="spouseFirstName" name="spouse_first_name" class="form-control form-field" placeholder="Spouse First Name">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="spouseMiddleName"><strong>Spouse Middle Name</strong></label>
                                    <input type="text" id="spouseMiddleName" name="spouse_middle_name" class="form-control form-field" placeholder="Spouse Middle Name">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="spouseLastName"><strong>Spouse Last Name</strong></label>
                                    <input type="text" id="spouseLastName" name="spouse_last_name" class="form-control form-field" placeholder="Spouse Last Name">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="spouseSuffix"><strong>Spouse Suffix</strong></label>
                                    <select id="spouseSuffix" name="spouse_suffix" class="form-control form-field">
                                        <option value="">Select Suffix</option>
                                        <option value="Jr.">Jr.</option>
                                        <option value="Sr.">Sr.</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="form-group">
                                    <label for="spouseContact"><strong>Spouse Contact Number</strong></label>
                                    <input type="text" id="spouseContact" name="spouse_contact_number" class="form-control form-field" placeholder="Spouse Contact Number">
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>

         
<!-- Barangay and Address Section -->
<div class="form-section mb-4 p-4" style="border: 1px solid #ced4da; border-radius: 8px;">
    <h6 class="section-title mb-3" style="font-size: 1.2rem; font-weight: bold; color: #495057;">Barangay and Address</h6>
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label for="zone"><strong>Zone</strong></label>
                <input type="text" id="zone" name="zone" class="form-control form-field" placeholder="Zone">
            </div>
        </div>

        <!-- Barangay Dropdown -->
        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label for="barangay"><strong>Barangay</strong></label>
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

        <!-- Municipality Dropdown -->
        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label for="municipality"><strong>Municipality</strong></label>
                <select id="municipality" name="municipality" class="form-control form-field" required>
                    <option value="">Select Municipality</option>
                    <option value="Baggao">Baggao</option>
                </select>
            </div>
        </div>

        <!-- Province Dropdown -->
        <div class="col-md-3 mb-3">
            <div class="form-group">
                <label for="province"><strong>Province</strong></label>
                <select id="province" name="province" class="form-control form-field" required>
                    <option value="">Select Province</option>
                    <option value="Cagayan">Cagayan</option>
                </select>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to handle automatic selection -->
<script>
    document.getElementById('barangay').addEventListener('change', function() {
        const selectedBarangay = this.value;

        // Assuming Baggao is the municipality for the selected barangays
        if (selectedBarangay) {
            document.getElementById('municipality').value = 'Baggao';
            document.getElementById('province').value = 'Cagayan';
        } else {
            // Reset municipality and province if no barangay is selected
            document.getElementById('municipality').value = '';
            document.getElementById('province').value = '';
        }
    });
</script>

                        
                            <!-- Health Condition Section -->
                            <div class="form-section mb-4 p-4" style="border: 1px solid #ced4da; border-radius: 8px;">
                                <h6 class="section-title mb-3" style="font-size: 1.2rem; font-weight: bold; color: #495057;">Health Condition</h6>
                                <div class="row">
                                    <!-- Sickly Section -->
                                    <div class="col-md-12 mb-3">
                                        <label><strong>A. Sickly (Check all that apply):</strong></label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="asthma" name="sickly[]" value="Asthma">
                                            <label class="form-check-label" for="asthma">Asthma</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="tuberculosis" name="sickly[]" value="Tuberculosis">
                                            <label class="form-check-label" for="tuberculosis">Tuberculosis</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="hypertension" name="sickly[]" value="Hypertension">
                                            <label class="form-check-label" for="hypertension">Hypertension</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="diabetic" name="sickly[]" value="Diabetic">
                                            <label class="form-check-label" for="diabetic">Diabetic</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="kidneyFailure" name="sickly[]" value="Kidney Failure">
                                            <label class="form-check-label" for="kidneyFailure">Kidney Failure</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="heartFailure" name="sickly[]" value="Heart Failure">
                                            <label class="form-check-label" for="heartFailure">Heart Failure</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="otherSickly" name="sickly[]" value="Others" onclick="toggleInputField('otherSickly', 'sicklyOtherInput')">
                                            <label class="form-check-label" for="otherSickly">Others</label>
                                        </div>
                                        <div class="mt-2" id="sicklyOtherInput" style="display: none;">
                                            <input type="text" class="form-control" name="sickly_other" placeholder="Please specify other health conditions">
                                        </div>
                                    </div>

                                    <!-- Differently Able Section -->
                                    <div class="col-md-12 mb-3">
                                        <label><strong>B. Differently Able (State Disability, Check all that apply):</strong></label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="blind" name="disability[]" value="Blind">
                                            <label class="form-check-label" for="blind">Blind</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="cripple" name="disability[]" value="Cripple (Unable to walk)">
                                            <label class="form-check-label" for="cripple">Cripple (Unable to walk)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="crossEyed" name="disability[]" value="Cross Eyed">
                                            <label class="form-check-label" for="crossEyed">Cross Eyed</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="deaf" name="disability[]" value="Deaf/Impaired Hearing">
                                            <label class="form-check-label" for="deaf">Deaf/Impaired Hearing</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="mentalDisability" name="disability[]" value="Mental Disability">
                                            <label class="form-check-label" for="mentalDisability">Mental Disability</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="otherDisability" name="disability[]" value="Others" onclick="toggleInputField('otherDisability', 'disabilityOtherInput')">
                                            <label class="form-check-label" for="otherDisability">Others</label>
                                        </div>
                                        <div class="mt-2" id="disabilityOtherInput" style="display: none;">
                                            <input type="text" class="form-control" name="disability_other" placeholder="Please specify other disabilities">
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <!-- Economic Status Section -->
                            <div class="form-section mb-4 p-4" style="border: 1px solid #ced4da; border-radius: 8px;">
                                <h6 class="section-title mb-3" style="font-size: 1.2rem; font-weight: bold; color: #495057;">Economic Status</h6>
                                <div class="row">
                                    <!-- Pension Question -->
                                    <div class="col-md-6 mb-3">
                                        <label><strong>Are you receiving some form of pension?</strong></label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pension" id="pensionYes" value="Yes" onclick="togglePensionSource(true)">
                                            <label class="form-check-label" for="pensionYes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="pension" id="pensionNo" value="No" onclick="togglePensionSource(false)">
                                            <label class="form-check-label" for="pensionNo">No</label>
                                        </div>
                                    </div>
                                    
                                    <!-- Pension Source Selection (visible if Yes) -->
                                    <div class="col-md-6 mb-3" id="pensionSourceSection" style="display: none;">
                                        <label for="pensionSource"><strong>If yes, from what source?</strong></label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="gsis" name="pension_source[]" value="GSIS">
                                            <label class="form-check-label" for="gsis">GSIS</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="sss" name="pension_source[]" value="SSS">
                                            <label class="form-check-label" for="sss">SSS</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="veterans" name="pension_source[]" value="Veterans">
                                            <label class="form-check-label" for="veterans">Veterans</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="otherPension" name="pension_source[]" value="Others">
                                            <label class="form-check-label" for="otherPension">Others</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

<!-- JavaScript to toggle the pension source section -->
<script>
    function togglePensionSource(show) {
        document.getElementById('pensionSourceSection').style.display = show ? 'block' : 'none';
    }
</script>


                   
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
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
    <!-- JavaScript to toggle input fields when "Others" is selected -->
            <script>
                function toggleInputField(checkboxId, inputFieldId) {
                    var checkbox = document.getElementById(checkboxId);
                    var inputField = document.getElementById(inputFieldId);
                    if (checkbox.checked) {
                        inputField.style.display = 'block';
                    } else {
                        inputField.style.display = 'none';
                        inputField.querySelector('input').value = ''; // Clear the input if hidden
                    }
                }
            </script>
               <!-- JavaScript to toggle Spouse Information Section -->
               <script>
                function toggleSpouseInfo() {
                    const civilStatus = document.getElementById('civilStatus').value;
                    const spouseInfo = document.getElementById('spouseInfo');
                    spouseInfo.style.display = civilStatus === 'Married' ? 'block' : 'none';
                }
            </script>

    <script>
        
    </script>

<?php include '../includes/footer.php';?>
   

</body>

</html>
<?php
// Close the database connection
$conn->close();
?>
