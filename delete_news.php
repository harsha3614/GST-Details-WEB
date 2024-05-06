<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $article_id = $_POST["article_id"];

    // Add your database connection code here
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "gstdb";
    
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform the delete operation
    $sql = "DELETE FROM news WHERE article_id = $article_id";
    if ($conn->query($sql) === TRUE) {
        echo "News deleted successfully";
    } else {
        echo "Error deleting news: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
