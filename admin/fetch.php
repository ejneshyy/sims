<?php
// Include database connection
include('../db_conn.php');

// Get the gender parameter from the POST request
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';

// Build the query
$query = "
    SELECT sp.senior_id, sp.first_name, sp.middle_name, sp.last_name, sp.age, sp.birthday, sp.gender, 
           sp.address, sp.status, bc.barangay_assigned 
    FROM senior_profiles sp
    JOIN barangay_captains bc ON sp.barangay_assigned = bc.barangay_assigned
";

// If a gender is selected, add a WHERE clause
if (!empty($gender)) {
    $query .= " WHERE sp.gender = ?";
}

// Prepare the statement
$stmt = $conn->prepare($query);

// Bind the parameter if gender is specified
if (!empty($gender)) {
    $stmt->bind_param('s', $gender);
}

// Execute the statement
$stmt->execute();
$result = $stmt->get_result();

// Check if the query returns any result
if ($result && $result->num_rows > 0) {
    // Loop through each row and output data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>SNR-" . htmlspecialchars($row['senior_id']) . "</td>";
        echo "<td><p class='info'><small class='text-danger'></small> " . htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['middle_name']) . " " . htmlspecialchars($row['last_name']) . "</p></td>";
        echo "<td>" . htmlspecialchars($row['age']) . "</td>";
        echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
        echo "<td>" . htmlspecialchars($row['barangay_assigned']) . "</td>";
        echo "<td class='text-center'><span class='badge bg-success'>" . htmlspecialchars($row['status']) . "</span></td>";
        echo "<td class='text-center'>
              <a class='btn btn-sm btn-info' href='#' data-toggle='modal' data-target='#viewModal' 
              data-id='" . htmlspecialchars($row['senior_id']) . "' data-firstname='" . htmlspecialchars($row['first_name']) . "' 
              data-middlename='" . htmlspecialchars($row['middle_name']) . "' data-lastname='" . htmlspecialchars($row['last_name']) . "' 
              data-gender='" . htmlspecialchars($row['gender']) . "' data-birthday='" . htmlspecialchars($row['birthday']) . "' 
              data-age='" . htmlspecialchars($row['age']) . "' data-barangay='" . htmlspecialchars($row['barangay_assigned']) . "' 
              data-status='" . htmlspecialchars($row['status']) . "'><i class='fa fa-eye'></i> View</a>

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

// Close the statement and connection
$stmt->close();
$conn->close();
?>
