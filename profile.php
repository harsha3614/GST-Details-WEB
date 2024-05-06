<?php include "header.php"?>
<?php
session_start();
// Establish your database connection here
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "gstdb";

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch room details from the database (replace 'your_table_name' with your actual table name)
$sql = "SELECT user_name, email, mobile_number  FROM userlogin WHERE id = '" . $_SESSION["id"] . "'";

$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch and display room details
    $row = $result->fetch_assoc();
    $name = $row["user_name"];
    $mobilenumber= $row["mobile_number"];
    $email = $row["email"];
} else {
    // Handle the case where no data is found
    $name = "N/A";
    $mobilenumber = "N/A";
    $emial = "N/A";
}

// Close the database connection
$conn->close();
?>

<style>
.forms p {
            display: block;
            width: 20%;
            margin-left: 40%;
            text-align: left;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #0092db;
            border-radius: 10px;
            box-shadow: 0px 2px 5px #0092db78;
        }

        .wrapper {
            text-align: center;
        }

        .profile-img-container {
            position: relative;
            display: inline-block;
        }

        .profile-img {
            width: 150px; /* Adjust the size as needed */
            height: 150px; /* Adjust the size as needed */
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .edit-icon {
            position: absolute;
            bottom: 0;
            right: 0;
            cursor: pointer;
        }

        #file-input {
            display: none;
        }
 
</style>
<body>


      
        <div class="wrapper">
        <br><br>
        <h2> PROFILE </h2>
        <br><br>

        <!-- Add the profile image container with an edit icon -->
        <div class="profile-img-container">
            <img src="uploads/news.png" alt="Profile Photo" class="profile-img" id="current-img">
            <div class="edit-icon" onclick="openFileInput()">
                <i class="fa fa-edit"></i> <!-- You can use any edit icon of your choice -->
            </div>
        </div>

        <!-- Input element for choosing a new photo -->
        <input type="file" id="file-input" accept="image/*" onchange="displayNewImage()" />

        <form class="forms">
            <p placeholder="name"> <?php echo $name; ?></p>
            <p placeholder="mobilenumber"> <?php echo $mobilenumber; ?></p>
            <p placeholder="email" > <?php echo $email; ?></p>
        </form>
    </div>
    <script>
        function openFileInput() {
            document.getElementById('file-input').click();
        }

        function displayNewImage() {
            var input = document.getElementById('file-input');
            var img = document.getElementById('current-img');
            
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    img.src = e.target.result;
                };
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Parallax -->
<script src="js/jquery.stellar.min.js"></script>
<!-- Main -->
<script src="js/main.js"></script>
<script>if (!navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)){$(window).stellar();}</script>
    </script>
</body>
</html>
