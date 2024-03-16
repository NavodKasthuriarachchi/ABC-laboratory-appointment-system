<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

class TechnicianProfile {
    private $dbh;

    public function __construct($dbh) {
        $this->dbh = $dbh;
    }

    public function updateProfile() {
        if (isset($_POST['submit'])) {
            $pid = $_SESSION['damsid'];
            $name = $_POST['fname'];
            $mobno = $_POST['mobilenumber'];
            $email = $_POST['email'];

            $sql = "UPDATE tbltechnician SET FullName=:name, MobileNumber=:mobilenumber, Email=:email WHERE ID=:pid";
            $query = $this->dbh->prepare($sql);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':mobilenumber', $mobno, PDO::PARAM_STR);
            $query->bindParam(':pid', $pid, PDO::PARAM_STR);
            $query->execute();

            echo '<script>alert("Profile has been updated")</script>';
        }
    }

    public function displayProfileForm() {
        $pid = $_SESSION['damsid'];
        $sql = "SELECT * FROM tbltechnician WHERE ID=:pid";
        $query = $this->dbh->prepare($sql);
        $query->bindParam(':pid', $pid, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if ($query->rowCount() > 0) {
            foreach ($results as $row) {
                echo '
                    <form class="form-horizontal" method="post">
                        <div class="form-group">
                            <label for="exampleTextInput1" class="col-sm-3 control-label">Patient ID:</label>
                            <div class="col-sm-9">
                                <input id="fname" type="text" class="form-control" placeholder="Full Name" name="fname" required="true" value="' . $row->FullName . '">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email2" class="col-sm-3 control-label">Email:</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" value="' . $row->Email . '" required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email2" class="col-sm-3 control-label">Contact Number:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email2" name="mobilenumber" value="' . $row->MobileNumber . '" required="true" maxlength="10">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email2" class="col-sm-3 control-label">Registration Date:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email2" name="" value="' . $row->CreationDate . '" readonly="true">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" class="btn btn-success" name="submit">Update</button>
                            </div>
                        </div>
                    </form>';
            }
        }
    }
}

$technicianProfile = new TechnicianProfile($dbh);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>DAMS - Technician Profile</title>
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
<main id="app-main" class="app-main">
    <div class="wrap">
        <section class="app-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget">
                        <header class="widget-header">
                            <h3 class="widget-title">Technician Profile</h3>
                        </header><!-- .widget-header -->
                        <hr class="widget-separator">
                        <div class="widget-body">
                            <?php $technicianProfile->updateProfile(); ?>
                            <?php $technicianProfile->displayProfileForm(); ?>
                        </div><!-- .widget-body -->
                    </div><!-- .widget -->
                </div><!-- END column -->
            </div><!-- .row -->
        </section><!-- #dash-content -->
    </div><!-- .wrap -->
    <?php include_once('includes/footer.php'); ?>
</main>
<?php include_once('includes/customizer.php'); ?>
<script src="libs/bower/jquery/dist/jquery.js"></script>
<script src="libs/bower/jquery-ui/jquery-ui.min.js"></script>
<script src="libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
<script src="libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
<script src="libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="libs/bower/PACE/pace.min.js"></script>
<script src="assets/js/library.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/app.js"></script>
<script src="libs/bower/moment/moment.js"></script>
<script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="assets/js/fullcalendar.js"></script>
</body>
</html>
