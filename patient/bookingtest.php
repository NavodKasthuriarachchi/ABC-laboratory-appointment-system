<?php
session_start();
include('dbconnection.php');

class Appointment {
    private $dbh;

    public function __construct($dbh) {
        $this->dbh = $dbh;
    }

    public function bookTest($name, $mobnum, $email, $appdate, $apptime, $test, $message, $patient_id) {
        $cdate = date('Y-m-d');

        if ($appdate <= $cdate) {
            echo '<script>alert("Test date must be greater than today\'s date")</script>';
        } else {
            $aptnumber = mt_rand(100000000, 999999999);
            $sql = "INSERT INTO tblappointmentp(AppointmentNumber, Name, MobileNumber, Email, AppointmentDate, AppointmentTime, Test, Message, PatientID) 
                    VALUES(:aptnumber, :name, :mobnum, :email, :appdate, :apptime, :test, :message, :patient_id)";
            $query = $this->dbh->prepare($sql);
            $query->bindParam(':aptnumber', $aptnumber, PDO::PARAM_STR);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':mobnum', $mobnum, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':appdate', $appdate, PDO::PARAM_STR);
            $query->bindParam(':apptime', $apptime, PDO::PARAM_STR);
            $query->bindParam(':test', $test, PDO::PARAM_STR);
            $query->bindParam(':message', $message, PDO::PARAM_STR);
            $query->bindParam(':patient_id', $patient_id, PDO::PARAM_INT);

            if ($query->execute()) {
                // Insert the appointment ID into tblappointmentid
                $appointment_id = $this->dbh->lastInsertId();
                $sql_insert_id = "INSERT INTO tblappointmentid(AppointmentID,PatientID) VALUES(:appointment_id, :patient_id)";
                $query_insert_id = $this->dbh->prepare($sql_insert_id);
                $query_insert_id->bindParam(':appointment_id', $appointment_id, PDO::PARAM_INT);
                $query_insert_id->bindParam(':patient_id', $patient_id, PDO::PARAM_INT);
                $query_insert_id->execute();

                echo '<script>alert("Your Booking Request Has Been Sent. We Will Contact You Soon")</script>';
                echo "<script>window.location.href ='bookingtest.php'</script>";
            } else {
                echo '<script>alert("Something Went Wrong. Please try again")</script>';
            }
        }
    }
}

// Check if form is submitted
if(isset($_POST['submit'])) {
    // Retrieve the logged patient's ID from the session
    $patient_id = $_SESSION['damsid'];
    
    // Retrieve other form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $test = $_POST['test'];
    $message = $_POST['message'];

    // Create an instance of Appointment class
    $appointment = new Appointment($dbh);
    // Call bookTest method with form data and patient's ID
    $appointment->bookTest($name, $phone, $email, $date, $time, $test, $message, $patient_id);
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Lab Test Appointment</title>
    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="../css/bootstrap-icons.css" rel="stylesheet">
    <link href="../css/owl.carousel.min.css" rel="stylesheet">
    <link href="../css/owl.theme.default.min.css" rel="stylesheet">
    <link href="../css/booking.css" rel="stylesheet"> 

    <link rel="stylesheet" href="../doctor/libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../doctor/libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
    <link rel="stylesheet" href="../doctor/libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="../doctor/libs/bower/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="../doctor/libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="../doctor/assets/css/bootstrap.css">
    <link rel="stylesheet" href="../doctor/assets/css/core.css">
    <link rel="stylesheet" href="../doctor/assets/css/app.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,
    <script src="../doctor/libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
    <script>
        Breakpoints();
    </script>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary" id="top">

    <!-- Including the header -->
    <?php include_once('includes/header.php'); ?>

    <!-- Including the sidebar -->
    <?php include_once('includes/sidebar.php'); ?>

    <!-- APP MAIN -->
    <div class="row">
        <div class="wrap">
            <section id="dash-content">
                <main>
                    <?php include_once('includes/header.php'); ?>
                    <section class="section-padding" id="booking">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-12 mx-auto">
                                    <div class="booking-form">
                                        <h2 class="text-center mb-lg-3 mb-2">Book a Test appointment</h2>
                                        <form role="form" method="post">
                                            <div class="row">
                                                <div class="col-lg-6 col-12">
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Full name" required='true'>
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required='true'>
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" maxlength="10">
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <input type="date" name="date" id="date" value="" class="form-control">
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <input type="time" name="time" id="time" value="" class="form-control">
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <select onChange="gettests(this.value);" name="test" id="test" class="form-control" required>
                                                        <option value="">Select Test</option>
                                                        <?php
                                                        $sql = "SELECT * FROM tbltests";
                                                        $stmt = $dbh->query($sql);
                                                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                                        while ($row = $stmt->fetch()) {
                                                            echo '<option value="' . $row['ID'] . '">' . $row['Test'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-12" style="margin-right: 2px;">
                                                    <textarea class="form-control" rows="5" id="message" name="message" placeholder="Additional Message"></textarea>
                                                </div>
                                                <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                                    <button type="submit" class="form-control" name="submit" id="submit-button">Book Now</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>

                <!-- Including the customizer -->
                <?php include_once('../doctor/includes/customizer.php'); ?>

                <!-- JAVASCRIPT FILES -->
                <script src="../doctor/libs/bower/jquery/dist/jquery.js"></script>
                <script src="../doctor/libs/bower/jquery-ui/jquery-ui.min.js"></script>
                <script src="../doctor/libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
                <script src="../doctor/libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
                <script src="../doctor/libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
                <script src="../doctor/libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
                <script src="../doctor/libs/bower/PACE/pace.min.js"></script>
                <script src="../doctor/assets/js/library.js"></script>
                <script src="../doctor/assets/js/plugins.js"></script>
                <script src="../doctor/assets/js/app.js"></script>
                <script src="../doctor/libs/bower/moment/moment.js"></script>
                <script src="../doctor/libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
                <script src="../doctor/assets/js/fullcalendar.js"></script>
            </body>
        </html>
