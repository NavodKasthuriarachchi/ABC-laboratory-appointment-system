<?php
session_start();
include('../includes/dbconnection.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title >File upload and download</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5" style="flex: 1; margin-bottom: 500px;" >
        <h2>Upload a file</h2>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div style="display: flex; flex-wrap: wrap; ">
                <div style="flex: 1; margin-right: 10px; ">
                    <label for="file" style="margin-bottom: 250px;">Select file</label>
                    <input type="file" class="form-control" name="file" id="file">
                </div>
                <div style="flex: 1; margin-right: 10px; ">
                    <label for="test" style="margin-bottom: 250px;">Select Test</label>
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
            </div>
            <div style="display: flex; flex-wrap: wrap;">
                <div style="flex: 1; margin-right: 10px;">
                    <label for="patient" style="margin-bottom: 5px;">Select Patient Name</label>
                    <select onChange="getpatient(this.value);" name="patient" id="patient" class="form-control" required>
                        <option value="">Select Patient Name</option>
                        <?php
                        $sql = "SELECT * FROM tblpatient";
                        $stmt = $dbh->query($sql);
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $stmt->fetch()) {
                            echo '<option value="' . $row['ID'] . '">' . $row['FullName'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div style="flex: 1; margin-right: 10px;">
                    <label for="appointmentnumber" style="margin-bottom: 5px;">Select Appointment Number</label>
                    <select onChange="getappointmentnumber(this.value);" name="appointmentnumber" id="appointmentnumber" class="form-control" required>
                        <option value="">Select Appointment Number</option>
                        <?php
                        $sql = "SELECT * FROM tblappointmentp";
                        $stmt = $dbh->query($sql);
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        while ($row = $stmt->fetch()) {
                            echo '<option value="' . $row['ID'] . '">' . $row['AppointmentNumber'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Upload file</button>
        </form>
    </div>
</body>
</html>
