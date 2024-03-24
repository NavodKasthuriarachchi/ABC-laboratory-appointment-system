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

    <script>
        function formatCreditCardNumber(input) {
            // Remove non-numeric characters from the input value
            var sanitizedInput = input.value.replace(/\D/g, '');
            
            // Format the input value with hyphens after every fourth character
            var formattedInput = '';
            for (var i = 0; i < sanitizedInput.length; i++) {
                if (i > 0 && i % 4 === 0) {
                    formattedInput += '-';
                }
                formattedInput += sanitizedInput[i];
            }
            
            // Update the input field value with the formatted value
            input.value = formattedInput;
        }

        function validateForm() {
            // Validation for full name
            var fullName = document.getElementById("fullName").value;
            var fullNameWords = fullName.split(' ').filter(function(word) {
                return word.trim() !== '';
            });
            if (fullNameWords.length < 2) {
                alert("Please enter your full name with at least two words");
                return false;
            }

            // Validation for email
            var email = document.getElementById("email").value;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address");
                return false;
            }

            // Validation for address
            var address = document.getElementById("address").value;
            var addressWords = address.split(' ').filter(function(word) {
                return word.trim() !== '';
            });
            if (addressWords.length < 2) {
                alert("Please enter your address with at least two words");
                return false;
            }

            // Validation for city
            var city = document.getElementById("city").value;
            if (city == "") {
                alert("Please enter your city");
                return false;
            }

            // Validation for state
            var state = document.getElementById("state").value;
            if (state == "") {
                alert("Please enter your state");
                return false;
            }

            // Validation for zip code
            var zipCode = document.getElementById("zipCode").value;
            var zipCodeRegex = /^\d{5}$/; // Assuming zip code is 5 digits long
            if (!zipCodeRegex.test(zipCode)) {
                alert("Please enter a valid zip code");
                return false;
            }

            // Validation for name on card
            var nameOnCard = document.getElementById("nameOnCard").value;
            if (nameOnCard == "") {
                alert("Please enter the name on your card");
                return false;
            }

            // Validation for credit card number
            var creditCardNumber = document.getElementById("creditCardNumber").value;
            var creditCardRegex = /^\d{4}-\d{4}-\d{4}-\d{4}$/; // Assuming credit card number format
            if (!creditCardRegex.test(creditCardNumber)) {
                alert("Please enter a valid credit card number");
                return false;
            }

            // Validation for exp month
            var expMonth = document.getElementById("expMonth").value;
            if (expMonth == "") {
                alert("Please enter the expiration month");
                return false;
            }

            // Validation for exp year
            var expYear = document.getElementById("expYear").value;
            if (expYear == "") {
                alert("Please enter the expiration year");
                return false;
            }

            // Validation for CVV
            var cvv = document.getElementById("cvv").value;
            var cvvRegex = /^\d{3}$/; // Assuming CVV is 3 digits long
            if (!cvvRegex.test(cvv)) {
                alert("Please enter a valid CVV (3 digits)");
                return false;
            }

            return true; // Form is valid
        }
    </script>
</head>
<body>

<div class="container">

    <form onsubmit="return validateForm()">

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
                    <input type="text" placeholder="Tharusha Navod" id="fullName">
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" placeholder="examplemail@gmail.com" id="email">
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" placeholder="room - street - locality" id="address">
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" placeholder="Colombo" id="city">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>state :</span>
                        <input type="text" placeholder="Sri Lanka" id="state">
                    </div>
                    <div class="inputBox">
                        <span>zip code :</span>
                        <input type="text" placeholder="60540" id="zipCode">
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
                    <input type="text" placeholder="mr. Tharusha Navod" id="nameOnCard">
               
                    <div class="inputBox">
    <span>credit card number :</span>
    <input type="text" placeholder="1111-2222-3333-4444" id="creditCardNumber" oninput="formatCreditCardNumber(this)">
</div>
<div class="inputBox">
    <span>exp month :</span>
    <input type="text" placeholder="march" id="expMonth">
</div>

<div class="flex">
    <div class="inputBox">
        <span>exp year :</span>
        <input type="text" placeholder="2024" id="expYear">
    </div>
    <div class="inputBox">
        <span>CVV :</span>
        <input type="text" placeholder="###" id="cvv">
    </div>
</div>

</div>
    
</div>

</div>

<input type="submit" value="proceed to checkout" class="submit-btn">

</form>

</div>    
    
</body>
</html>
