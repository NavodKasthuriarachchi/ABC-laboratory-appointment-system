<?php
require('tcpdf/tcpdf.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $date = $_POST['date'];
    $technician = $_POST['technician'];
    $results = $_POST['results'];
    $comments = $_POST['comments'];

    // Initialize TCPDF
    $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', true);

    // Set document title
    $pdf->SetTitle('Certificate of Completion');

    // Add new page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', '', 12);

    // HTML template with user input data
    $html = "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Certificate of Completion</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            .container {
                padding: 20px;
            }
            h1 {
                text-align: center;
            }
            p {
                text-align: center;
            }
            .info {
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <h1>Certificate of Completion</h1>
            <p>This certifies that</p>
            <p><strong>$name</strong></p>
            <p>Age: <strong>$age</strong></p>
            <p>has successfully completed the</p>
            <p><strong>$course</strong></p>
            <p>on <strong>$date</strong></p>
            <div class='info'>
                <p>Technician's Name: <strong>$technician</strong></p>
                <p>Test Results: <strong>$results</strong></p>
                <p>Comments: <em>$comments</em></p>
            </div>
        </div>
    </body>
    </html>
    ";

    // Output HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // Output the PDF as a download
    $pdf->Output('Certificate_' . $name . '.pdf', 'D');
}
?>
