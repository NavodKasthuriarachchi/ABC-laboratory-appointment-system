<?php

class DBConnection {
    private $host = 'localhost';
    private $dbname = 'damsmsdb';
    private $username = 'root';
    private $password = '';
    protected $dbh;

    public function __construct() {
        $this->dbh = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection() {
        return $this->dbh;
    }
}

class Doctor {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getDoctorsBySpecialization($spid) {
        $sql = $this->db->prepare("SELECT * FROM tbldoctor WHERE Specialization=:spid");
        $sql->execute(array(':spid' => $spid));

        $doctors = array();
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $doctors[] = $row;
        }

        return $doctors;
    }
}

include('doctor/includes/dbconnection.php');

$dbConnection = new DBConnection();
$db = $dbConnection->getConnection();

$doctor = new Doctor($db);

if (!empty($_POST["sp_id"])) {
    $spid = $_POST["sp_id"];
    $doctors = $doctor->getDoctorsBySpecialization($spid);
    ?>
    <option value="">Select Doctor</option>
    <?php
    foreach ($doctors as $doctor) {
        ?>
        <option value="<?php echo $doctor["ID"]; ?>"><?php echo $doctor["FullName"]; ?></option>
        <?php
    }
}
?>
