<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <?php include "header.php"?>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container-fluid {
            background: #f4f4f4;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            border-bottom: 2px solid #ddd;
        }

        .container-fluid .brand {
            color: #333;
            font-size: 24px;
            text-decoration: none;
        }

        .container-fluid .menu {
            display: flex;
            align-items: center;
        }

        .container-fluid .menu a {
            color: #333;
            text-decoration: none;
            padding: 10px 20px;
            transition: color 0.3s;
        }

        .container-fluid .menu a:hover {
            color: #007bff;
        }

        .container-fluid .menu .logout {
            background-color: #dc3545;
            border: none;
            border-radius: 5px;
            color: #fff;
            padding: 10px 20px;
            margin-left: 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .container-fluid .menu .logout:hover {
            background-color: #c82333;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Aligning contents to center */
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1),
                0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1),
                0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12),
                0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
            padding: 20px;
            margin: 20px;
            width: 200px;
            text-align: center;
            position: relative;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px); /* Lift the card on hover */
        }

        .card a {
            text-decoration: none;
            color: inherit;
            cursor: pointer;
        }
    </style>
    <title>Enterprise List</title>
</head>
<body>
    <br><br><br><br><br>
    <div class="container-fluid">
       

    <div class="card-container">
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

        $sql = "SELECT Enterprise_Name, Enterprise_Type FROM enterprise_list";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card">
                <a href="enterprise_services.php?name=<?php echo urlencode($row['Enterprise_Name']); ?>">
                    <h3><?php echo $row['Enterprise_Name']; ?></h3>
                </a>
                <p><?php echo $row['Enterprise_Type']; ?></p>
            </div>
            <?php
        }

        mysqli_close($conn);
        ?>
    </div>

    <script>
        function addService(enterpriseName) {
            // You can implement the logic to add the service to the enterprise dashboard here
            // For demonstration purposes, let's just show an alert
            alert("Service booked to " + enterpriseName + "'s dashboard");
        }
    </script>
</body>
</html>
