<?php
// logout.php

session_start(); // Start the session
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session data on the server
header("Location: index.php"); // Redirect to the login page (adjust if necessary)
exit(); // Ensure no further code is executed
?>
