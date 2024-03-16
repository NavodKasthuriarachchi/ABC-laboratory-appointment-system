<?php
session_start();
// Error reporting turned off
error_reporting(0);

// Class for handling database operations
class Database {
    private $dbh;

    public function __construct($host, $dbname, $username, $password) {
        try {
            $dsn = "mysql:host=$host;dbname=$dbname";
            $this->dbh = new PDO($dsn, $username, $password);
            // Set PDO to throw exceptions on error
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Handle database connection error
            echo "Connection failed: " . $e->getMessage();
            exit();
        }
    }

    public function prepare($sql) {
        return $this->dbh->prepare($sql);
    }
}

// Class for user authentication
class Auth {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function login($email, $password) {
        $password = md5($password);
        $sql = "SELECT ID, Email FROM tblpatient WHERE Email=:email AND Password=:password";
        try {
            $query = $this->db->prepare($sql);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            return $results;
        } catch (PDOException $e) {
            // Handle query execution error
            echo "Error: " . $e->getMessage();
            exit();
        }
    }
}

// Include database configuration and connection
$host = "localhost";
$dbname = "damsmsdb";
$username = "root";
$password = "";
$db = new Database($host, $dbname, $username, $password);

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $auth = new Auth($db);
    $results = $auth->login($email, $password);

    if(count($results) > 0) {
        foreach ($results as $result) {
            $_SESSION['damsid'] = $result->ID;
            $_SESSION['damsemailid'] = $result->Email;
        }
        $_SESSION['login'] = $_POST['email'];
        echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
        exit(); // Added exit to stop further execution after redirection
    } else {
        echo "<script>alert('Invalid Details');</script>";
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
            <span style="color: white">ABC Patient</span>
        </div><!-- logo -->
        <div class="simple-page-form animated flipInY" id="login-form">
            <h4 class="form-title m-b-xl text-center">Sign In With Your ABC Account</h4>
            <form method="post" name="login">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Registered Email ID" required="true" name="email">
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
