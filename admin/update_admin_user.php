<?php
session_start();
include '../db_conn.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_id = $_POST['admin_id'];
    $full_name = $_POST['full_name'];
    $contact_number = $_POST['contact_number'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($password)) {
        // Hash the new password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Update all fields
        $stmt = $conn->prepare("UPDATE admin_users SET full_name = ?, contact_number = ?, username = ?, password = ? WHERE admin_id = ?");
        $stmt->bind_param("ssssi", $full_name, $contact_number, $username, $hashed_password, $admin_id);
    } else {
        // Update without changing password
        $stmt = $conn->prepare("UPDATE admin_users SET full_name = ?, contact_number = ?, username = ? WHERE admin_id = ?");
        $stmt->bind_param("sssi", $full_name, $contact_number, $username, $admin_id);
    }

    if ($stmt->execute()) {
        header("Location: admin_users.php?status=success&action=update");
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
