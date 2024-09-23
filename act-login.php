<?php
// Include the database connection file
include 'connect.php';

// Retrieve the submitted form data via POST
$username = $_POST['username'];
$password = $_POST['password'];

// Tables to check for login
$tables = ['accountinfo'];

$loggedIn = false;

foreach ($tables as $table) {
    // Prepare the SQL statement
    $stmt = $con->prepare("SELECT * FROM $table WHERE username = ? AND password = ?");
    
    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die("Error preparing the statement for table '$table': " . $con->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Check if a matching user is found
    if ($user) {
        // User found, successful login
        $loggedIn = true;
        session_start();
        $_SESSION['user'] = $user;
        $_SESSION['id'] = $user['id']; 
        $_SESSION['status'] = $user['status']; 
        // Return success response for AJAX
        echo "true";
    }

    $stmt->close();
}

// If no user found, show login failed message
if (!$loggedIn) {
   echo "false";
}
?>
