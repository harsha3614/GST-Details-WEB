<?php
// Include database connection code here
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'gstdb';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the ID from the query parameter
$enterpriseID = isset($_GET['id']) ? $_GET['id'] : '';

// Fetch details based on the ID
$sql = "SELECT * FROM enterprise_list WHERE Enterprise_Name = '" . mysqli_real_escape_string($conn, $enterpriseID) . "'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1),
                0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1),
                0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12),
                0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
            padding: 20px;
            margin-top: 20px;
        }

        h1 {
            color: #0092DB;
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            color: #333;
            margin-bottom: 10px;
        }

        .back-link {
            display: inline-block;
            color: #0092DB;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .detail-label {
            font-weight: bold;
            color: #0092DB;
        }

        .detail-value {
            color: #555;
        }

        .topnav {
            background-color: #0092DB;
            overflow: hidden;
            padding: 10px;
            text-align: right;
            margin-bottom: 20px;
        }

        .topnav a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .topnav a:hover {
            background-color: #1b9bff;
            color: white;
            transition: 0.5s;
        }
      
    </style>
    <title><?php echo $row['Enterprise_Name']; ?> Details</title>
</head>
<body>
<div class="container-fluid topnav">
        <!-- Top Navigation Bar -->
        <a href="index.php">Home</a>
        <a href="profile.php">Profile</a>
        <a href="rules.html">GST Rules</a>
        <a href="rates.html">GST Rates</a>
        <a href="act.html">GST Act</a>
        <a href="chatpage.php">Discussion Forum</a>
        <a href="expenses.html">Expenses</a>
        <a href="income.php">Income</a>
        <a href="supplies.html">Supplies</a>
        <a href="login.php">Logout</a>
    </div>
    <div class="container">
        <a href="javascript:history.back()" class="back-link">&lt; Back to Enterprise List</a>
        <h1><?php echo $row['Enterprise_Name']; ?> Details</h1>
        <p class="detail-label">Enterprise Type:</p>
        <p class="detail-value"><?php echo $row['Enterprise_Type']; ?></p>
        
        <p class="detail-label">Registration Number:</p>
        <p class="detail-value"><?php echo $row['Registration_Number']; ?></p>
        
        <p class="detail-label">Address:</p>
        <p class="detail-value"><?php echo $row['Address']; ?></p>
        
        <p class="detail-label">Email Address:</p>
        <p class="detail-value"><?php echo $row['Email_Address']; ?></p>
        
        <p class="detail-label">Phone Number:</p>
        <p class="detail-value"><?php echo $row['Phone_Number']; ?></p>
        
        <p class="detail-label">GSTIN:</p>
        <p class="detail-value"><?php echo $row['GSTIN']; ?></p>
        
        <p class="detail-label">Tax Registration Type:</p>
        <p class="detail-value"><?php echo $row['Tax_Registration_Type']; ?></p>
        
        <p class="detail-label">Bank Name:</p>
        <p class="detail-value"><?php echo $row['Bank_Name']; ?></p>
        
        <p class="detail-label">Account Number:</p>
        <p class="detail-value"><?php echo $row['Account_Number']; ?></p>
        
        <p class="detail-label">IFSC Code:</p>
        <p class="detail-value"><?php echo $row['IFSC_Code']; ?></p>
        
        <p class="detail-label">Authorized Signatory:</p>
        <p class="detail-value"><?php echo $row['Authorized_Signatory']; ?></p>
        
        <p class="detail-label">Designation:</p>
        <p class="detail-value"><?php echo $row['Designation']; ?></p>
        
        <p class="detail-label">Nature of Business:</p>
        <p class="detail-value"><?php echo $row['Nature_of_Business']; ?></p>
        
        <p class="detail-label">Date of Commencement:</p>
        <p class="detail-value"><?php echo $row['Date_of_Commencement']; ?></p>
        
        <p class="detail-label">PAN Card:</p>
        <p class="detail-value"><?php echo $row['PAN_Card']; ?></p>
        
        <p class="detail-label">Aadhaar Card:</p>
        <p class="detail-value"><?php echo $row['Aadhaar_Card']; ?></p>

        <!-- Add more details as needed -->

    </div>
</body>
</html>
