<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enterpriseName = $_POST["enterpriseName"];
    $enterpriseType = $_POST["enterpriseType"];
    $registrationNumber = $_POST["registrationNumber"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phoneNumber = $_POST["phoneNumber"];
    $gstin = $_POST["gstin"];
    $taxRegistrationType = $_POST["taxRegistrationType"];
    $bankName = $_POST["bankName"];
    $accountNumber = $_POST["accountNumber"];
    $ifscCode = $_POST["ifscCode"];
    $authorizedSignatory = $_POST["authorizedSignatory"];
    $designation = $_POST["designation"];
    $natureOfBusiness = $_POST["natureOfBusiness"];
    $commencementDate = $_POST["commencementDate"];
    $certificateOfIncorporation = $_FILES["certificateOfIncorporation"];

    $panCard = $_POST["PAN_Card"];
    $aadhaarCard = $_POST["Aadhaar_Card"];

    // File Upload Handling
    $uploadDirectory = "../uploads/";
    $certificateOfIncorporation = uploadImageFile($uploadDirectory, "certificateOfIncorporation");


    // Include database connection code here
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'gstdb';
    
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO enterprise_list (Enterprise_Name, Enterprise_Type, Registration_Number, Address, Email_Address, Password ,Phone_Number, GSTIN, Tax_Registration_Type, Bank_Name, Account_Number, IFSC_Code, Authorized_Signatory, Designation, Nature_of_Business, Date_of_Commencement, Certificate_of_Incorporation, PAN_Card, Aadhaar_Card) 
    VALUES ('$enterpriseName', '$enterpriseType', '$registrationNumber', '$address', '$email','$password', '$phoneNumber', '$gstin', '$taxRegistrationType', '$bankName', '$accountNumber', '$ifscCode', '$authorizedSignatory', '$designation', '$natureOfBusiness', '$commencementDate', '$certificateOfIncorporation', '$panCard', '$aadhaarCard')";


  // ... (your existing PHP code)

if (mysqli_query($conn, $sql)) {
    // Data inserted successfully
    echo "<script>alert('Data inserted successfully');</script>";
    echo "<script>window.location.href = 'AddEnterprises.php';</script>";
    exit(); // terminate script execution after redirection
} else {
    // Error in inserting data
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}

function uploadImageFile($folder, $fileKey) {
    try {
        $uploadDirectory = "../$folder/";
        $uploadURL = $folder . '/';
        $imageFilePath = "";

        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        $fileExt = pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION);

        if (in_array($fileExt, ['jpeg', 'jpg', 'png', 'gif', 'PNG', 'jfif', 'pdf'])) {
            $newFileName = date("YmdHis") . "." . $fileExt;
            $uploadPath = $uploadDirectory . $newFileName;

            if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $uploadPath)) {
                $imageFilePath = $uploadURL . $newFileName;
            }
        }

        return $imageFilePath;

    } catch (Exception $ex) {
        return "Upload Error: " . $ex->getMessage();
    }
}

?>


    
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            background-color: #f4f4f4;
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

        .main-content {
            flex: 1;
            padding: 20px;
            margin-left: 70px;
            transition: margin-left 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 0 auto;
        }

        .form-section {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
        }

        #addEnterpriseForm label {
            display: block;
            margin-bottom: 5px;
        }

        #addEnterpriseForm input,
        #addEnterpriseForm textarea,
        #addEnterpriseForm select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #addEnterpriseForm button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #addEnterpriseForm button:hover {
            background-color: #45a049;
        }
    </style>
    </head>
    <body>
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

    <div class="main-content">
        <div class="container">
        <form id="addEnterpriseForm" class="form-section" method="POST" enctype="multipart/form-data">

                <h2>Enter Enterprise Details</h2>
               
                <!-- Enterprise Information -->
                <label for="enterpriseName">Enterprise Name:</label>
                <input type="text" id="enterpriseName" name="enterpriseName" required>

                <label for="enterpriseType">Enterprise Type:</label>
                <input type="text" id="enterpriseType" name="enterpriseType" required>

                <label for="registrationNumber">Registration Number:</label>
                <input type="text" id="registrationNumber" name="registrationNumber" required>

                <!-- Contact Details -->
                <label for="address">Address:</label>
                <textarea id="address" name="address" required></textarea>

                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="phoneNumber">Phone Number:</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" required>

                <!-- Tax Details -->
                <label for="gstin">GST Identification Number (GSTIN):</label>
                <input type="text" id="gstin" name="gstin" required>

                <label for="taxRegistrationType">Tax Registration Type:</label>
                <input type="text" id="taxRegistrationType" name="taxRegistrationType" required>

                <!-- Bank Details -->
                <label for="bankName">Bank Name:</label>
                <input type="text" id="bankName" name="bankName" required>

                <label for="accountNumber">Account Number:</label>
                <input type="text" id="accountNumber" name="accountNumber" required>

                <label for="ifscCode">IFSC Code:</label>
                <input type="text" id="ifscCode" name="ifscCode" required>

                <!-- Authorized Personnel -->
                <label for="authorizedSignatory">Authorized Signatory:</label>
                <input type="text" id="authorizedSignatory" name="authorizedSignatory" required>

                <label for="designation">Designation:</label>
                <input type="text" id="designation" name="designation" required>

                <!-- Additional Information -->
                <label for="natureOfBusiness">Nature of Business:</label>
                <textarea id="natureOfBusiness" name="natureOfBusiness" required></textarea>

                <label for="commencementDate">Date of Commencement:</label>
                <input type="date" id="commencementDate" name="commencementDate" required>

                <!-- Document Uploads -->
                <label for="certificateOfIncorporation">Certificate of Incorporation:</label>
                <input type="file" id="certificateOfIncorporation" name="certificateOfIncorporation" accept=".pdf, .doc, .docx" required>



                <!-- PAN Card -->
    <label for="panCard">PAN Card:</label>
    <input type="text" id="panCard" name="PAN_Card" placeholder="Enter PAN Card Number" required>

    <!-- Aadhaar Card -->
    <label for="aadhaarCard">Aadhaar Card of Authorized Signatory:</label>
    <input type="text" id="aadhaarCard" name="Aadhaar_Card" placeholder="Enter Aadhaar Card Number" required>


                <!-- Submit Button -->
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>

   