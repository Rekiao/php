<?php
include "connect.php";

// Retrieve form parameters
$title = isset($_GET['title']) ? $con->real_escape_string($_GET['title']) : '';
$subject = isset($_GET['subject']) ? $con->real_escape_string($_GET['subject']) : '';
$createtime = isset($_GET['createtime']) ? $con->real_escape_string($_GET['createtime']) : '';
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 6;  // Number of items per page
$offset = ($page - 1) * $limit;

// Build SQL query with filtering
$query = "SELECT * FROM `infographicinfo` WHERE 1=1";
if ($title) {
    $query .= " AND title LIKE '%$title%'";
}
if ($subject !== '' && $subject != 1) {  // Use !== to ensure the subject filter works correctly
    $query .= " AND subject = '$subject'";
}
if ($createtime == '1') {  // Use string comparison for consistency
    $query .= " ORDER BY createtime DESC";
} else {
    $query .= " ORDER BY createtime ASC";
}

$query .= " LIMIT $limit OFFSET $offset";

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
