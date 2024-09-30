<?php
session_start();
include '../db_conn.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $contact_number = $_POST['contact_number'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password securely
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database using prepared statement
    $stmt = $conn->prepare("INSERT INTO admin_users (full_name, contact_number, username, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $full_name, $contact_number, $username, $hashed_password);

    if ($stmt->execute()) {
        header("Location: admin_users.php?status=success&action=add");
        exit();
    } else {
        $error = $stmt->error;
        header("Location: admin_users.php?status=error&message=" . urlencode($error));
        exit();
    }
    $stmt->close();
}
$conn->close();
?>
