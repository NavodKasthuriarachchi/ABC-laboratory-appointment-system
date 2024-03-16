<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

class SearchAppointment {
    private $dbh;

    public function __construct($dbh) {
        $this->dbh = $dbh;
    }

    public function searchAppointments() {
        if (isset($_POST['search'])) {
            $sdata = $_POST['searchdata'];
            $docid = $_SESSION['damsid'];
            $sql = "SELECT * FROM tblappointment WHERE AppointmentNumber LIKE '$sdata%' OR Name LIKE '$sdata%' OR MobileNumber LIKE '$sdata%' AND Doctor=:docid";
            $query = $this->dbh->prepare($sql);
            $query->bindParam(':docid', $docid, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;

            if ($query->rowCount() > 0) {
                foreach ($results as $row) {
                    echo '
                        <tr>
                            <td>' . htmlentities($cnt) . '</td>
                            <td>' . htmlentities($row->AppointmentNumber) . '</td>
                            <td>' . htmlentities($row->Name) . '</td>
                            <td>' . htmlentities($row->MobileNumber) . '</td>
                            <td>' . htmlentities($row->Email) . '</td>';
                    if ($row->Status == "") {
                        echo '<td>Not Updated Yet</td>';
                    } else {
                        echo '<td>' . htmlentities($row->Status) . '</td>';
                    }
                    echo '<td><a href="view-appointment-detail.php?editid=' . htmlentities($row->ID) . '&&aptid=' . htmlentities($row->AppointmentNumber) . '" class="btn btn-primary">View</a></td>
                        </tr>';
                    $cnt++;
                }
            } else {
                echo '<tr><td colspan="8">No record found against this search</td></tr>';
            }
        }
    }
}

$searchAppointment = new SearchAppointment($dbh);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>DAMS || Search Appointment Detail</title>
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
                                <form id="basic-form" method="post">
                                    <div class="form-group">
                                        <label>Search by Appointment No./Name/Mobile No.</label>
                                        <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Appointment No./Name/Mobile No.">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary" name="search" id="submit">Search</button>
                                </form>
                            </header>
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
                                            <?php $searchAppointment->searchAppointments(); ?>
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
