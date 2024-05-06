<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $chapter = $_POST["chapter"];
    $description = $_POST["description"];
    $cgstRate = $_POST["cgstRate"];
    $sgstRate = $_POST["sgstRate"];
    $igstRate = $_POST["igstRate"];
    

    // Include database connection code here
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'gstdb';
    
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $sql = "INSERT INTO gstrates (chapter, Description_of_Goods, CGST_Rate, SGST_UTGST_Rate, IGST_Rate) 
            VALUES ('$chapter', '$description', '$cgstRate', '$sgstRate', '$igstRate')";

    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully
        echo "<script>alert('Data inserted successfully');</script>";
    } else {
        // Error in inserting data
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            background-color: #f4f4f4;
            background-image: url('your-background-image.jpg'); /* Replace with your background image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
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

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        form {
            margin-top: 20px;
        }

        .form-row {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input,
        select,
        textarea {
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
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Add more styles as needed */
    </style>
    <title>Add GST Schedules</title>
</head>
<body>
    <div class="sidebar">
        <div class="profile">
            <i class="fas fa-user-circle"></i>
            <span>Admin</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.html">
                    <i class="fas fa-chart-bar"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-users"></i>
                    <span>User Management</span>
                </a>
            </li>
            <li>
                 <a href="AddEnterprises.php">
                    <i class="fas fa-building"></i>
                    <span>Add Enterprises</span>
                </a>
            </li>
           
            <li>
                <a href="addnews.php">
                    <i class="fas fa-newspaper"></i>
                    <span>Add News</span>
                </a>
            </li>
            <li>
                <a href="addvideos.php">
                    <i class="fas fa-video"></i>
                    <span>Add Videos</span>
                </a>
            </li>
            <li>
                <a href="addrates.php">
                    <i class="fas fa-percent"></i>
                    <span>Add GST Rates</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <!-- Main content -->
        <div class="container">
            <h2 style="text-align: center;">Add GST Schedules</h2>
            <form id="gstScheduleForm" method="post" action="">
                <div class="form-row">
                    <label for="chapter">Chapter / Heading / Sub-heading / Tariff item:</label>
                    <input type="text" id="chapter" name="chapter" required>
                </div>
                <div class="form-row">
                    <label for="description">Description of Goods:</label>
                    <input type="text" id="description" name="description" required>
                </div>
                <div class="form-row">
                    <label for="cgstRate">CGST Rate (%):</label>
                    <input type="text" id="cgstRate" name="cgstRate" required>
                </div>
                <div class="form-row">
                    <label for="sgstRate">SGST / UTGST Rate (%):</label>
                    <input type="text" id="sgstRate" name="sgstRate" required>
                </div>
                <div class="form-row">
                    <label for="igstRate">IGST Rate (%):</label>
                    <input type="text" id="igstRate" name="igstRate" required>
                </div>
               
                <!-- Submit Button -->
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add more scripts as needed -->
</body>
</html>
