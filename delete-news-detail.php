<?php
session_start();
include 'connect.php'; // Include your database connection

// Retrieve form data
$code = $_GET['id'] ?? '';
$subject = $_GET['subject'] ?? '';

if ($code) {
    // Prepare the SQL delete statement
    $stmt = $con->prepare("DELETE FROM `newsdetailinfo` WHERE id = ?");
    
    if ($stmt === false) {
        // If prepare() fails, output the error
        die("Error preparing statement: " . $con->error);
    }

    // Bind parameters and execute
    $stmt->bind_param('s', $code);

    if ($stmt->execute()) {
        echo "<div style='width: 100%;height: 100vh; display: flex;justify-content: center;align-items: center;'>
              <p>ลบรายการเสร็จสิ้น</p>
             </div>";
        header("Refresh: 2; URL=add-news.php?subject=$subject"); // Redirect to dashboard after 2 seconds
    } else {
        echo "Error deleting user: " . $stmt->error;
        header("Refresh: 2; URL=add-news.php?subject=$subject"); // Redirect to dashboard after 2 seconds
    }

    $stmt->close();
} else {
    echo "User ID is missing or invalid request.";
    header("Refresh: 2; URL=index-index-admin.php"); // Redirect to dashboard after 2 seconds
}

$con->close();
?>
