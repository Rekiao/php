<?php
include "connect.php";

// Retrieve form parameters
$id = isset($_GET['id']) ? $con->real_escape_string($_GET['id']) : '';

// Build SQL query with filtering
$query = "SELECT * FROM `newsdetailinfo` WHERE newsid = '$id'";
// Uncomment for debugging, but remove in production
// echo $query;

$result = $con->query($query);

$data = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo json_encode(['error' => $con->error]);
    exit;
}

$con->close();
echo json_encode($data);
?>
