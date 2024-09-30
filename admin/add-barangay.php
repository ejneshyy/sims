<?php
// add-barangay.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $barangay_name = $_POST['barangay_name'];
    $contact = $_POST['contact_number'];
    $email = $_POST['email'];
    $contact_person = $_POST['contact_person'];
    $contact_person_number = $_POST['contact_person_number'];

    // Create a database connection
    $conn = new mysqli("localhost", "root", "", "senior_db");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO barangay (barangay_name, contact_number, email, contact_person, contact_person_number) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("sssss", $barangay_name, $contact, $email, $contact_person, $contact_person_number);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect or output success message
        header("Location: manage-barangay.php?status=success&action=add");
        exit();
    } else {
        // Output error message
        header("Location: manage-barangay.php?status=error&message=" . urlencode($conn->error));
        exit();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
