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

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include meta tags for responsiveness -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senior Citizens List</title>
    <!-- Include Bootstrap CSS if not already included -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Your existing styles -->
    <style>
        /* Your existing styles */
        /* Adjust as needed */
        /* Optional: Adjust form and table styles for better responsiveness */
        .form-group {
            max-width: 400px;
            margin: 0 auto;
        }
        .table-responsive {
            margin-top: 20px;
        }
        /* Adjust table font size for better fit */
        .table td, .table th {
            font-size: 14px;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <!-- Main content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- Barangay Dropdown -->
                <div class="form-group">
                    <label for="barangaySelect">Select Barangay:</label>
                    <select id="barangaySelect" class="form-control">
                        <option value="">Select Barangay</option>
                        <?php foreach ($barangays as $barangay): ?>
                            <option value="<?php echo $barangay; ?>"><?php echo $barangay; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Table to display seniors list -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="seniorsTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID No.</th>
                                <th>Full Name</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be inserted here dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <!-- Include footer if necessary -->
    <?php include '../includes/footer.php';?>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Include Bootstrap JS if not already included -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Ajax Script to fetch seniors based on barangay -->
    <script>
        $(document).ready(function(){
            $('#barangaySelect').on('change', function(){
                var barangayName = $(this).val();

                if (barangayName) {
                    $.ajax({
                        url: 'ft.php',
                        method: 'POST',
                        data: { barangay_name: barangayName },
                        success: function(response) {
                            $('#seniorsTable tbody').html(response);
                        }
                    });
                } else {
                    $('#seniorsTable tbody').html(''); // Clear table if no barangay selected
                }
            });
        });
    </script>
</body>
</html>
