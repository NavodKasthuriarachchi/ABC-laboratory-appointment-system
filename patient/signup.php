<?php
session_start();
include('includes/dbconnection.php');

$errors = array(
    'fname' => '',
    'mobno' => '',
    'email' => '',
    'password' => '',
    'confirm_password' => ''
);

class SignupPatient {
    private $dbh;

    public function __construct($dbh) {
        $this->dbh = $dbh;
    }

    public function registerPatient() {
        global $errors;

        if (isset($_POST['submit'])) {
            $fname = $_POST['fname'];
            $mobno = $_POST['mobno'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $confirm_password = md5($_POST['confirm_password']);

            $this->validateForm($fname, $mobno, $email, $password, $confirm_password);

            if (empty($errors['fname']) && empty($errors['mobno']) && empty($errors['email']) && empty($errors['password']) && empty($errors['confirm_password'])) {
                if ($this->isEmailExists($email)) {
                    $errors['email'] = "Email-id already exists. Please try again";
                } else {
                    $sql = "INSERT INTO tblpatient(FullName, MobileNumber, Email, Password) VALUES (:fname, :mobno, :email, :password)";
                    $query = $this->dbh->prepare($sql);
                    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
                    $query->bindParam(':email', $email, PDO::PARAM_STR);
                    $query->bindParam(':mobno', $mobno, PDO::PARAM_INT);
                    $query->bindParam(':password', $password, PDO::PARAM_STR);
                    $query->execute();
                    $lastInsertId = $this->dbh->lastInsertId();
                    
                    if ($lastInsertId) {
                        echo "<script>alert('You have signed up successfully');</script>";
                    } else {
                        echo "<script>alert('Something went wrong. Please try again');</script>";
                    }
                }
            }
        }
    }

    private function validateForm($fname, $mobno, $email, $password, $confirm_password) {
        global $errors;

        if (empty($fname)) {
            $errors['fname'] = "Full Name is required";
        }

        if (empty($mobno)) {
            $errors['mobno'] = "Mobile Number is required";
        } elseif (!preg_match("/^[0-9]{10}$/", $mobno)) {
            $errors['mobno'] = "Invalid mobile number format";
        }

        if (empty($email)) {
            $errors['email'] = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format";
        }

        if (empty($password)) {
            $errors['password'] = "Password is required";
        } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $_POST['password'])) {
            $errors['password'] = "Password must contain at least one uppercase letter, one lowercase letter, one number, and be at least 8 characters long";
        }

        if ($password !== $confirm_password) {
            $errors['confirm_password'] = "Passwords do not match";
        }
    }

    private function isEmailExists($email) {
        $ret = "SELECT Email FROM tblpatient WHERE Email=:email";
        $query = $this->dbh->prepare($ret);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $query->rowCount() > 0;
    }
}

$signupPatient = new SignupPatient($dbh);
$signupPatient->registerPatient();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ABC - SignUp Page</title>
    <link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/misc-pages.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
</head>
<body class="simple-page">
    <div id="back-to-home">
        <a href="../index.php" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a>
    </div>
    <div class="simple-page-wrap">
        <div class="simple-page-logo animated swing">
            <span style="color: white"><i class="fa fa-gg"></i></span>
            <span style="color: white">ABC Patient</span>
        </div>
        <div class="simple-page-form animated flipInY" id="login-form">
            <h4 class="form-title m-b-xl text-center">Sign Up With Your ABC Account</h4>
            <form action="" method="post">
                <div class="form-group">
                    <input id="fname" type="text" class="form-control" placeholder="Full Name" name="fname" required="true">
                    <span style="color:red;"><?php echo $errors['fname']; ?></span>
                </div>
                <div class="form-group">
                    <input id="email" type="email" class="form-control" placeholder="Email" name="email" required="true">
                    <span style="color:red;"><?php echo $errors['email']; ?></span>
                </div>
                <div class="form-group">
                    <input id="mobno" type="text" class="form-control" placeholder="Mobile" name="mobno" maxlength="10" pattern="[0-9]+" required="true">
                    <span style="color:red;"><?php echo $errors['mobno']; ?></span>
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control" placeholder="Password" name="password" required="true">
                    <span style="color:red;"><?php echo $errors['password']; ?></span>
                </div>
                <div class="form-group">
                    <input id="confirm_password" type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" required="true">
                    <span style="color:red;"><?php echo $errors['confirm_password']; ?></span>
                </div>
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
           
                </form>
        </div><!-- #login-form -->

        <div class="simple-page-footer">
            <p><small>Do you have an account?</small> <a href="login.php">SIGN IN</a></p>
        </div>
    </div><!-- .simple-page-wrap -->
</body>
</html>
