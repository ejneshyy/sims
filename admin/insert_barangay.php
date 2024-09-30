<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include your database connection
    $conn = new mysqli("localhost", "root", "", "senior_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve and sanitize form data
    $captain_name = $_POST['captain_name'];
    $barangay_assigned = $_POST['barangay_assigned'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO barangay_captains (captain_name, barangay_assigned, contact_number, email, address) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $captain_name, $barangay_assigned, $contact_number, $email, $address);

    if ($stmt->execute()) {
        header("Location: pages/manage-barangay-captain.php?status=success");
    } else {
        $error_message = $stmt->error;
        header("Location: pages/add-barangay-captain.php?status=error&message=" . urlencode($error_message));
    }

    $stmt->close();
    $conn->close();
}
?>
