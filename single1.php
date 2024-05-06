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
<div class="container">
    <?php
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
     $sql = "SELECT * FROM news1 WHERE id = $id";
     $result = $conn->query($sql);
 
     if ($result->num_rows == 1) {
         $row = $result->fetch_assoc();
        
         $title = $row['title'];
         $image_data = $row['image'];
         $description = $row['description'];
         $date = $row['date'];
 
         // Display a form for editing user details
         echo '  <img style="width:70%;" src="data:image/jpeg;base64,' . base64_encode($image_data) . '" alt="" />';
           
             echo ' <div class="page-title">';
             echo ' <span>' . $date . '</span>';
             echo '<h3>' . $title . '</h3>';
             echo '</div>';
             echo '<div id="fh5co-single-content" class="single-content">';
             echo '<div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">';
             echo '  <p>' . $description .'  </p>';
             echo '</div>';
     } else {
         echo 'User not found.';
     }
 } else {
     echo 'User ID not provided.';
 }
 
 $conn->close();
    ?>
</div>

</body>
</html>
