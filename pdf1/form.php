<?php
session_start();
include('/Xampp/htdocs/dams/includes/dbconnection.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>PDF Example</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Patient Test Report</h1>
    
    <form method="post" action="generate-pdf.php">

    <label for="appointmentnumber" style="margin-bottom: 5px;">Select Appointment Number</label>
                    <select onChange="getappointmentnumber(this.value);" name="appointmentnumber" id="appointmentnumber" class="form-control" required>
                        <option value="">Select Appointment Number</option>
                        <?php
                        $sql = "SELECT * FROM tblappointmentp";
                        $stmt = $dbh->query($sql);
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $stmt->fetch()) {
                            echo '<option value="' . $row['AppointmentNumber'] . '">' . $row['AppointmentNumber'] . '</option>';
                        }
                        ?>
                    </select>
        
        <label for="name">Name</label>
        <!-- <input type="text" name="name" id="name"> -->
        <select onChange="getpatient(this.value);" name="patient" id="patient" class="form-control" required>
                        <option value="">Select Patient Name</option>
                        <?php
                        $sql = "SELECT * FROM tblpatient";
                        $stmt = $dbh->query($sql);
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $stmt->fetch()) {
                            echo '<option value="' . $row['FullName'] . '">' . $row['FullName'] . '</option>';
                        }
                        ?>
                    </select>

        <label for="age">Age</label>
        <input type="text" name="age" id="age">

        <label for="test">Test</label>
        <select onChange="gettests(this.value);" name="test" id="test" class="form-control" required>
                        <option value="">Select Test</option>
                        <?php
                        $sql = "SELECT * FROM tbltests";
                        $stmt = $dbh->query($sql);
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $stmt->fetch()) {
                            echo '<option value="' . $row['Test'] . '">' . $row['Test'] . '</option>';
                        }
                        ?>
                    </select>

        <label for="result">Result</label>
        <!-- <input type="text" name="result" id="result"> -->
        <select name="result" id="result" required>
        <option value="" disabled selected>Select test results</option>
        <option value="Low">Low</option>
        <option value="Normal">Normal</option>
        <option value="Risky">Risky</option>
        <option value="Bad">Bad</option>
      </select>
        
        <label for="quantity">Count</label>
        <input type="text" name="quantity" id="quantity">

        <label for="technician">Technician</label>
        <!-- <input type="text" name="age" id="age"> -->
        <select onChange="gettechnician(this.value);" name="technician" id="technician" class="form-control" required>
                        <option value="">Select Technician</option>
                        <?php
                        $sql = "SELECT * FROM tbltechnician";
                        $stmt = $dbh->query($sql);
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $stmt->fetch()) {
                            echo '<option value="' . $row['FullName'] . '">' . $row['FullName'] . '</option>';
                        }
                        ?>
                    </select>
        
        <button>Generate PDF</button>
    </form>
</body>
</html>