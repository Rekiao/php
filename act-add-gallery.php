<?php
session_start();
include 'connect.php'; // Include your database connection

// Retrieve the order ID from the form (it should be included as a hidden input in the form)

// Check if a file was uploaded
if (isset($_FILES['files']) && $_FILES['files']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['files']['tmp_name'];
    $fileName = $_FILES['files']['name'];
    $fileSize = $_FILES['files']['size'];
    $fileType = $_FILES['files']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // Define allowed file extensions
    $allowedExtensions = ['zip','rar'];

    // Validate file extension
    if (in_array($fileExtension, $allowedExtensions)) {
        // Set upload directory
        $uploadDir = 'gallery/';
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
            $stmt = $con->prepare("INSERT INTO  `gelloryinfo` (title,detail,path,createby) VALUES (?,?,?,?)");
            $stmt->bind_param('ssss', $title, $detail,$newFileName,$code);

            if ($stmt->execute()) {
                echo 'true';
            } else {
                echo "Error : " . $stmt->error;
                header("Refresh: 2; URL=add-gallery.php"); // Redirect to a document list page after 2 seconds
            }

            $stmt->close();
        } else {
            echo "Error moving the uploaded file.";
            header("Refresh: 2; URL=add-gallery.php"); // Redirect to a document list page after 2 seconds
        }
    } else {
        echo "Invalid file extension.";
        header("Refresh: 2; URL=add-gallery.php"); // Redirect to a document list page after 2 seconds
    }
} else {
    echo "Error uploading file.";
    header("Refresh: 2; URL=add-gallery.php"); // Redirect to a document list page after 2 seconds
}

$con->close();
?>
