<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data from the POST request
    $senior_id = $_POST['senior_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $age = $_POST['age'];
    $birth_place = $_POST['birth_place'];
    $religion = $_POST['religion'];
    $civil_status = $_POST['civil_status'];
    $spouse_name = $_POST['spouse_name'];
    $spouse_contact_number = $_POST['spouse_contact_number'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $status = $_POST['status'];

    // Create a database connection
    $conn = new mysqli("localhost", "root", "", "senior_db");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL update statement without the fields you don't need
    $sql = "UPDATE senior_profiles 
            SET first_name = ?, middle_name = ?, last_name = ?, gender = ?, birthday = ?, age = ?, 
                birth_place = ?, religion = ?, civil_status = ?, spouse_name = ?, spouse_contact_number = ?, 
                address = ?, contact_number = ?, status = ?
            WHERE senior_id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters to the statement
    $stmt->bind_param(
        "sssssisissssssi", 
        $first_name, $middle_name, $last_name, $gender, $birthday, $age, $birth_place, $religion, 
        $civil_status, $spouse_name, $spouse_contact_number, $address, $contact_number, $status, $senior_id
    );

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the manage seniors page with success status
        header("Location: pages/manage-senior.php?status=success&action=update");
        exit();
    } else {
        // Redirect to the manage seniors page with error status
        header("Location: pages/manage-senior.php?status=error&message=" . urlencode($conn->error));
        exit();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
