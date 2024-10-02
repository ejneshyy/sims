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
    $zone = isset($_POST['zone']) ? $_POST['zone'] : null;
    $municipality = $_POST['municipality'];
    $province = $_POST['province'];
    $first_name = $_POST['first_name'];
    $middle_name = !empty($_POST['middle_name']) ? $_POST['middle_name'] : null;
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $age = $_POST['age'];
    $birth_place = !empty($_POST['birth_place']) ? $_POST['birth_place'] : null;
    $religion = !empty($_POST['religion']) ? $_POST['religion'] : null;
    $civil_status = !empty($_POST['civil_status']) ? $_POST['civil_status'] : null;
    $spouse_name = !empty($_POST['spouse_name']) ? $_POST['spouse_name'] : null;
    $spouse_contact_number = !empty($_POST['spouse_contact_number']) ? $_POST['spouse_contact_number'] : null;
    $educational_attainment = !empty($_POST['educational_attainment']) ? $_POST['educational_attainment'] : null;
    $sickly_conditions = !empty($_POST['sickly']) ? implode(", ", $_POST['sickly']) : null;
    $disabilities = !empty($_POST['disability']) ? implode(", ", $_POST['disability']) : null;
    $receives_pension = !empty($_POST['pension']) ? $_POST['pension'] : null;
    $pension_sources = !empty($_POST['pension_source']) ? implode(", ", $_POST['pension_source']) : null;

    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO senior_profiles 
        (senior_id, barangay_assigned, zone, municipality, province, first_name, middle_name, last_name, gender, birthday, age, birth_place, religion, civil_status, spouse_name, spouse_contact_number, educational_attainment, sickly_conditions, disabilities, receives_pension, pension_sources) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters (21 placeholders, 21 variables)
    $stmt->bind_param(
        "ssssssssssissssssssss",
        $senior_id,
        $barangay_assigned,
        $zone,
        $municipality,
        $province,
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
        $educational_attainment,
        $sickly_conditions,
        $disabilities,
        $receives_pension,
        $pension_sources
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
