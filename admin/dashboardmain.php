<?php
session_start();
error_reporting(0);
include('db/dbconnection.php');

if (strlen($_SESSION['damsid']) == 0) {
    header('location:logout.php');
    exit();
} else {
    $dbConnection = DBConnection::getInstance();
    $dbh = $dbConnection->getConnection();

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ABC - Dashboard</title>
    <link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
        <!-- build:css assets/css/app.min.css -->
        <link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
        <link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
        <link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/core.css">
        <link rel="stylesheet" href="assets/css/app.css">
        <!-- endbuild -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
        <script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
        <script>
            Breakpoints();
        </script>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
    <?php include_once('includes/header.php'); ?>
    <?php include_once('includes/sidebar.php'); ?>

    <!-- Main content area -->
    <div class="row">
        <div class="wrap">
            <section id="dash-content">
            <div class="text-center" style="margin-top: 150px;"> <!-- Add custom margin-top here -->
    <div class="row justify-content-center">
        <div class="col-auto mb-3" style="margin-right: 20px;"> <!-- Add custom margin-right here -->
		<a href="testingdashboard.php">
            <button class="btn btn-primary" style="padding: 50px 82px; background-color: #007bff; color: #ffffff;"> <!-- Add custom padding here -->
                Doctors Appointment details
            </button>
        </div>
		<br>
        <div class="col-auto mb-3" style="margin-right: 20px;"> <!-- Add custom margin-right here -->
		<a href="labtest/dashboard.php">
            <button class="btn btn-secondary" style="padding: 50px 95px; background-color: #FFD700; color: #ffffff;"> <!-- Add custom padding here -->
                Lab Appointment Details
            </button>
        </div>
		<br>
        <div class="col-auto mb-3" style="margin-right: 20px;"> <!-- Add custom margin-right here -->
		<a href="../report/index.php">
            <button class="btn btn-success" style="padding: 50px 110px; background-color: #28a745; color: #ffffff;"> <!-- Add custom padding here -->
                Upload Test Reports
            </button>
        </div>
		<br>
        <div class="col-auto mb-3" style="margin-right: 20px;">
		<a href="search.php">
            <button class="btn btn-danger" style="padding: 50px 79px; background-color: #dc3545; color: #ffffff;"> <!-- Add custom padding here -->
			 Lab Tests appointment details
            </button>
        </div>
    </div>
</div>

    <?php include_once('includes/footer.php'); ?>

     <!-- build:js assets/js/core.min.js -->
     <script src="libs/bower/jquery/dist/jquery.js"></script>
        <script src="libs/bower/jquery-ui/jquery-ui.min.js"></script>
        <script src="libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
        <script src="libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
        <script src="libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
        <script src="libs/bower/PACE/pace.min.js"></script>
        <!-- endbuild -->

        <!-- build:js assets/js/app.min.js -->
        <script src="assets/js/library.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/app.js"></script>
        <!-- endbuild -->
        <script src="libs/bower/moment/moment.js"></script>
        <script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
        <script src="assets/js/fullcalendar.js"></script>
</body>

</html>
