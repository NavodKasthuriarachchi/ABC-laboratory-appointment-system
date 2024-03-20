<?php
session_start();
include_once('includes/dbconnection.php');

class Appointment {
    private $dbh;

    public function __construct($dbh) {
        $this->dbh = $dbh;
    }
    public function bookAppointment($name, $mobnum, $email, $appdate, $aaptime, $specialization, $doctorlist, $message) {
        $cdate = date('Y-m-d');

        if ($appdate <= $cdate) {
            echo '<script>alert("Appointment date must be greater than today\'s date")</script>';
        } else {
            $aptnumber = mt_rand(100000000, 999999999);
            $sql = "INSERT INTO tblappointment(AppointmentNumber, Name, MobileNumber, Email, AppointmentDate, AppointmentTime, Specialization, Doctor, Message) VALUES(:aptnumber, :name, :mobnum, :email, :appdate, :aaptime, :specialization, :doctorlist, :message)";
            $query = $this->dbh->prepare($sql);
            $query->bindParam(':aptnumber', $aptnumber, PDO::PARAM_STR);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':mobnum', $mobnum, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':appdate', $appdate, PDO::PARAM_STR);
            $query->bindParam(':aaptime', $aaptime, PDO::PARAM_STR);
            $query->bindParam(':specialization', $specialization, PDO::PARAM_STR);
            $query->bindParam(':doctorlist', $doctorlist, PDO::PARAM_STR);
            $query->bindParam(':message', $message, PDO::PARAM_STR);

            if ($query->execute()) {
                echo '<script>alert("Your Appointment Request Has Been Sent. We Will Contact You Soon")</script>';
                echo "<script>window.location.href ='docbooking.php'</script>";
            } else {
                echo '<script>alert("Something Went Wrong. Please try again")</script>';
            }
        }
    }
}

// Check if form is submitted
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobnum = $_POST['phone'];
    $appdate = $_POST['date'];
    $aaptime = $_POST['time'];
    $specialization = $_POST['specialization'];
    $doctorlist = $_POST['doctorlist'];
    $message = $_POST['message'];

    // Create an instance of Appointment class
    $appointment = new Appointment($dbh);
    // Call bookAppointment method with form data
    $appointment->bookAppointment($name, $mobnum, $email, $appdate, $aaptime, $specialization, $doctorlist, $message);
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <script src="../doctor/libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
    <script>
        function getdoctors(val) {
            $.ajax({
                type: "POST",
                url: "../get_doctors.php",
                data: 'sp_id=' + val,
                success: function (data) {
                    $("#doctorlist").html(data);
                }
            });
        }
    </script>
    <script>
        Breakpoints();
    </script>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary" id="top">
    <!--============= start main area -->

    <!-- Including the header -->
    <?php include_once('includes/header.php'); ?>

    <!-- Including the sidebar -->
    <?php include_once('includes/sidebar.php'); ?>

    <!-- APP MAIN ==========-->

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
                        <h2 class="text-center mb-lg-3 mb-2">Book an appointment</h2>
                        <form role="form" method="post">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <input type="text" name="name" id="name" class="form-control"
                                           placeholder="Full name" required='true'>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                           class="form-control" placeholder="Email address" required='true'>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="telephone" name="phone" id="phone" class="form-control"
                                           placeholder="Enter Phone Number" maxlength="10">
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="date" name="date" id="date" value="" class="form-control">
                                </div>
                                <div class="col-lg-6 col-12">
                                    <input type="time" name="time" id="time" value="" class="form-control">
                                </div>
                                <div class="col-lg-6 col-12">
                                    <select onChange="getdoctors(this.value);" name="specialization"
                                            id="specialization" class="form-control" required>
                                        <option value="">Select specialization</option>
                                        <?php
                                        $sql = "SELECT * FROM tblspecialization";
                                        $stmt = $dbh->query($sql);
                                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                        while ($row = $stmt->fetch()) {
                                            echo '<option value="' . $row['ID'] . '">' . $row['Specialization'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <select name="doctorlist" id="doctorlist" class="form-control">
                                        <option value="">Select Doctor</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <textarea class="form-control" rows="5" id="message" name="message"
                                              placeholder="Additional Message"></textarea>
                                </div>
                                <div class="col-lg-3 col-md-4 col-6 mx-auto" >
                                    <button type="submit" class="form-control" name="submit"
                                            id="submit-button1">Book Now
                                    </button>
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
