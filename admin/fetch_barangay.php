<?php
include 'db_conn.php';

// SQL query to fetch barangay data
$sql = "SELECT barangay_name, contact_number, email, contact_person, contact_person_number FROM barangays";
$result = $conn->query($sql);

$barangays = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $barangays[] = $row;
    }
} else {
    echo "No results found."; // Debug: Check if the query returns any results
}

$conn->close();

// Return JSON data to the front-end
header('Content-Type: application/json');
echo json_encode($barangays);
?>

