<?php
session_start();

// Initialize error message
$error_message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Database connection details
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

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, user_name, mobile_number, email FROM userlogin WHERE email=? AND password=?");
    $stmt->bind_param("ss", $username, $password);

    // Execute query
    $stmt->execute();
    
    // Get result
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        // If user found, set session variables
        $userInfo = $result->fetch_assoc();
        $_SESSION["logged_in"] = true;
        $_SESSION["id"] = $userInfo["id"];
        $_SESSION["user"] = $userInfo["user_name"];
        $_SESSION["mobile"] = $userInfo["mobile_number"];
        $_SESSION["email"] = $userInfo["email"];
        
        // Redirect to index.php or any desired page upon successful login
        header("Location: index.php");
        exit();
    } else {
        // If user not found, set error message
        $error_message = "Invalid username or password.";
    }

    // Close connection
    $conn->close();
}
?>
