<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST["message"];
    $user = $_SESSION['user']; // You can replace this with the user's name

    // Include database connection code here
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'gstdb';
    
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $uid = $_SESSION["id"];
    $sql = "INSERT INTO messages (user, question, uid) VALUES ('$user', '$message', '$uid')";

    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>;window.location.href='chatpage.php';</script>";
      
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}