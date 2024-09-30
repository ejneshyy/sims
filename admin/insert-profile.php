<?php
// insert-profile.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create a database connection
    $conn = new mysqli("localhost", "root", "", "senior_db");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the form data and sanitize inputs
    $senior_id = $_POST['senior_id'];
    $barangay_assigned = $_POST['barangay_assigned'];
    $first_name = $_POST['first_name'];
    $middle_name = isset($_POST['middle_name']) ? $_POST['middle_name'] : null;
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $age = $_POST['age'];
    $birth_place = isset($_POST['birth_place']) ? $_POST['birth_place'] : null;
    $religion = isset($_POST['religion']) ? $_POST['religion'] : null;
    $civil_status = isset($_POST['civil_status']) ? $_POST['civil_status'] : null;
    $spouse_name = isset($_POST['spouse_name']) ? $_POST['spouse_name'] : null;
    $spouse_contact_number = isset($_POST['spouse_contact_number']) ? $_POST['spouse_contact_number'] : null;
    $address = isset($_POST['address']) ? $_POST['address'] : null;

    // Validate the birthday before inserting
    if (empty($birthday) || $birthday == '0000-00-00') {
        die("Invalid or empty birthday");
    }

    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO senior_profiles 
        (senior_id, barangay_assigned, first_name, middle_name, last_name, gender, birthday, age, birth_place, religion, civil_status, 
        spouse_name, spouse_contact_number, address) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters (14 placeholders, 14 variables)
    $stmt->bind_param(
        "ssssssisssssss", 
        $senior_id, 
        $barangay_assigned,
        $first_name, 
        $middle_name, 
        $last_name, 
        $gender, 
        $birthday, 
        $age, 
        $birth_place, 
        $religion, 
        $civil_status, 
        $spouse_name, 
        $spouse_contact_number, 
        $address
    );

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect or output success message
        header("Location: pages/manage-senior.php?status=success&action=add");
        exit();
    } else {
        // Output error message
        header("Location: pages/manage-senior.php?status=error&message=" . urlencode($stmt->error));
        exit();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
