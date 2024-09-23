<?php
session_start();
include 'connect.php'; // Include your database connection

// Retrieve the order ID from the form (it should be included as a hidden input in the form)

// Check if a file was uploaded
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileType = $_FILES['image']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Define allowed file extensions
    $allowedExtensions = ['jpg','png','webp'];

    // Validate file extension
    if (in_array($fileExtension, $allowedExtensions)) {
        // Set upload directory
        $uploadDir = 'infographic/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Create the directory if it does not exist
        }

        // Create a unique file name
        $dateTime = new DateTime();
        $orderTime = $dateTime->format('YmdHi');
        $code = $_SESSION['id'];
        $newFileName = $code ."-".$orderTime. "." . $fileExtension;
        $destPath = $uploadDir . $newFileName;

        $title = $_POST['title'];
        $detail = $_POST['detail'];
        
        // Move the file to the destination directory
        if (move_uploaded_file($fileTmpPath, $destPath)) {
            // Prepare and execute the SQL insert statement
            $stmt = $con->prepare("INSERT INTO  `infographicinfo` (title,detail,path,createby) VALUES (?,?,?,?)");
            $stmt->bind_param('ssss', $title, $detail,$newFileName,$code);

            if ($stmt->execute()) {
                echo 'true';
            } else {
                echo "Error : " . $stmt->error;
                header("Refresh: 2; URL=add-infographic.php"); // Redirect to a document list page after 2 seconds
            }

            $stmt->close();
        } else {
            echo "Error moving the uploaded file.";
            header("Refresh: 2; URL=add-infographic.php"); // Redirect to a document list page after 2 seconds
        }
    } else {
        echo "Invalid file extension.";
        header("Refresh: 2; URL=add-infographic.php"); // Redirect to a document list page after 2 seconds
    }
} else {
    echo "Error uploading file.";
    header("Refresh: 2; URL=add-infographic.php"); // Redirect to a document list page after 2 seconds
}

$con->close();
?>
