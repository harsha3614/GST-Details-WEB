<!DOCTYPE html>
<html lang="en">

<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<title>Add Videos</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
<link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
<style>
    body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            background-color: #f4f4f4;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .container {
            margin-top: 3rem;
        }

        .card {
            border: none;
            width: 70%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .image {
            position: relative;
        }

        .image span {
            background-color: blue;
            color: #fff;
            padding: 6px;
            height: 30px;
            width: 30px;
            border-radius: 50%;
            font-size: 13px;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            top: -0px;
            right: 0px;
        }

        .user-details h4 {
            color: blue;
        }

        .ratings {
            font-size: 30px;
            font-weight: 600;
            display: flex;
            justify-content: left;
            align-items: center;
            color: #f9b43a;
        }

        .user-details span {
            text-align: left;
        }

        .inputs label,
        .about-inputs label {
            display: flex;
            margin-left: 3px;
            font-weight: 500;
            font-size: 13px;
            margin-bottom: 4px;
        }

        .inputs input,
        .about-inputs textarea {
            font-size: 14px;
            height: 40px;
            border: 2px solid #ced4da;
            width: 100%;
            margin-bottom: 10px;
        }

        .inputs input:focus,
        .about-inputs textarea:focus {
            box-shadow: none;
            border: 2px solid blue;
        }

        .btn {
            font-weight: 600;
        }

        .btn:focus {
            box-shadow: none;
        }

        .sidebar {
            width: 70px;
            background: linear-gradient(to right, #36D1DC, #5B86E5);
            color: #fff;
            padding-top: 20px;
            transition: width 0.3s ease;
            position: fixed;
            height: 100%;
        }

        .profile {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile i {
            font-size: 40px;
            color: #fff;
        }

        .profile span {
            display: block;
            margin-top: 10px;
            font-size: 12px;
        }

        .nav-links {
            list-style: none;
            padding: 0;
            text-align: center;
        }

        .nav-links li {
            margin-bottom: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .nav-links i {
            margin-bottom: 5px;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .nav-links a span {
            display: none;
            position: absolute;
            top: 50%;
            left: 70px;
            transform: translate(-50%, -50%);
            white-space: nowrap;
            background-color: #333;
            color: #fff;
            padding: 5px;
            border-radius: 5px;
        }

        .nav-links a:hover i {
            opacity: 1;
        }

        .nav-links a:hover span {
            display: inline;
        }
</style>
</head>

<body class='snippet-body'>
<div class="sidebar">
    <div class="profile">
        <i class="fas fa-user-circle"></i>
        <span>Admin</span>
    </div>
    <ul class="nav-links">
            <li>
                <a href="dashboard.html">
                    <i class="fas fa-chart-bar"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-users"></i>
                    <span>User Management</span>
                </a>
            </li>
            <li>
                 <a href="AddEnterprises.php">
                    <i class="fas fa-building"></i>
                    <span>Add Enterprises</span>
                </a>
            </li>
            
            <li>
                <a href="addnews.php">
                    <i class="fas fa-newspaper"></i>
                    <span>Add News</span>
                </a>
            </li>
            <li>
                <a href="addvideos.php">
                    <i class="fas fa-video"></i>
                    <span>Add Videos</span>
                </a>
            </li>
            <li>
                <a href="addrates.php">
                    <i class="fas fa-percent"></i>
                    <span>Add GST Rates</span>
                </a>
            </li>
        </ul>
</div>
<div class="container mt-3">
    <div class="card p-3 text-center">
       
        <div class="d-flex flex-row justify-content-center mb-3">
            <div class="d-flex flex-column ms-3 user-details"></div>
        </div>
        <h4>Add Videos</h4>
        <form action="addvideos.php" method="POST" enctype="multipart/form-data">
            <div class="row">
            
<div class="col-md-6">
    <div class="inputs">
        <label>Title</label>
        <input class="form-control" type="text" name="title" placeholder="Title">
    </div>
</div>
<div class="col-md-6">
    <div class="inputs">
        <label>Video URL</label>
        <input class="form-control" type="text" name="video_url" placeholder="Video URL">
    </div>
</div>
<div class="col-md-6">
    <div class="inputs">
        <label>Image</label>
        <input class="form-control" type="file" name="image" placeholder="Image">
    </div>
</div>
</div>

            <div class="mt-3 gap-2 d-flex justify-content-end">
                <button class="px-3 btn btn-sm btn-outline-primary">Cancel</button>
                <button class="px-3 btn btn-sm btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
<script type='text/javascript'
    src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
<script type='text/javascript' src='https://kit.fontawesome.com/a076d05399.js'></script>
<script type='text/javascript'>
    var myLink = document.querySelector('a[href="#"]');
    myLink.addEventListener('click', function (e) {
        e.preventDefault();
    });

    // Toggle Sidebar
    var menuToggle = document.getElementById('menu-toggle');
    var sidebar = document.querySelector('.sidebar');
    menuToggle.addEventListener('click', function () {
        sidebar.classList.toggle('active');
    });
</script>
</body>

</html>
