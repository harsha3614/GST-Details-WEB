<?php
session_start();
 $servername = "localhost";

    $username = "root";

    $password = "";

    $dbname = "gstdb"; 
	
	$message = "Added Service Successful";
	
	
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

	$Enterprise_Name = $_SESSION['en_name'];

    $Description = $_SESSION['en_description'];

    $service = $_SESSION['en_service'];

    $mobile = $_SESSION["mobile"];

    $username = $_SESSION["user"];

    $sql = "INSERT INTO add_service (Enterprise_Name, Description, service, user_name, mobile_no ) VALUES('$Enterprise_Name','$Description','$service', '$username', '$mobile')";
	 

if ($conn->query($sql) === TRUE) {
  
    echo "<script type='text/javascript'>alert('$message'); window.location.href='enterprise_services.php?name=" . urlencode($Enterprise_Name) . "';</script>";
    // header("Location:enterprise_services.php?name='.$Enterprise_Name.'");
    exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>