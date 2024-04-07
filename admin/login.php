<?php
session_start();
// Error reporting turned off
error_reporting(0);

// DB credentials
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','damsmsdb');

// Establish database connection
try {
    $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // No need for hashing when using VARCHAR

    $sql = "SELECT ID, Username FROM tbladmin WHERE Username=:username AND Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if(count($results) > 0) {
        foreach ($results as $result) {
            $_SESSION['damsid'] = $result->ID;
            $_SESSION['damsemailid'] = $result->Username;
        }
        $_SESSION['login'] = $username;
        echo "<script type='text/javascript'> document.location ='dashboardmain.php'; </script>";
        exit(); // Added exit to stop further execution after redirection
    } else {
        echo "<script>alert('Invalid Username or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ABC - Login Page</title>
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
            <span style="color: white">ABC Admin</span>
        </div><!-- logo -->
        <div class="simple-page-form animated flipInY" id="login-form">
            <h4 class="form-title m-b-xl text-center">Sign In With Your ABC Account</h4>
            <form method="post" name="login">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Username" required="true" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required="true">
                </div>
                <input type="submit" class="btn btn-primary" name="login" value="Sign IN">
            </form>
            <hr />
            <a href="signup.php">Signup/Registration</a>
        </div><!-- #login-form -->
        <div class="simple-page-footer">
            <p><a href="forgot-password.php">FORGOT YOUR PASSWORD ?</a></p>
        </div><!-- .simple-page-footer -->
    </div><!-- .simple-page-wrap -->
</body>
</html>
