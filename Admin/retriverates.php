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

// Fetch data from the gstrates table
$sql_select = "SELECT * FROM gstrates";
$result = mysqli_query($conn, $sql_select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <title>Display GST Rates</title>
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
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 80%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
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
        /* Add more styles as needed */
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>
    <div class="sidebar">
        <div class="profile">
            <i class="fas fa-user-circle"></i>
            <span>User</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#">
                    <i class="fas fa-newspaper"></i>
                    <span>News</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-video"></i>
                    <span>Videos</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-percent"></i>
                    <span>GST Rates</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-book"></i>
                    <span>GST Act</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
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
                        <th>Chapter</th>
                        <th>Description</th>
                        <th>CGST Rate (%)</th>
                        <th>SGST/UTGST Rate (%)</th>
                        <th>IGST Rate (%)</th>
                    </tr>

                    <?php
                    // Loop through the result set
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['chapter']}</td>";
                        echo "<td>{$row['Description_of_Goods']}</td>";
                        echo "<td>{$row['CGST_Rate']}</td>";
                        echo "<td>{$row['SGST_UTGST_Rate']}</td>";
                        echo "<td>{$row['IGST_Rate']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Function to load table data using AJAX
            function loadTableData() {
                $.ajax({
                    type: 'GET',
                    url: 'your_php_script_to_retrieve_data.php', // Replace with the actual PHP script to retrieve data
                    success: function (data) {
                        // Update the table with the new data
                        $('#dataTable').html(data);
                    },
                    error: function (xhr, status, error) {
                        // Handle errors
                        alert('Error: ' + error);
                    }
                });
            }

            // Load initial table data on page load
            loadTableData();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add more scripts as needed -->
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
