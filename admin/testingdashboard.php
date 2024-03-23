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
        <main id="app-main" class="app-main">
            <div class="wrap">
                <section class="app-content">
                    <div class="row">

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="widget stats-widget">
                                    <div class="widget-body clearfix">
                                        <div class="pull-left">
                                            <h3 class="widget-title text-warning"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totnewapt); ?></span></h3>
                                            <small class="text-color">Total New Appointment</small>
                                        </div>
                                        <span class="pull-right big-icon watermark"><i class="fa fa-paperclip"></i></span>
                                    </div>
                                    <footer class="widget-footer bg-warning">
                                        <a href="new-appointmenttesting.php"><small> View Detail</small></a>
                                        <span class="small-chart pull-right" data-plugin="sparkline" data-options="[4,3,5,2,1], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
                                    </footer>
                                </div><!-- .widget -->
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="widget stats-widget">
                                    <div class="widget-body clearfix">
                                        <div class="pull-left">
                                            <h3 class="widget-title text-success"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totappapt); ?></span></h3>
                                            <small class="text-color">Total Approved</small>
                                        </div>
                                        <span class="pull-right big-icon watermark"><i class="fa fa-ban"></i></span>
                                    </div>
                                    <footer class="widget-footer bg-success">
                                        <a href="approved-appointmenttesting.php"><small> View Detail</small></a>
                                        <span class="small-chart pull-right" data-plugin="sparkline" data-options="[1,2,3,5,4], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
                                    </footer>
                                </div><!-- .widget -->
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="widget stats-widget">
                                    <div class="widget-body clearfix">
                                        <div class="pull-left">
                                            <h3 class="widget-title text-danger"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totncanapt); ?></span></h3>
                                            <small class="text-color">Cancelled Appointment</small>
                                        </div>
                                        <span class="pull-right big-icon watermark"><i class="fa fa-unlock-alt"></i></span>
                                    </div>
                                    <footer class="widget-footer bg-danger">
                                        <a href="cancelled-appointmenttesting.php"><small> View Detail</small></a>
                                        <span class="small-chart pull-right" data-plugin="sparkline" data-options="[2,4,3,4,3], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
                                    </footer>
                                </div><!-- .widget -->
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="widget stats-widget">
                                    <div class="widget-body clearfix">
                                        <div class="pull-left">
                                            <h3 class="widget-title text-primary"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totapt); ?></span></h3>
                                            <small class="text-color">Total Appointment</small>
                                        </div>
                                        <span class="pull-right big-icon watermark"><i class="fa fa-file-text-o"></i></span>
                                    </div>
                                    <footer class="widget-footer bg-primary">
                                        <a href="all-appointmenttesting.php"><small> View Detail</small></a>
                                        <span class="small-chart pull-right" data-plugin="sparkline" data-options="[5,4,3,5,2],{ type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
                                    </footer>
                                </div><!-- .widget -->
                            </div>
                        </div><!-- .row -->



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
