<?php
    session_start();
    include 'connect.php'; // Include your database connection

    // Retrieve form data
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $subject = $_POST['subject'];
    $createby = $_SESSION['id'];

    $stmt = $con->prepare("INSERT INTO `newsinfo` (subject, title, detail, createby) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $subject, $title, $detail, $createby);

    if ($stmt->execute()) {
        echo "true";
    } else {
        echo "Error : " . $stmt->error;
    }

    $stmt->close();
    $con->close();
    ?>
