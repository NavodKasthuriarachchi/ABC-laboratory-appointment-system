<?php
session_start();
include('../includes/dbconnection.php');

// Retrieve the test ID from the URL
if(isset($_GET['test_id'])) {
    $testID = $_GET['test_id'];

    // Fetch test price from the database based on test ID
    $sql = "SELECT price FROM tbltests WHERE ID = :testID";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':testID', $testID, PDO::PARAM_INT);
    $stmt->execute();
    $testPrice = $stmt->fetchColumn();
    
    // Concatenate "Rs." before the test price
    $formattedPrice = 'Rs. ' . $testPrice;
} else {
    // If test ID not set, default test price to 0
    $formattedPrice = 'Rs. 0';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/pay.css">

</head>
<body>

<div class="container">

    <form action="">

        <div class="row">

            <div class="col">
                <h3 class="inputBox">
                    <span>payable amount</span>
                    <!-- Echoing the formatted test price into the input field -->
                    <input type="text" placeholder="price" id="price" value="<?php echo htmlspecialchars($formattedPrice); ?>" readonly>
                </h3>

                <h3 class="title">billing address</h3>

                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" placeholder="Tharusha Navod">
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" placeholder="examplemail@gmail.com">
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" placeholder="room - street - locality">
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" placeholder="Colombo">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>state :</span>
                        <input type="text" placeholder="Sri Lanka">
                    </div>
                    <div class="inputBox">
                        <span>zip code :</span>
                        <input type="text" placeholder="60540">
                    </div>
                </div>

            </div>

            <div class="col"><br>

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="../images/payment-gateway/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" placeholder="mr. Tharusha Navod">
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" placeholder="1111-2222-3333-4444">
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text" placeholder="march">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" placeholder="2024">
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="###">
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" value="proceed to checkout" class="submit-btn">

    </form>

</div>    
    
</body>
</html>
