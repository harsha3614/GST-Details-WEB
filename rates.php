<?php include "header.php"?>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }

        
        .main-content {
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* .container {
            width: 80%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            
        } */

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
<br><br><br><br><br><br>
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

                // Check if the query was successful
                if ($result) {
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
                } else {
                    echo "Error in executing the query: " . mysqli_error($conn);
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Add more scripts as needed -->
</body>
</html>
