<?php
session_start();

// Initialize the error message
$error_message = "";

// Check if the user is logged in
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Fetch enterprise details based on the login information
$enterprise_id = $_SESSION['id'];

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

$sql = "SELECT * FROM enterprise_list WHERE id = $enterprise_id";

// Execute the query
$result = $conn->query($sql);

// Check if a user with the given ID exists
if ($result->num_rows == 1) {
    // Fetch enterprise details
    $enterprise_info = $result->fetch_assoc();
} else {
    // Invalid user ID, redirect to login
    header("Location: login.php");
    exit();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <title>Enterprise Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            background-color: #f4f4f4;
        }

        .sidebar {
            width: 70px;
            background: linear-gradient(to right, #36D1DC, #5B86E5);
            color: #fff;
            padding-top: 20px;
            transition: width 0.3s ease;
            position: fixed;
            height: 100%;
        }

        .profile {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile i {
            font-size: 40px;
            color: #fff;
        }

        .profile span {
            display: block;
            margin-top: 10px;
            font-size: 12px;
        }

        .nav-links {
            list-style: none;
            padding: 0;
            text-align: center;
        }

        .nav-links li {
            margin-bottom: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .nav-links i {
            margin-bottom: 5px;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .nav-links a span {
            display: none;
            position: absolute;
            top: 50%;
            left: 70px;
            transform: translate(-50%, -50%);
            white-space: nowrap;
            background-color: #333;
            color: #fff;
            padding: 5px;
            border-radius: 5px;
        }

        .nav-links a:hover i {
            opacity: 1;
        }

        .nav-links a:hover span {
            display: inline;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            margin-left: 70px;
            transition: margin-left 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 60%;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
        }

        h2 {
            text-align: center;
        }

        /* Additional styles for the form */
        form {
            margin-top: 20px;
        }

        .form-row {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        
        .profile input[type="file"] {
            display: none;
        }

        .profile img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .profile img:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="profile">
            <i class="fas fa-user-circle"></i>
            <span><?php echo $enterprise_info['Enterprise_Name']; ?></span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php">
                    <i class="fas fa-chart-bar"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="Auditor.php">
                    <i class="fas fa-user-tie"></i>
                    <span>Add Auditors</span>
                </a>
            </li>
            <li>
                <a href="projects.php">
                    <i class="fas fa-project-diagram"></i>
                    <span>Projects/Services</span>
                </a>
            </li>
            <li>
                <a href="finance.php">
                    <i class="fas fa-file-invoice-dollar"></i>
                    <span>Financials</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-comments"></i>
                    <span>Communications</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-cogs"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="container">
            <h2>Enterprise Profile</h2>
            <form>

            <div class="profile">
        <input type="file" id="profileImageInput" accept="image/*" onchange="updateProfileImage(this)">
        <img src="path/to/profile-image.jpg" alt="Profile Image" onclick="document.getElementById('profileImageInput').click();">
        <i class="fas fa-user-circle edit-profile-icon"></i>
        <span><?php echo $enterprise_info['Enterprise_Name']; ?></span>
    </div>
                <div class="form-row">
                    <label for="enterpriseName">Enterprise Name:</label>
                    <input type="text" id="enterpriseName" name="enterpriseName" value="<?php echo $enterprise_info['Enterprise_Name']; ?>" readonly>
                </div>
                

                <div class="form-row">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $enterprise_info['Email_Address']; ?>" readonly>
                </div>

                <div class="form-row">
                    <label for="phoneNumber">Phone Number:</label>
                    <input type="text" id="phoneNumber" name="phoneNumber" value="<?php echo $enterprise_info['Phone_Number']; ?>" readonly>
                </div>

                <!-- Add more fields as needed -->

            </form>
        </div>
    </div>
</body>


<script>
        function updateProfileImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    // Update the image source
                    document.querySelector('.profile img').src = e.target.result;
                };

                // Read the image file as a data URL
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</html>
