<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['damsid']) == 0) {
    header('location:logout.php');
} else {
    $sql_new = "SELECT * from  tblappointment where Status is null";
    $sql_approved = "SELECT * from  tblappointment where Status='Approved'";
    $sql_cancelled = "SELECT * from  tblappointment where Status='Cancelled'";
    $sql_total = "SELECT * from  tblappointment";

    $query_new = $dbh->prepare($sql_new);
    $query_new->execute();
    $totnewapt = $query_new->rowCount();

    $query_approved = $dbh->prepare($sql_approved);
    $query_approved->execute();
    $totappapt = $query_approved->rowCount();

    $query_cancelled = $dbh->prepare($sql_cancelled);
    $query_cancelled->execute();
    $totncanapt = $query_cancelled->rowCount();

    $query_total = $dbh->prepare($sql_total);
    $query_total->execute();
    $totapt = $query_total->rowCount();
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
        <!--============= start main area -->


        <?php include_once('includes/header.php'); ?>

        <?php include_once('includes/sidebar.php'); ?>



        <!-- APP MAIN ==========-->
        <div class="row">
        <div class="wrap">
            <section id="dash-content">

<!-- Buttons for the middle area -->
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
            <button class="btn btn-secondary" style="padding: 50px 78px; background-color: #FFD700; color: #ffffff;"> <!-- Add custom padding here -->
                Lab Appointment Details
            </button>
        </div>
		<br>
        <div class="col-auto mb-3" style="margin-right: 20px;"> <!-- Add custom margin-right here -->
		<a href="">
            <button class="btn btn-success" style="padding: 50px 70px; background-color: #28a745; color: #ffffff;"> <!-- Add custom padding here -->
                Doctors appointment details
            </button>
        </div>
		<br>
        <div class="col-auto mb-3" style="margin-right: 20px;">
		<a href="">
            <button class="btn btn-danger" style="padding: 50px 65px; background-color: #dc3545; color: #ffffff;"> <!-- Add custom padding here -->
			 Lab Tests appointment details
            </button>
        </div>
    </div>
</div>


                        <div class="row">

                    </div><!-- #dash-content -->
            </div><!-- .wrap -->
            <!-- APP FOOTER -->
            <?php include_once('includes/footer.php'); ?>
            <!-- /#app-footer -->
        </main>
        <!--========== END app main -->

        <?php include_once('includes/customizer.php'); ?>



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
<?php } ?>
