<?php
// delete_barangay.php
include 'db_conn.php';
// delete_barangay.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['barangay_id'];
    $sql = "DELETE FROM barangay WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: manage-barangay.php?status=success_delete");
    } else {
        header("Location: manage-barangay.php?status=error&message=" . urlencode($conn->error));
    }
}

    $conn->close();

?>
