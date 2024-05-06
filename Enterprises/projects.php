<?php
session_start();

// Database configuration
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["service_name"]) && isset($_POST["description"])) {
        // Sanitize input to prevent SQL injection
        $service_name = mysqli_real_escape_string($conn, $_POST["service_name"]);
        $description = mysqli_real_escape_string($conn, $_POST["description"]);
        $enterprise_name = $_SESSION["Enterprise_Name"];
        $Service_charge = mysqli_real_escape_string($conn, $_POST["Service_charge"]);
        $doc_list = mysqli_real_escape_string($conn, $_POST["doc_list"]);

        // Insert service into the database
        $sql = "INSERT INTO services (service_name, description, enterprise_name,Service_charge,documents_list) VALUES ('$service_name', '$description', '$enterprise_name' , '$Service_charge', '$doc_list')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Service added successfully.');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Add any additional styles as needed */

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

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="sidebar">
    <div class="profile">
            <a href="profile.php"> <!-- Updated line -->
                <i class="fas fa-user-circle"></i>
               
            </a> <!-- Updated line -->
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
            <h2>Add New Service</h2>
            <form method="post" action="">
                <div class="form-group">
                    <label for="service_name">Service Name:</label>
                    <input type="text" name="service_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" class="form-control" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="cost"> Service Charge:</label>
                    <input type="text" name="Service_charge" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="cost"> Documents List:</label>
                    <input type="text" name="doc_list" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Add Service</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add any additional JavaScript libraries or scripts as needed -->
</body>

</html>
