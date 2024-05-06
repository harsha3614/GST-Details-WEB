<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Display GST Rates</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            background-color: #f4f4f4;
            display: flex;
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

        .topnav {
            background-color: #007bff;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .topnav .brand {
            color: #fff;
            font-size: 20px;
            text-decoration: none;
        }

        .topnav .menu {
            display: flex;
            align-items: center;
        }

        .topnav .menu a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        .topnav .menu a:hover {
            background-color: #0056b3;
        }

        .topnav .menu .active {
            background-color: #0056b3;
            border-radius: 5px;
        }

        .topnav .menu .logout {
            background-color: #dc3545;
            border: none;
            border-radius: 5px;
            color: #fff;
            padding: 10px 20px;
            margin-left: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .topnav .menu .logout:hover {
            background-color: #c82333;
        }

        .container {
            width: 80%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            background-color: #fff;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>
<div class="sidebar">
    <div class="profile">
        <a href="profile.php">
            <i class="fas fa-user-circle"></i>
        </a>
    </div>

    <ul class="nav-links">
        <li>
            <a href="dashboard.php">
                <i class="fas fa-chart-bar"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="services.php">
                <i class="fas fa-project-diagram"></i>
                <span>Services</span>
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
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</div>

<div class="main-content">
   

    <div class="container">
        <h2 style="text-align: center;">GST Rates</h2>

        <!-- Display data in a table -->
        <div class="table-container">
            <table id="dataTable">
                <tr>
                    <th>User Name</th>
                    <th>Service</th>
                    <th>Mobile NUmber</th>
                    <th>Description</th>
                   
                    <th>Auditor Name</th>
                    <th>Download</th>
                    <th>Download All</th>
                </tr>

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

$auditor = $_SESSION["auditor_name"];

// Fetch data from the auditors table for the specific enterprise
$sql_select_auditors = "SELECT * FROM auditors ";
$result_auditors = mysqli_query($conn, $sql_select_auditors);

// Check if the query was successful
if ($result_auditors) {
    // Fetch data from the add_service table
    $sql_select = "SELECT * FROM add_service WHERE auditor='$auditor' ";
    $result = mysqli_query($conn, $sql_select);

    // Check if the query was successful
    if ($result) {
        // Loop through the result set
      
// ... (Previous code)

// Loop through the result set
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row['user_name']}</td>";
    echo "<td>{$row['service']}</td>";
    echo "<td>{$row['mobile_no']}</td>";
    echo "<td>{$row['Description']}</td>";
  
    
    echo "<td>";
    echo "{$row['auditor']}";
    echo "</td>";

    echo "<td>";

    // Assuming $row['documents'] is a comma-separated list of filenames
    $files = explode(',', $row['documents']);
    foreach ($files as $file) {
        echo "<a href='../uploads/{$file}' download>{$file}</a><br>";
    }

    echo "</td>";

    echo "<td>";
    echo "<button onclick=\"downloadAll('{$row['documents']}')\">Download All</button>";
    echo "</td>";

    echo "</tr>";
}

// ... (Remaining code)

// JavaScript function to download all files when the "Download All" button is clicked
echo '<script>
    function downloadAll(files) {
        var fileArray = files.split(",");
        for (var i = 0; i < fileArray.length; i++) {
            var link = document.createElement("a");
            link.href = "../uploads/" + fileArray[i];
            link.download = fileArray[i];
            link.click();
        }
    }
</script>';



        // Free the result set
        mysqli_free_result($result_auditors);
    } else {
        echo "Error in executing the add_service query: " . mysqli_error($conn);
    }
} else {
    echo "Error in executing the auditors query: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>



            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
    $('.update-status').change(function() {
        var status = $(this).val(); // Get the selected status value
        var counselingId = $(this).data('counseling-id'); // Get the counseling ID from the data attribute
        
        // Send an AJAX request to update the status
        $.ajax({
            type: 'POST',
            url: 'update_status.php', // Replace 'update_status.php' with the actual PHP script name
            data: { status: status, counselingId: counselingId },
            success: function(response) {
                // Handle the response from the server
                console.log(response); // Log the response for debugging
                
                // If the status is success, redirect to course_counsel.php
                if (response.trim() === 'success') {
                    window.location.href = 'finance.php'; // Redirect to course_counsel.php
                }
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(error); // Log the error for debugging
            }
        });
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Add more scripts as needed -->
</body>
</html>
