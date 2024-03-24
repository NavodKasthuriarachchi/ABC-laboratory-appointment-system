<?php
// Start the session
session_start();

// Check if the patient ID is set in the session
if (!isset($_SESSION['damsid'])) {
    // Redirect to the login page or handle the situation where the patient ID is not set
    // For example:
    // header("Location: login.php");
    // exit();
}

// Database connection details
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "damsmsdb";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the uploaded files from the database based on patient ID
if(isset($_SESSION['damsid'])) {
    $patient_id = $_SESSION['damsid']; // Assuming you have stored patient ID in session

    $sql = "SELECT * FROM tblreport WHERE patient = $patient_id";
    $result = $conn->query($sql);

    // Check for errors
    if (!$result) {
        die("Error: " . $conn->error);
    }
} else {
    // Handle the situation where the patient ID is not set in the session
    // For example, redirect to login page
    // header("Location: login.php");
    // exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uploaded files</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5" style="position: relative; top: 200px;">
    <h2>Uploaded Files</h2>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>File Name</th>
            <th>File Size</th>
            <th>File Type</th>
            <th>Upload Date</th>
            <th>Test</th>
            <th>Patient</th>
            <th>Appointment Number</th>
            <th>Download</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Display the uploaded files and download links
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $file_path = "../report/uploads/" . $row['filename'];
                ?>
                <tr>
                    <td><?php echo $row['filename']; ?></td>
                    <td><?php echo $row['filesize']; ?> bytes</td>
                    <td><?php echo $row['filetype']; ?></td>
                    <td><?php echo $row['upload_date']; ?></td>
                    <td><?php echo $row['test']; ?></td>
                    <td><?php echo $row['patient']; ?></td>
                    <td><?php echo $row['appointmentnumber']; ?></td>
                    <td><a href="<?php echo $file_path; ?>" class="btn btn-primary" download>Download</a></td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="7">No files uploaded yet.</td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
$conn->close();
?>
