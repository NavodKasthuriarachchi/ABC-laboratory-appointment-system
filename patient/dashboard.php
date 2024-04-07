<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['damsid'] == 0)) {
    header('location:logout.php');
} else {
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>ABC - Dashboard</title>

    <link rel="stylesheet" href="../doctor/libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../doctor/libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
    <!-- build:css assets/css/app.min.css -->
    <link rel="stylesheet" href="../doctor/libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="../doctor/libs/bower/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="../doctor/libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="../doctor/assets/css/bootstrap.css">
    <link rel="stylesheet" href="../doctor/assets/css/core.css">
    <link rel="stylesheet" href="../doctor/assets/css/app.css">
    <!-- endbuild -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <script src="../doctor/libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
    <script>
        Breakpoints();
    </script>
</head>


<body class="menubar-left menubar-unfold menubar-light theme-primary">
    <!--============= start main area -->

    <!-- Including the header -->
    <?php include_once('includes/header.php'); ?>

    <!-- Including the sidebar -->
    <?php include_once('includes/sidebar.php'); ?>

    <!-- APP MAIN ==========-->

    <div class="row">
        <div class="wrap">
            <section id="dash-content">

<!-- Buttons for the middle area -->
<div class="text-center" style="margin-top: 150px;"> <!-- Add custom margin-top here -->
    <div class="row justify-content-center">
        <div class="col-auto mb-3" style="margin-right: 20px;"> <!-- Add custom margin-right here -->
		<a href="docbooking.php">
            <button class="btn btn-primary" style="padding: 50px 82px; background-color: #007bff; color: #ffffff;"> <!-- Add custom padding here -->
                Appointment for Doctors
            </button>
        </div>
		<br>
        <div class="col-auto mb-3" style="margin-right: 20px;"> <!-- Add custom margin-right here -->
		<a href="bookingtest.php">
            <button class="btn btn-secondary" style="padding: 50px 78px; background-color: #FFD700; color: #ffffff;"> <!-- Add custom padding here -->
                Appointment for Lab Tests
            </button>
        </div>
		<br>
        <div class="col-auto mb-3" style="margin-right: 20px;"> <!-- Add custom margin-right here -->
		<a href="testresult.php">
            <button class="btn btn-success" style="padding: 50px 102px; background-color: #28a745; color: #ffffff;"> <!-- Add custom padding here -->
                Download Reports
            </button>
        </div>
		<br>
        <div class="col-auto mb-3" style="margin-right: 20px;">
		<a href="search.php">
            <button class="btn btn-danger" style="padding: 50px 65px; background-color: #dc3545; color: #ffffff;"> <!-- Add custom padding here -->
			 Lab Tests appointment details
            </button>
        </div>
    </div>
</div>







                <!-- Your HTML content for appointment search interface -->
                <!-- <form method="post" action="">
                    <input type="text" name="searchdata" placeholder="Search..." required>
                    <button type="submit" name="search">Search</button>
                </form> -->

                <?php
                // Display search results if available
                if (isset($appointments)) {
                    foreach ($appointments as $appointment) {
                        echo "<p>{$appointment->AppointmentNumber}, {$appointment->Name}, {$appointment->MobileNumber}</p>";
                    }
                }
                ?>

            </section><!-- #dash-content -->
        </div><!-- .wrap -->

        <!-- APP FOOTER -->
        <?php include_once('../doctor/includes/footer.php'); ?>
        <!-- /#app-footer -->

    </div>

    <!--========== END app main -->

    <!-- Including the customizer -->
    <?php include_once('../doctor/includes/customizer.php'); ?>

    <!-- build:js assets/js/core.min.js -->
    <script src="../doctor/libs/bower/jquery/dist/jquery.js"></script>
    <script src="../doctor/libs/bower/jquery-ui/jquery-ui.min.js"></script>
    <script src="../doctor/libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
    <script src="../doctor/libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
    <script src="../doctor/libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="../doctor/libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../doctor/libs/bower/PACE/pace.min.js"></script>
    <!-- endbuild -->

    <!-- build:js assets/js/app.min.js -->
    <script src="../doctor/assets/js/library.js"></script>
    <script src="../doctor/assets/js/plugins.js"></script>
    <script src="../doctor/assets/js/app.js"></script>
    <!-- endbuild -->
    <script src="../doctor/libs/bower/moment/moment.js"></script>
    <script src="../doctor/libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="../doctor/assets/js/fullcalendar.js"></script>
</body>

</html>
<?php } ?>
