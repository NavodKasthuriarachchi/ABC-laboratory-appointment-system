<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

class AppointmentPage {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function redirectToLogout() {
        header('location:logout.php');
        exit();
    }
    
    public function displayAppointments() {
        $docid = $_SESSION['damsid'];
        $sql = "SELECT * FROM tblappointment WHERE Status IS NULL AND Doctor=:docid";
        $query = $this->db->prepare($sql);
        $query->bindParam(':docid', $docid, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        $cnt = 1;
        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>" . htmlentities($cnt) . "</td>";
            echo "<td>" . htmlentities($row->AppointmentNumber) . "</td>";
            echo "<td>" . htmlentities($row->Name) . "</td>";
            echo "<td>" . htmlentities($row->MobileNumber) . "</td>";
            echo "<td>" . htmlentities($row->Email) . "</td>";
            echo "<td>";
            if ($row->Status == "") {
                echo "Not Updated Yet";
            } else {
                echo htmlentities($row->Status);
            }
            echo "</td>";
            echo "<td><a href='view-appointment-detail.php?editid=" . htmlentities($row->ID) . "&aptid=" . htmlentities($row->AppointmentNumber) . "' class='btn btn-primary'>View</a></td>";
            echo "</tr>";
            $cnt++;
        }
    }
}

if (strlen($_SESSION['damsid']) == 0) {
    $appointmentPage = new AppointmentPage(null);
    $appointmentPage->redirectToLogout();
} else {
    $appointmentPage = new AppointmentPage($dbh);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>DAMS || New Appointment Detail</title>
    <link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class="menubar-left menubar-unfold menubar-light theme-primary">
<?php include_once('includes/header.php');?>
<?php include_once('includes/sidebar.php');?>
<main id="app-main" class="app-main">
    <div class="wrap">
        <section class="app-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget">
                        <header class="widget-header">
                            <h4 class="widget-title">New Appointment</h4>
                        </header>
                        <hr class="widget-separator">
                        <div class="widget-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Appointment Number</th>
                                            <th>Patient Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $appointmentPage->displayAppointments(); ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Appointment Number</th>
                                            <th>Patient Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include_once('includes/footer.php');?>
</main>
<?php include_once('includes/customizer.php');?>
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

<?php } ?>
