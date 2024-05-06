<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

 

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <style>
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
    }

    .pad {
      padding-top: 100px; /* Adjusted padding to give space for the header */
    }

   

   

    .left-half {
      float: left;
      width: 50%;
    }

    .right-half {
      width: 50%;
      float: right;
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
      padding: 0 20px; /* Adjusted padding */
    }

    .nav__logo {
      font-size: 1.5rem;
      text-decoration: none;
      color: #fff;
      font-weight: bold;
    }

    .nav__menu {
      display: flex;
      align-items: center;
    }

    .nav__list {
      display: flex;
      list-style: none;
      margin: 0; /* Removed margin */
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

  <title>GST Calculator: Calculate Your GST Amount Online</title>
</head>

<body>

  <header class="header" id="header">
    <nav class="nav">
      <a href="#" class="nav__logo">GSTPro</a>
      <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
          <li class="nav__item"><a href="index.php" class="nav__link">Home</a></li>
          <li class="nav__item"><a href="profile.php" class="nav__link">Profile</a></li>
          <li class="nav__item"><a href="rules.php" class="nav__link">GST Rules</a></li>
          <li class="nav__item"><a href="rates.php" class="nav__link">Tax & Compliance</a></li>
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
          <li class="nav__item"><a href="enterpriselist.php" class="nav__link">Enterprise</a></li>
          <li class="nav__item"><a href="chatpage.php" class="nav__link">Discussion Forum</a></li>
          <li class="nav__item"><a href="login.php" class="nav__link">Logout</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <div class="container pad">
    <div class="left-half">
      <div class="row">
        <div class="col s12">
          <h3>Calculate Your GST Amount Online</h3>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="cp" type="number" class="validate">
          <label for="cp">Cost Of Product</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="gp" type="number" class="validate">
          <label for="gp">GST Percentage</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12 centered-text">
          <button class="btn waves-effect waves-light blue darken-1" type="submit" name="action" onclick="gst()">CALCULATE
            <i class="material-icons left">calculate</i>
          </button>
          <button class="btn waves-effect waves-light red darken-1" type="submit" name="action" onclick="clr()">CLEAR
            <i class="material-icons left">clear</i>
          </button>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Output</span>
              <p>Inclusive GST Amount: <span id="inclusive"></span></p>
              <p>Exclusive GST Amount: <span id="exclusive"></span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="right-half"></div>
  </div>

  <script>
    function gst() {
      var a, b, c, inclusive, exclusive;
      a = Number(document.getElementById("cp").value);
      b = Number(document.getElementById("gp").value);
      inclusive = a + (b * a) / 100;
      exclusive = a * (b / 100);
      document.getElementById("inclusive").textContent = inclusive.toFixed(2);
      document.getElementById("exclusive").textContent = exclusive.toFixed(2);
    }

    function clr() {
      document.getElementById("inclusive").textContent = "";
      document.getElementById("exclusive").textContent = "";
      document.getElementById("cp").value = "";
      document.getElementById("gp").value = "";
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>
