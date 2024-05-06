<?php
session_start();

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "gstdb";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_FILES['certificate'])) {
    $files = $_FILES['certificate'];

    // Define the folder to upload files
    $uploadFolder = 'uploads/';

    // Initialize a variable to store file names
    $uploadedFiles = "";

    // Loop through each file
    foreach ($files['name'] as $index => $fileName) {
        $tmpFilePath = $files['tmp_name'][$index];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = uniqid('file_') . '.' . $fileExtension;
        $uploadPath = $uploadFolder . $newFileName;

        // Move the uploaded file to the designated folder
        if (move_uploaded_file($tmpFilePath, $uploadPath)) {
            // Append the file name to the list with a comma
            $uploadedFiles .= $newFileName . ',';
        }
    }

    // Remove the trailing comma
    $uploadedFiles = rtrim($uploadedFiles, ',');

    // Update the documents column in the database
    $sql = "UPDATE add_service SET documents = CONCAT(documents, ?) WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $uploadedFiles, $_SESSION['last_inserted_id']);
    $stmt->execute();
    $stmt->close();
}

// Close the database connection
$conn->close();

// Redirect to the main page or do further processing
header('Location: payment-success.php');
exit();
?>
