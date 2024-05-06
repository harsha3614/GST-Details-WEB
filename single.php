<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Article Title - GST News</title>
    <?php include "header.php"?>
</head>
<body>


<br><br><br><br><br>
<!-- News Article Content -->
<div class="container-fluid">
    <?php
    // Your existing PHP code for fetching and displaying news content
    // Database connection
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "gstdb";

    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the user ID is provided in the query parameter
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Query to fetch user details by ID
        $sql = "SELECT * FROM news WHERE article_id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            $title = $row['title'];
            $image_data = $row['img'];
            $description = $row['description'];

            // Display a form for editing user details
            echo '  <img style="width: 100%;" src="data:image/jpeg;base64,' . base64_encode($image_data) . '" alt="" />';

            echo ' <div class="page-title">';
            echo ' <span>January 1, 2018</span>';
            echo '<h2>' . $title . '</h2>';
            echo '</div>';
            echo '<div id="fh5co-single-content" class="single-content">';
            echo '<div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">';
            echo '  <p>' . $description .'  </p>';
            echo '</div>';
        } else {
            echo 'Article not found.';
        }
    } else {
        echo 'Article ID not provided.';
    }

    $conn->close();
    ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
