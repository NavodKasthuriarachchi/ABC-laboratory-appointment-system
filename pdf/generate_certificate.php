<?php
require('../tcpdf/tcpdf.php');

$name = $_POST['name'];
$age = $_POST['age'];
$course = $_POST['course'];
$date = $_POST['date'];
$technician = $_POST['technician'];
$results = $_POST['results'];
$comments = $_POST['comments'];

// Create new TCPDF instance
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', true);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('ABC Laboratory Test Report');

// Set default font subsetting mode
$pdf->setFontSubsetting(true);

// Add a page
$pdf->AddPage();

// Set background color
$pdf->SetFillColor(245, 245, 245); // Light gray
$pdf->Rect(0, 0, $pdf->getPageWidth(), $pdf->getPageHeight(), 'F');

// Set font
$pdf->SetFont('helvetica', '', 12);

// Title
$pdf->SetFont('helvetica', 'B', 24);
$pdf->SetTextColor(0, 51, 153); // Dark blue
$pdf->Cell(0, 10, 'ABC Laboratory Test Report', 0, 1, 'C', true);
$pdf->Ln(10);

// Main content
$pdf->SetFont('helvetica', '', 16);
$pdf->SetTextColor(0, 0, 0); // Black text color
$pdf->MultiCell(0, 10, "This certifies that\n\n$name\n\nAge: $age\n\nhas successfully completed the\n\n$course\n\non $date\n\nTest Results: $results\n\nTechnician: $technician\n\nComments: $comments", 0, 'C', true);

// Output PDF to browser
$pdf->Output($name . '-' . $course . '-' . 'certificate.pdf', 'D');
?>
