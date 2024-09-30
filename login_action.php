<?php
session_start();
include('db_conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT admin_id, password FROM admin_users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($admin_id, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Correct password, set session variables
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['username'] = $username;
            header("Location: admin/index.php");
            exit();
        } else {
            // Incorrect password
            header("Location: index.php?error=Invalid%20username%20or%20password");
            exit();
        }
    } else {
        // User does not exist
        header("Location: index.php?error=Invalid%20username%20or%20password");
        exit();
    }

    $stmt->close();
}
$conn->close();
?>
