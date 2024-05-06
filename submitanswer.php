<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST["message"];
    $user = $_SESSION['user'];
    $question=$_SESSION['question']; // You can replace this with the user's name
    $responder_name = $_SESSION["user"];

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
    $ansid = $_SESSION['ansid'];
    $sql = "INSERT INTO answer_table (responder_name, answer, question, uid) VALUES ('$responder_name', '$message', '$question', '$ansid')";
    // $sql = "UPDATE messages SET answer = '$message' WHERE id = $ansid";


    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>window.location.href='answer.php?id=$ansid';</script>";
      
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}