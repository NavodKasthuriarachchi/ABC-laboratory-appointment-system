<?php
session_start();
error_reporting(0);
include('../technician/includes/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

<head>
    <meta charset="UTF-8">
    <title>ABC - Dashboard</title>

<link rel="stylesheet" href="../technician/libs/bower/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../technician/libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
<!-- build:css assets/css/app.min.css -->
<link rel="stylesheet" href="../technician/libs/bower/animate.css/animate.min.css">
<link rel="stylesheet" href="../technician/libs/bower/fullcalendar/dist/fullcalendar.min.css">
<link rel="stylesheet" href="../technician/libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
<link rel="stylesheet" href="../technician/assets/css/bootstrap.css">
<link rel="stylesheet" href="../technician/assets/css/core.css">
<link rel="stylesheet" href="../technician/assets/css/app.css">
<!-- endbuild -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
<script src="../technician/libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
<script>
    Breakpoints();
</script>
</head>
<body class="menubar-left menubar-unfold menubar-light theme-primary">
<!--============= start main area -->
<?php include_once('../technician/includes/header.php');?>
<?php include_once('../technician/includes/sidebar.php');?>

<main id="app-main" class="app-main">
<body class="simple-page">
<div id="email">
    <form class="" action="send.php" method="post">
        Email <input type="email" id="email" name="email" value="<?php echo isset($_GET['email']) ? htmlentities($_GET['email']) : ''; ?>"> <br>
        Subject <input type="text" name="subject" value=""> <br>
        Message <input type="text" name="message" value=""> <br>
        <button type="submit" name="send">Send</button>
    </form>
</div>
</main>
    <script>
        function populateEmail(email) {
            // Populate the email input field with the appointment's email address
            document.getElementById('email').value = email;
        }
    </script>
    <?php include_once('../technician/includes/customizer.php'); ?>



<!-- build:js assets/js/core.min.js -->
<script src="../technician/libs/bower/jquery/dist/jquery.js"></script>
<script src="../technician/libs/bower/jquery-ui/jquery-ui.min.js"></script>
<script src="../technician/libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
<script src="../technician/libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
<script src="../technician/libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="../technician/libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="../technician/libs/bower/PACE/pace.min.js"></script>
<!-- endbuild -->

<!-- build:js assets/js/app.min.js -->
<script src="../technician/assets/js/library.js"></script>
<script src="../technician/assets/js/plugins.js"></script>
<script src="../technician/assets/js/app.js"></script>
<!-- endbuild -->
<script src="../technician/libs/bower/moment/moment.js"></script>
<script src="../technician/libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="../technician/assets/js/fullcalendar.js"></script>
</body>
</html>
