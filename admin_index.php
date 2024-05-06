<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<!-- ... (your existing head section) ... -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GST</title>
    <link href="css/media_query.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="css/owl.theme.default.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap CSS -->
    <link href="css/style_1.css" rel="stylesheet" type="text/css"/>
    <!-- Modernizr JS -->
    <script src="js/modernizr-3.5.0.min.js"></script>
    <style>
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
h1 {
    font-size: 2em;
    margin-bottom: 0.5em;
}
ul {
    list-style: none;
    padding: 0;
}
li {
    margin-bottom: 0.5em;
}
a {
    color: blue;
    text-decoration: none;
}
a:hover {
    text-decoration: underline;
}
#header {
    background: #fff;
}
#features {
    background: #d1eaf8f0;
}
.header a i {
    color: #000;
}
.box {
    background: #d1eaf8f0;
    padding: 20px;
    display: flex;
    align-items: center;
}
.pdf-icon {
    font-size: 24px;
    margin-right: 10px;
}

.container-fluid {
    overflow: hidden;
}

.topnav {
    background-color: #333;
    position: relative;
}

.topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.topnav a:hover {
    background-color: #ddd;
    color: black;
}

.dropdown {
    float: left;
    overflow: hidden;
}

.dropdown .dropbtn {
    font-size: 16px;  
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.topnav .dropdown:hover .dropdown-content {
    display: block;
}
</style>
</head>
<body>

<!-- ... (your existing HTML code) ... -->

<div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
<!-- Top Navigation Bar -->
<div class="container-fluid topnav">
<!-- Top Navigation Bar -->
<a href="index.php">Home</a>
<a href="profile.php">Profile</a>
<a href="rules.html">GST Rules</a>
<a href="rates.html">GST Rates</a>
<a href="act.html">GST Act</a>
<a href="expenses.html">Expences</a>
<a href="income.php">Income</a>
<a href="supplies.html">Supplies</a>
<a href="chatpage.php">Discussion Forum</a>
<a href="logout.php">Logout</a>
</div>


<div class="container-fluid pt-3">
<div class="container animate-box" data-animate-effect="fadeIn">
<div>
    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
</div>
<div class="owl-carousel owl-theme js" id="slider1">
    <?php
    // ... (your existing database connection code) ...
    $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $dbname = "gstdb";
        
        $conn = new mysqli($servername, $db_username, $db_password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

    // Fetch data from the database
    $sql = "SELECT article_id, title, img, description FROM news";
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

            echo '<div class="item px-2">';
            echo '<div class="fh5co_latest_trading_img_position_relative">';
            echo '<div class="fh5co_latest_trading_img"><img src="data:image/jpeg;base64,' . base64_encode($image_data) . '" alt="" class="fh5co_img_special_relative"/></div>';
            echo '<div class="fh5co_latest_trading_img_position_absolute"></div>';
            echo '<div class="fh5co_latest_trading_img_position_absolute_1">';
            echo '<a href="single.php?id=' . $article_id . '"  class="text-white">' . $title . '</a>';
            echo '<div class="fh5co_latest_trading_date_and_name_color"> Walter Johson - March 7, 2017</div>';
            
            // Add delete button
            echo '<form method="post" action="delete_news.php">';
            echo '<input type="hidden" name="article_id" value="' . $article_id . '">';
            echo '<button type="submit" class="btn btn-danger btn-sm">Delete</button>';
            echo '</form>';

            echo '</div>';
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
                                                            echo ' <div class="c_g"><i class="fa fa-clock-o"></i>' . $date . '</div>';   
                                                            
                                                                // Add delete button
            echo '<form method="post" action="delete_news.php">';
            echo '<input type="hidden" name="article_id" value="' . $article_id . '">';
            echo '<button type="submit" class="btn btn-danger btn-sm">Delete</button>';
            echo '</form>';

                                                            echo '</div>';
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

                            // Add delete button
                echo '<form method="post" action="delete_news.php">';
                echo '<input type="hidden" name="article_id" value="' . $article_id . '">';
                echo '<button type="submit" class="btn btn-danger btn-sm">Delete</button>';
                echo '<button type="submit" class="btn btn-danger btn-sm">Add</button>';
                echo '</form>';

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





                        
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Notifications</div>
                </div>
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="update.png" alt=""/></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a href="single.html" class="fh5co_magna py-2">GST net widens for real estate firms. </a> <a href="single.html" class="fh5co_mini_time py-3"> Written by Raghavendra KamathPriyansh Verma
November 20, 2023 00:10 IST </a>
                        <div class="fh5co_consectetur"> The Directorate General of GST Intelligence (DGGI) is understood to be sending notices to various real estate companies, demanding that GST be paid for a clutch of transactions among group companies or joint venture partners.

The move is seen as part of a strategy to widen the tax net for the sector.

Fees for management services and royalty charged for use of brand names are among the services that the DGGI finds taxable at 18%, the GST slab for most services.
                        </div>
                    </div>
                </div>
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="update1.png" alt=""/></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <a href="single.html" class="fh5co_magna py-2"> Poonawala Fincorp shares down on Rs 2,87-lakh penalty for excess GST claim </a> <a href="#" class="fh5co_mini_time py-3"> NOVEMBER 20, 2023 / 11:09 AM IST </a>
                        <div class="fh5co_consectetur"> Shares of Poonawala Fincorp were trading marginally lower on November 20 morning after the company received an order from the office of the Assistant Commissioner of Central Tax, imposing a penalty.

At 9:35am, Poonawalla Fincorp was quoting Rs 370.35, down Rs 0.65, or 0.18 percent, on the BSE.

The penalty of Rs 2.87 lakh levied for excess claim of GST input and said the penalty pertains to FY 2017-18, FY2018-19 and FY2019-20. The penalty levied for GST input claimed in excess of amount reported in GSTR2A, the order said.
                        </div>
                        <!-- <ul class="fh5co_gaming_topikk pt-3">
                            <li> Why 2017 Might Just Be the Worst Year Ever for Gaming</li>
                            <li> Ghost Racer Wants to Be the Most Ambitious Car Game</li>
                            <li> New Nintendo Wii Console Goes on Sale in Strategy Reboot</li>
                            <li> You and Your Kids can Enjoy this News Gaming Console</li>
                        </ul> -->
                    <!-- </div>
                </div>
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img">
                                <img src="images/photo-1449157291145-7efd050a4d0e-578x362.jpg" alt=""/>
                            </div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <a href="single.html" class="fh5co_magna py-2"> Magna aliqua ut enim ad minim veniam quis
                        nostrud quis xercitation ullamco. </a> <a href="#" class="fh5co_mini_time py-3"> Thomson Smith -
                        April 18,2016 </a>
                        <div class="fh5co_consectetur"> Quis nostrud xercitation ullamco laboris nisi aliquip ex ea commodo
                            consequat.
                        </div>
                    </div>
                </div>
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="images/office-768x512.jpg" alt=""/></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <a href="single.html" class="fh5co_magna py-2"> Magna aliqua ut enim ad minim veniam quis
                        nostrud quis xercitation ullamco. </a> <a href="#" class="fh5co_mini_time py-3"> Thomson Smith -
                        April 18,2016 </a>
                        <div class="fh5co_consectetur"> Amet consectetur adipisicing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                </div> -->
                <!-- <div class="clearfix"></div>
                <div class="fh5co_tags_all">
                    <a href="#" class="fh5co_tagg">Business</a>
                    <a href="#" class="fh5co_tagg">Technology</a>
                    <a href="sports.php" class="fh5co_tagg">Sport</a>
                    <a href="#" class="fh5co_tagg">Art</a>
                    <a href="#" class="fh5co_tagg">Lifestyle</a>
                    <a href="#" class="fh5co_tagg">Three</a>
                    <a href="#" class="fh5co_tagg">Photography</a>
                    <a href="#" class="fh5co_tagg">Lifestyle</a>
                    <a href="#" class="fh5co_tagg">Art</a>
                    <a href="#" class="fh5co_tagg">Education</a>
                    <a href="#" class="fh5co_tagg">Social</a>
                    <a href="#" class="fh5co_tagg">Three</a>
                </div> -->
                <!-- <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="images/download (1).jpg" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="images/allef-vinicius-108153.jpg" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Enim ad minim veniam nostrud xercitation ullamco.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="images/download (2).jpg" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-5 align-self-center"><img src="images/seth-doyle-133175.jpg" alt="img"
                                                            class="fh5co_most_trading"/></div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"> Magna aliqua ut enim ad minim veniam quis nostrud.</div>
                        <div class="most_fh5co_treding_font_123"> April 18, 2016</div>
                    </div>
                </div>
            </div>
        </div>
        -->
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
<!-- Main -->
<script src="js/main.js"></script>

</body>
</html>

