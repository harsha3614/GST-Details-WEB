<?php
session_start();     
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gstdb"; 
	
$message = "Added Service Successful";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = [ 
    'user_id' => '1',
    'payment_id' => $_POST['razorpay_payment_id'],
    'amount' => $_POST['totalAmount'],
    'product_id' => $_POST['product_id'],
];

$Enterprise_Name = $_SESSION['en_name'];
$Description = $_SESSION['en_description'];
$service = $_SESSION['en_service'];
$mobile = $_SESSION["mobile"];
$username = $_SESSION["user"];
    
$sql = "INSERT INTO add_service (Enterprise_Name, Description, service, user_name, mobile_no, user_id, payment_id, amount, product_id ) VALUES(?,?,?,?,?,?,?,?,?)";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the parameters and execute the query
$stmt->bind_param("sssssssss", $Enterprise_Name, $Description, $service, $username, $mobile, $data['user_id'], $data['payment_id'], $data['amount'], $data['product_id']);

if ($stmt->execute()) {
    // Retrieve the last inserted ID
    $lastInsertId = $conn->insert_id;

    // Save the last inserted ID into a session variable
    $_SESSION['last_inserted_service'] = $service;
    $_SESSION['last_inserted_id'] = $lastInsertId;

    $arr = array('msg' => 'Payment successfully credited', 'status' => true);
    echo json_encode($arr);
} else {
    $arr = array('msg' => 'Error: Unable to insert data into the database', 'status' => false);
    echo json_encode($arr);
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>
