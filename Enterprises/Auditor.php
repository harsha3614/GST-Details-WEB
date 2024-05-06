    <?php
    session_start();

    // Function to handle file uploads
    function uploadFile($folder, $fileKey) {
        try {
            $uploadDirectory = "../$folder/";
            $uploadURL = $folder . '/';
            $filePath = "";

            if (!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0755, true);
            }

            $fileName = $_FILES[$fileKey]['name'];

            if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $uploadDirectory . $fileName)) {
                $filePath = $uploadURL . $fileName;
            }

            return $filePath;

        } catch (Exception $ex) {
            return "Upload Error: " . $ex->getMessage();
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection parameters
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'gstdb';

        // Establish database connection
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Function to sanitize input data
        function sanitizeInput($data) {
            return htmlspecialchars(stripslashes(trim($data)));
        }

        // Sanitize form data
        $fullName = sanitizeInput($_POST["fullName"]);
        $dob = sanitizeInput($_POST["dob"]);
        $gender = sanitizeInput($_POST["gender"]);
        $contactNumber = sanitizeInput($_POST["contactNumber"]);
        $email = sanitizeInput($_POST["email"]);
        $residentialAddress = sanitizeInput($_POST["residentialAddress"]);
        $ain = sanitizeInput($_POST["ain"]);
        $membershipNumber = sanitizeInput($_POST["membershipNumber"]);
        $enrolmentDate = sanitizeInput($_POST["enrolmentDate"]);
        $auditorType = sanitizeInput($_POST["auditorType"]);
        $auditServices = sanitizeInput($_POST["auditServices"]);

        // File Upload Handling
        $uploadDirectory = "../uploads/";
        $photo = uploadFile($uploadDirectory, "photo");
        $aadhaarCard = uploadFile($uploadDirectory, "aadhaarCard");
        $panCard = uploadFile($uploadDirectory, "panCard");

        $enterprise = $_SESSION["Enterprise_Name"];

        // SQL query to insert data into auditor table
        $sql = "INSERT INTO auditors (name, dob, gender, contact_number, email, residential_address, AIN, membership_number, Date_of_Enrolment_as_Auditor, auditor_type, Nature_of_Audit_Services_Offered, photo, aadhar_card, pan_card,Enterprise) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            // Handle the error
            echo "Error preparing statement: " . $conn->error;
        } else {
            $stmt->bind_param("sssssssssssssss", $fullName, $dob, $gender, $contactNumber, $email, $residentialAddress, $ain, $membershipNumber, $enrolmentDate, $auditorType, $auditServices, $photo, $aadhaarCard, $panCard, $enterprise);

            // Execute the query
            if ($stmt->execute()) {
                // Data inserted successfully
                echo "<script>alert('Auditor details added successfully');</script>";
                // Redirect to a confirmation page or perform any other actions
            } else {
                // Error in inserting data
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            // Close statement
            $stmt->close();
        }

        // Close database connection
        $conn->close();
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
        <link rel="stylesheet" href="styles.css">
        <style>
            /* Add any additional styles as needed */

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
                width: 60%;
                background-color: #fff;
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
            }

            /* Additional styles for the form */
            form {
                margin-top: 20px;
            }

            .form-row {
                margin-bottom: 15px;
            }

            label {
                display: block;
                margin-bottom: 5px;
            }

            input,
            select,
            textarea {
                width: 100%;
                padding: 8px;
                box-sizing: border-box;
                margin-top: 5px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            button {
                background-color: #4CAF50;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            button:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <div class="sidebar">
        <div class="profile">
                <a href="profile.php"> <!-- Updated line -->
                    <i class="fas fa-user-circle"></i>
                
                </a> <!-- Updated line -->
            </div>
            <ul class="nav-links">
                <li>
                    <a href="dashboard.php">
                        <i class="fas fa-chart-bar"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="Auditor.php">
                        <i class="fas fa-user-tie"></i>
                        <span>Add Auditors</span>
                    </a>
                </li>
                <li>
                    <a href="projects.php">
                        <i class="fas fa-project-diagram"></i>
                        <span>Projects/Services</span>
                    </a>
                </li>
                <li>
                    <a href="finance.php">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span>Financials</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-comments"></i>
                        <span>Communications</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-cogs"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main-content" style="margin-top:10px;">
            <div class="container">
                <h2>Add Auditors</h2>
                <form id="addAuditorForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <!-- Personal Information -->
                    <div class="form-row">
                        <label for="fullName">Full Name:</label>
                        <input type="text" id="fullName" name="fullName" required>
                    </div>

                    <div class="form-row">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" name="dob" required>
                    </div>

                    <div class="form-row">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <label for="contactNumber">Contact Number:</label>
                        <input type="tel" id="contactNumber" name="contactNumber" required>
                    </div>

                    <div class="form-row">
                        <label for="email">Email Address:</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-row">
                        <label for="residentialAddress">Residential Address:</label>
                        <textarea id="residentialAddress" name="residentialAddress" required></textarea>
                    </div>

                    <!-- Professional Information -->
                    <div class="form-row">
                        <label for="ain">Auditor Identification Number (AIN):</label>
                        <input type="text" id="ain" name="ain" required>
                    </div>

                    <div class="form-row">
                        <label for="membershipNumber">Membership Number:</label>
                        <input type="text" id="membershipNumber" name="membershipNumber">
                    </div>

                    <div class="form-row">
                        <label for="enrolmentDate">Date of Enrolment as Auditor:</label>
                        <input type="date" id="enrolmentDate" name="enrolmentDate" required>
                    </div>

                    <div class="form-row">
                        <label for="auditorType">Auditor Type:</label>
                        <select id="auditorType" name="auditorType" required>
                            <option value="internal">Internal</option>
                            <option value="external">External</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <label for="auditServices">Nature of Audit Services Offered:</label>
                        <textarea id="auditServices" name="auditServices"></textarea>
                    </div>

                    <div class="form-row">
                        <label for="photo">Photo:</label>
                        <input type="file" id="photo" name="photo" accept=".jpg, .jpeg, .png" required>
                    </div>

                    <div class="form-row">
                        <label for="aadhaarCard">Aadhaar Card:</label>
                        <input type="file" id="aadhaarCard" name="aadhaarCard" accept=".pdf, .doc, .docx" required>
                    </div>

                    <div class="form-row">
                        <label for="panCard">PAN Card:</label>
                        <input type="file" id="panCard" name="panCard" accept=".pdf, .doc, .docx" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- Add any additional JavaScript libraries or scripts as needed -->
    </body>
    </html>
        