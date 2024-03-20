<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
<head>
    <meta charset="UTF-8">
    <title>Send Email</title>
</head>
<body>
    <form class="" action="send.php" method="post">
        Email <input type="email" id="email" name="email" value="<?php echo isset($_GET['email']) ? htmlentities($_GET['email']) : ''; ?>"> <br>
        Subject <input type="text" name="subject" value=""> <br>
        Message <input type="text" name="message" value=""> <br>
        <button type="submit" name="send">Send</button>
    </form>
    <script>
        function populateEmail(email) {
            // Populate the email input field with the appointment's email address
            document.getElementById('email').value = email;
        }
    </script>
</body>
</html>
