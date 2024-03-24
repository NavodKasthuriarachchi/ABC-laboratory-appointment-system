<?php
session_start();
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $mobno = $_POST['mobno'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Perform server-side validation if required

    try {
        // Check if the email already exists
        $query = $dbh->prepare("SELECT Email FROM tblpatient WHERE Email = ?");
        $query->execute([$email]);
        $existingEmail = $query->fetchColumn();

        if ($existingEmail) {
            echo "<script>alert('Email already exists. Please try again with a different email.');</script>";
        } else {
            // Insert data into the database
            $sql = "INSERT INTO tblpatient (FullName, MobileNumber, Email, Password) VALUES (?, ?, ?, ?)";
            $stmt = $dbh->prepare($sql);
            $result = $stmt->execute([$fname, $mobno, $email, md5($password)]);

            if ($result) {
                echo "<script>alert('You have signed up successfully');</script>";
            } else {
                throw new Exception("Error: Data insertion failed.");
            }
        }
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>
