<?php
// Include your database connection
$conn = new mysqli("localhost", "root", "", "senior_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['barangay_name'])) {
    $barangay_name = $_POST['barangay_name'];

    // Fetch seniors based on the selected barangay name using barangay_assigned column in senior_profiles
    $query = "
        SELECT senior_profiles.* 
        FROM senior_profiles
        WHERE senior_profiles.barangay_assigned = ?
    ";
    
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param('s', $barangay_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>SNR-" . $row['senior_id'] . "</td>";
            echo "<td>" . $row['first_name'] . " " . $row['last_name'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No seniors found in this barangay.</td></tr>";
    }

    $stmt->close();
}

$conn->close();
?>
