<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

class BetweenDatesReport {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function generateReport($fdate, $tdate, $docid) {
        $output = '';
        $sql = "SELECT * FROM tblappointment WHERE (DATE(ApplyDate) BETWEEN :fdate AND :tdate) AND Doctor = :docid";
        $query = $this->db->prepare($sql);
        $query->bindParam(':fdate', $fdate, PDO::PARAM_STR);
        $query->bindParam(':tdate', $tdate, PDO::PARAM_STR);
        $query->bindParam(':docid', $docid, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        $cnt = 1;
        foreach ($results as $row) {
            $output .= '<tr>';
            $output .= '<td>' . htmlentities($cnt) . '</td>';
            $output .= '<td>' . htmlentities($row->AppointmentNumber) . '</td>';
            $output .= '<td>' . htmlentities($row->Name) . '</td>';
            $output .= '<td>' . htmlentities($row->MobileNumber) . '</td>';
            $output .= '<td>' . htmlentities($row->Email) . '</td>';
            $output .= '<td>' . ($row->Status ? htmlentities($row->Status) : "Not Updated Yet") . '</td>';
            $output .= '<td><a href="view-appointment-detail.php?editid=' . htmlentities($row->ID) . '&&aptid=' . htmlentities($row->AppointmentNumber) . '" class="btn btn-primary">View</a></td>';
            $output .= '</tr>';
            $cnt++;
        }

        return $output;
    }
}

if (strlen($_SESSION['damsid'] == 0)) {
    header('location:logout.php');
} else {
    $betweenDatesReport = new BetweenDatesReport($dbh);
    $fdate = $_POST['fromdate'];
    $tdate = $_POST['todate'];
    $docid = $_SESSION['damsid'];

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <title>DAMS || B/W Dates Appointment Detail</title>

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

    <?php include_once('includes/header.php');?>

    <?php include_once('includes/sidebar.php');?>

    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">
                <div class="row">
                    <!-- DOM dataTable -->
                    <div class="col-md-12">
                        <div class="widget">
                            <header class="widget-header">
                                <h4 class="m-t-0 header-title">Between Dates Reports</h4>
                                <h5 align="center" style="color:blue">Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
                            </header><!-- .widget-header -->
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
                                            <?php echo $betweenDatesReport->generateReport($fdate, $tdate, $docid); ?>
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
                            </div><!-- .widget-body -->
                        </div><!-- .widget -->
                    </div><!-- END column -->
                </div><!-- .row -->
            </section><!-- .app-content -->
        </div><!-- .wrap -->
        <!-- APP FOOTER -->
        <?php include_once('includes/footer.php');?>
        <!-- /#app-footer -->
    </main>
    <!--========== END app main -->

    <!-- APP CUSTOMIZER -->
    <?php include_once('includes/customizer.php');?>

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
