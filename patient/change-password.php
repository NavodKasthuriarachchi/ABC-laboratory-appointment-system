<?php
session_start();
include('includes/dbconnection.php');

if (strlen($_SESSION['damsid']) == 0) {
    header('location:logout.php');
    exit();
} else {
    if (isset($_POST['submit'])) {
        $pid = $_SESSION['damsid'];
        $cpassword = md5($_POST['currentpassword']);
        $newpassword = md5($_POST['newpassword']);
        $confirmpassword = md5($_POST['confirmpassword']);

        if ($newpassword != $confirmpassword) {
            echo '<script>alert("New Password and Confirm Password do not match")</script>';
            exit();
        }

        $sql = "SELECT ID FROM tblpatient WHERE ID=:pid AND Password=:ppassword";
        $query = $dbh->prepare($sql);
        $query->bindParam(':pid', $pid, PDO::PARAM_STR);
        $query->bindParam(':ppassword', $cpassword, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetch(PDO::FETCH_ASSOC);

        if ($query->rowCount() > 0) {
            $con = "UPDATE tblpatient SET Password=:newpassword WHERE ID=:pid";
            $chngpwd1 = $dbh->prepare($con);
            $chngpwd1->bindParam(':pid', $pid, PDO::PARAM_STR);
            $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
            $chngpwd1->execute();

            echo '<script>alert("Your password has been successfully changed")</script>';
        } else {
            echo '<script>alert("Your current password is wrong")</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ABC Patient - Change Password</title>
    <link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
    <?php include_once('includes/header.php'); ?>
    <?php include_once('includes/sidebar.php'); ?>
    <main id="app-main" class="app-main">
        <section class="app-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget">
                        <header class="widget-header">
                            <h3 class="widget-title">Change Password</h3>
                        </header>
                        <hr class="widget-separator">
                        <div class="widget-body">
                            <form class="form-horizontal" onsubmit="return checkpass();" name="changepassword"
                                method="post">
                                <div class="form-group">
                                    <label for="exampleTextInput1" class="col-sm-3 control-label">Current
                                        Password:</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="currentpassword"
                                            id="currentpassword" required='true'>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email2" class="col-sm-3 control-label">New Password:</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="newpassword"
                                            class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email2" class="col-sm-3 control-label">Confirm Password:</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="confirmpassword"
                                            id="confirmpassword" required='true'>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <button type="submit" class="btn btn-success" name="submit">Change</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include_once('includes/footer.php'); ?>
    <script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
    <script>
        Breakpoints();
    </script>
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
    <script type="text/javascript">
        function checkpass() {
            if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                alert('New Password and Confirm Password field does not match');
                document.changepassword.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</body>

</html>
