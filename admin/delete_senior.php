<?php
// Include database connection
$conn = new mysqli("localhost", "root", "", "senior_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the senior_id is provided via POST
if (isset($_POST['senior_id'])) {
    $senior_id = $_POST['senior_id'];

    // Prepare the DELETE query
    $query = "DELETE FROM senior_profiles WHERE senior_id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind the senior_id parameter and execute the statement
    $stmt->bind_param('i', $senior_id);
    if ($stmt->execute()) {
        // Successfully deleted, redirect back to the list with a success message
        header("Location: pages/manage-senior.php?status=success&action=delete");
    } else {
        // Error occurred, redirect back with an error message
        header("Location: pages/manage-senior.php?status=error&action=delete&message=" . urlencode($stmt->error));
    }

    // Close the statement
    $stmt->close();
} else {
    // Redirect back if no senior_id was provided
    header("Location: pages/manage-senior.php?status=error&action=delete&message=No ID provided");
}

// Close the database connection
$conn->close();
?>
