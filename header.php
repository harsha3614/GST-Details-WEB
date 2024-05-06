<!DOCTYPE html>
     
        <html lang="en" class="no-js">
        <head>
            
            
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
/* Header Styles */
.header {
    background-color: #0056b3;
    color: #fff;
    padding: 20px 0;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 999;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav__logo {
    font-size: 1.5rem;
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}

.nav__toggle {
    display: none;
    cursor: pointer;
}

.nav__menu {
    display: flex;
    align-items: center;
}

.nav__list {
    display: flex;
    list-style: none;
}

.nav__item {
    margin-right: 20px;
    position: relative; /* Added position relative for dropdown positioning */
}

.nav__link {
    text-decoration: none;
    color: #fff;
    transition: color 0.3s ease;
}

.nav__link:hover {
    color: #ffc107;
}

/* Dropdown Styles */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #0056b3;
    min-width: 160px;
    z-index: 9999;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    left: 0;
    top: 100%; /* Position dropdown below the parent item */
}

.dropdown-content a {
    color: #fff;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #ffc107;
}

.dropdown:hover .dropdown-content {
    display: block;
}



      
    </style>
        </head>
        <body>
        <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">GST</a>
            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-line"></i>
            </div>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="index.php" class="nav__link">Home</a></li>
                    <li class="nav__item"><a href="profile.php" class="nav__link">Profile</a></li>
                    <li class="nav__item"><a href="rules.php" class="nav__link">GST Rules</a></li>
                    <!-- <li class="nav__item"><a href="rates.php" class="nav__link">Tax & Compliance</a></li> -->
                    <li class="nav__item dropdown">
                        <a href="#" class="nav__link">Goods & Service Tax <i class="ri-arrow-down-s-line"></i></a>
                        <div class="dropdown-content">
                            <a href="#">GST Registration</a>
                            <a href="#">GST Return Filing</a>
                            <a href="#">GST LUT Filing</a>
                            <a href="#">GST Registration Cancellation</a>
                            <a href="#">GST Annual Return</a>
                            <a href="#">GST Invoicing</a>
                            <a href="#">GST eInvoicing</a>
                            <a href="#">eWay Bill</a>
                            <a href="#">Input Tax Credit</a>
                            <a href="#">GST Software for Accountants</a>
                        </div>
                    </li>
                    <li class="nav__item"><a href="enterpriselist.php" class="nav__link">Services</a></li>
                    <li class="nav__item"><a href="chatpage.php" class="nav__link">Discussion Forum</a></li>
                    <li class="nav__item"><a href="login.php" class="nav__link">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
    