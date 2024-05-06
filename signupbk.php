<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gstdb"; 
$message = "Register successful";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Name = $_POST['user_name'];
$mobile_number = $_POST['mobile_number'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$sql = "INSERT INTO userlogin (user_name, mobile_number, email, password,confirm_password) VALUES('$Name','$mobile_number','$email','$password','$confirm_password')";

if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('$message');window.location.href='modern_login.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
