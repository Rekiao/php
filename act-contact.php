<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connect.php'; // Include your database connection

    // Retrieve and sanitize form data
    $subject = $con->real_escape_string($_POST['subject']);
    $name = $con->real_escape_string($_POST['name']);
    $phone = $con->real_escape_string($_POST['phone']);
    $email = $con->real_escape_string($_POST['email']);
    $message = $con->real_escape_string($_POST['message']);

    // Insert data into the database
    $stmt = $con->prepare("INSERT INTO contactinfo (subject, name, phonenumber, email, detail) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $subject, $name, $phone, $email, $message);

    if ($stmt->execute()) {
        echo "true";
    } else {
        echo "Error: " . $con->error;
    }

    $stmt->close();
    $con->close();
}
?>
