<?php
// Assuming you have a form that submits the updated status and id
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required fields are set in the POST data
    if (isset($_POST['status']) && isset($_POST['counselingId'])) {
        // Sanitize and validate the input data
        $newStatus = $_POST['status'];
        $id = $_POST['counselingId'];

        // Update the 'Status' field in the database
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'gstdb';

        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Update the 'Status' field in the table
        $sql_update = "UPDATE add_service SET auditor_status = ? WHERE id = ?";
        $stmt = $conn->prepare($sql_update);
        $stmt->bind_param("si", $newStatus, $id);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "Error updating status: " . $stmt->error;
        }

        // Close the database connection
        $stmt->close();
        mysqli_close($conn);
    } else {
        echo "Both 'status' and 'id' must be set in the POST data";
    }
}
?>
