<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "senior_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $captain_id = $_POST['captain_id'];
    $captain_name = $_POST['captain_name'];
    $barangay_assigned = $_POST['barangay_assigned'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE barangay_captains SET captain_name = ?, barangay_assigned = ?, contact_number = ?, email = ?, address = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $captain_name, $barangay_assigned, $contact_number, $email, $address, $captain_id);

    if ($stmt->execute()) {
        header('Location: pages/manage-barangay-captain.php?status=success&action=update');
    } else {
        $error_message = $stmt->error;
        header('Location: ../manage-barangay-captain.php?status=error&action=update&message=' . urlencode($error_message));
    }

    $stmt->close();
}

$conn->close();
?>
