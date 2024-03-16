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

class Tests {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getTest($tsid) {
        $sql = $this->db->prepare("SELECT * FROM tbltest WHERE test=:tsid");
        $sql->execute(array(':tsid' => $tsid));

        $tests = array();
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $tests[] = $row;
        }

        return $tests;
    }
}

include('dbconnection.php');

$dbConnection = new DBConnection();
$db = $dbConnection->getConnection();

$test = new Test($db);

if (!empty($_POST["ts_id"])) {
    $spid = $_POST["ts_id"];
    $tests = $test->getTest($tsid);
    ?>
    <option value="">Select Test</option>
    <?php
    foreach ($tests as $test) {
        ?>
        <option value="<?php echo $test["ID"]; ?>"><?php echo $test["test"]; ?></option>
        <?php
    }
}
?>
