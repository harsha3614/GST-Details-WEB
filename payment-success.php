<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Submission</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            width: 80%;
            max-width: 1000px;
        }

        .left-half {
            flex: 1;
            padding: 20px;
            color: #2c3e50; /* Text color */
        }

        .left-half h2 {
            color: #3498db; /* Heading color */
            margin-bottom: 20px;
        }

        .left-half ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .left-half li {
            margin-bottom: 10px;
        }

        .right-half {
            flex: 1;
            padding: 20px;
        }

        .form-container {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            color: #2c3e50;
        }

        .form-container input {
            width: calc(100% - 18px); /* Adjusted width to accommodate border */
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="container">
<?php
$last_id = $_SESSION['last_inserted_id'];
$last_service = $_SESSION['last_inserted_service'];

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

$sql = "SELECT * FROM services WHERE service_name = '$last_service' ";

// Execute the query
$result = $conn->query($sql);

// Check if a user with the given ID exists
if ($result->num_rows == 1) {
    // Fetch enterprise details
    $enterprise_info = $result->fetch_assoc();
    $documents_list = explode(',', $enterprise_info['documents_list']);

    // Print the document list in a loop
    
    echo '<div class="left-half">';
    echo '<h2>Required Documents</h2>';
    echo '<ul class="document-list">';
    
    foreach ($documents_list as $document) {
        echo '<li>File: ' . trim($document) . '</li>';
    }

    echo '</ul>';
    echo '</div>';

    // Your right-half container and form goes here

  
} else {
    echo 'Service not found.';
}

// Close the database connection
$conn->close();
?>

    <div class="right-half">
        <div class="form-container">
            <form action="add_documents.php" method="post" enctype="multipart/form-data">
            <label for="certificate">Add Required Documents:</label>
            <input type="file" id="certificate" name="certificate[]" multiple required>

            <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
