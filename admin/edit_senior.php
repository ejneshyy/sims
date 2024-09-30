<?php
// Database connection
include('db_conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
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
    $with_pension = $_POST['with_pension'];
    $monthly_pension = $_POST['monthly_pension'];
    $status = $_POST['status'];
    $emergency_contact_person = $_POST['emergency_contact_person'];
    $emergency_contact_number = $_POST['emergency_contact_number'];

    // Update query
    $query = "UPDATE senior_profiles SET
              first_name = '$first_name',
              middle_name = '$middle_name',
              last_name = '$last_name',
              gender = '$gender',
              birthday = '$birthday',
              age = $age,
              birth_place = '$birth_place',
              religion = '$religion',
              civil_status = '$civil_status',
              spouse_name = '$spouse_name',
              spouse_contact_number = '$spouse_contact_number',
              address = '$address',
              contact_number = '$contact_number',
              with_pension = '$with_pension',
              monthly_pension = '$monthly_pension',
              status = '$status',
              emergency_contact_person = '$emergency_contact_person',
              emergency_contact_number = '$emergency_contact_number'
              WHERE senior_id = '$senior_id'";

    // Execute query
    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>