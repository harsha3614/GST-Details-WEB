<?php
session_start();
// Initialize the error message
$error_message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["username"];
    $password = $_POST["password"];

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

    // Check if the user is an admin with a specific password
    if ($email == "admin@gmail.com" && $password == "admin") {
        $_SESSION["logged_in"] = true;
        $_SESSION["user_type"] = "admin";
        echo "<script>alert('Admin Login Successfully.'); window.location.href = 'dashboard.html';</script>";
        exit();
    }else {
        // Invalid credentials, set the error message
        $_SESSION["username"] = "Unknown";
        echo "<script>alert('Invalid Email and Password.'); window.location.href = 'adminlogin.html';</script>";
    }

    // Close the database connection
    $conn->close();
}
?>