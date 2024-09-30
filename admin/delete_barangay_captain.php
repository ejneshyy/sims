<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "senior_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get captain ID
    $captain_id = $_POST['captain_id'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM barangay_captains WHERE id = ?");
    $stmt->bind_param("i", $captain_id);

    if ($stmt->execute()) {
        header('Location: pages/manage-barangay-captain.php?status=success&action=delete');
    } else {
        $error_message = $stmt->error;
        header('Location: pages/manage-barangay-captain.php?status=error&action=delete&message=' . urlencode($error_message));
    }

    $stmt->close();
}

$conn->close();
?>
