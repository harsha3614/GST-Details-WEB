<?php include "header.php"?>
        
        <div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    
    <!-- <div class="container-fluid topnav">
        
        <a href="index.php">Home</a>
        <a href="profile.php">Profile</a>
        <a href="rules.html">GST Rules</a>
        <a href="rates.php">GST Rates</a>
        <a href="enterpriselist.php">Enterprise </a>
        
    <a href="chatpage.php">Discussion Forum</a>
    <a href="login.php">Logout</a>
    </div> -->
   <br><br><br>

        <div class="container-fluid pt-3">
            <div class="container animate-box" data-animate-effect="fadeIn">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
                </div>
                <div class="owl-carousel owl-theme js" id="slider1">
                <?php
                $servername = "localhost";
                $db_username = "root";
                $db_password = "";
                $dbname = "gstdb";
                
                $conn = new mysqli($servername, $db_username, $db_password, $dbname);
                
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                                                // Fetch data from the database
                                                $sql = "SELECT article_id, title, img, description FROM news"; // Corrected "artical_id" to "article_id"
                                                $result = $conn->query($sql);
                            
                                                if ($result === false) {
                                                    // Check if there was an error with the query
                                                    echo "Error: " . $conn->error;
                                                } else if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $article_id = $row["article_id"];
                                                        $title = $row["title"];
                                                        $image_data = $row["img"];
                                                        $description = $row["description"];
                                                        
                                                        

                                                        // new
                                                        echo '<div class="item px-2">';
                                                echo  '<div class="fh5co_latest_trading_img_position_relative">';
                            echo '<div class="fh5co_latest_trading_img"><img src="data:image/jpeg;base64,' . base64_encode($image_data) . '" alt=""
                            class="fh5co_img_special_relative"/></div>';
                            echo '<div class="fh5co_latest_trading_img_position_absolute"></div>';
                            echo '<div class="fh5co_latest_trading_img_position_absolute_1">
                                <a href="single.php?id=' . $article_id . '"  class="text-white"> ' . $title . ' </a>';
                            echo '    <div class="fh5co_latest_trading_date_and_name_color"> Walter Johson - March 7,2017</div>
                            </div>';
                        echo '</div>';
                    echo '</div>';
                                                    }
                                                }
                                                ?>
            
                    
                    
                </div>
            </div>
        </div>
        <div class="container-fluid pb-4 pt-5">
            <div class="container animate-box">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                </div>
                <div class="owl-carousel owl-theme" id="slider2">
                <?php
                $servername = "localhost";
                $db_username = "root";
                $db_password = "";
                $dbname = "gstdb";
                
                $conn = new mysqli($servername, $db_username, $db_password, $dbname);
                
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                                                // Fetch data from the database
                                                $sql = "SELECT * FROM news1"; // Corrected "artical_id" to "article_id"
                                                $result = $conn->query($sql);
                            
                                                if ($result === false) {
                                                    // Check if there was an error with the query
                                                    echo "Error: " . $conn->error;
                                                } else if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $id = $row["id"];
                                                        $title = $row["title"];
                                                        $date = $row["date"];
                                                        $image_data = $row["image"];
                                                        $description = $row["description"];

                                                        //new
                                                        echo ' <div class="item px-2">';
                                                        echo '  <div class="fh5co_hover_news_img">';
                                                                    echo '<div class="fh5co_news_img"><img src="data:image/jpeg;base64,' . base64_encode($image_data) . '" alt=""/></div>';
                                                                    echo '<div>';
                                                                    echo '<a href="single1.php?id=' . $id . '" class="d-block fh5co_small_post_heading">' . $title . '<span class=""></span></a>';
                                                                    echo ' <div class="c_g"><i class="fa fa-clock-o"></i>' . $date . '</div>';                                        echo '</div>';
                                                                    echo ' </div>';
                                                                    echo ' </div>';

                                                                    

                                                                    }
                                                                }
                                                                ?>

                    
                
                </div>
            </div>
        </div>
        <div class="container-fluid fh5co_video_news_bg pb-4">
            <div class="container animate-box" data-animate-effect="fadeIn">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-5 pb-2 mb-4">Video </div>
                </div>
                <div>
                    <div class="owl-carousel owl-theme" id="slider3">
                        <?php
                        $servername = "localhost";
                        $db_username = "root";
                        $db_password = "";
                        $dbname = "gstdb"; // Change DB name

                        // Create connection
                        $conn = new mysqli($servername, $db_username, $db_password, $dbname);

                        // Fetch data from the database
                        $sql = "SELECT img, title, link FROM images";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $image_data = $row["img"];
                                $title = $row["title"];
                                $link = $row["link"];

                                echo '<div class="item px-2">';
                                echo '<div class="fh5co_hover_news_img">';
                                echo '<div class="fh5co_hover_news_img_video_tag_position_relative">';
                                echo '<div class="fh5co_news_img">';
                                echo '<iframe width="100%" height="200" src="'.$link.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
                                echo '</div>';
                               
                                echo '</div>';
                               

                            
                                echo '<div class="pt-2">';
                                echo '<a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">';
                                echo '<span class="">' . $title . '</span></a>'; // Displaying title fetched from the database
                                echo '</div>';

                                echo '</div>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>





      <script>
        const navToggle = document.getElementById('nav-toggle');
const navMenu = document.getElementById('nav-menu');

navToggle.addEventListener('click', () => {
    navMenu.classList.toggle('show');
});

      </script>
             
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
        <script>
             <script src="https://kit.fontawesome.com/cd21e51899.js" crossorigin="anonymous"></script>
    <script src="navbar.js"></script>
        </script>
        <!-- Main -->
        <script src="js/main.js"></script>

        </body>
        </html>