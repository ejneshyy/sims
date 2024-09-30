<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "senior_db");

// update_barangay.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['barangay_id'];
    $barangay_name = $_POST['barangay_name'];
    $contact_number = $_POST['contact_number'];
    $email = $_POST['email'];
    $contact_person = $_POST['contact_person'];
    $contact_person_number = $_POST['contact_person_number'];

    $sql = "UPDATE barangay SET barangay_name='$barangay_name', contact_number='$contact_number', email='$email', contact_person='$contact_person', contact_person_number='$contact_person_number' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: manage-barangay.php?status=success&action=update");
    } else {
        header("Location: manage-barangay.php?status=error&message=" . urlencode($conn->error));
    }
}
$conn->close();
?>
