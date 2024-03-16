<?php 
include('dbconnection.php');

// Function to retrieve contact information from the database
function getContactInfo($dbh) {
    $sql = "SELECT * FROM tblpage WHERE PageType = 'contactus'";
    $query = $dbh->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_OBJ);
}

$contactInfo = getContactInfo($dbh);
?>

<footer class="bg-light text-lg-start">
    <section class="container py-5">
        <div class="row">
            <?php foreach ($contactInfo as $row): ?>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="mb-lg-4 mb-3">Timing</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex">
                            <?php echo $row->Timing; ?>
                        </li>
                    </ul>
                    <h5 class="mb-lg-4 mb-3">Email</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex">
                            <?php echo $row->Email; ?>
                        </li>
                    </ul>
                    <h5 class="mb-lg-4 mb-3">Contact Number</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex">
                            <?php echo $row->MobileNumber; ?>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 col-12 my-4 my-lg-0">
                    <h5 class="mb-lg-4 mb-3">Our Clinic</h5>
                    <p><?php echo $row->PageDescription; ?></p>
                </div>
            <?php endforeach; ?>
            <div class="col-lg-3 col-md-6 col-12 ms-auto">
                <h5 class="mb-lg-4 mb-2">Socials</h5>
                <ul class="social-icon">
                    <li><a href="#" class="social-icon-link bi-facebook"></a></li>
                    <li><a href="#" class="social-icon-link bi-twitter"></a></li>
                    <li><a href="#" class="social-icon-link bi-instagram"></a></li>
                    <li><a href="#" class="social-icon-link bi-youtube"></a></li>
                </ul>
            </div>
        </div>
    </section>
</footer>
