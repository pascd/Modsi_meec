<?php
require_once '../vendor/autoload.php'; // Include the TCPDF autoloader

use \TCPDF;

// HTML content
$html = '<html><body><h1>Hello, World!</h1></body></html>';

// Create new PDF document
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('HTML to PDF');
$pdf->SetSubject('Converting HTML to PDF using TCPDF');
$pdf->SetKeywords('HTML, PDF, PHP, TCPDF');

// Set default header data
$pdf->SetHeaderData('', '', 'HTML to PDF using TCPDF', '');

// Set header and footer fonts
$pdf->setHeaderFont(Array('helvetica', '', 10));
$pdf->setFooterFont(Array('helvetica', '', 8));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont('courier');

// Set margins
$pdf->SetMargins(15, 15, 15);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 15);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Set font
$pdf->SetFont('helvetica', '', 11);

// Add a page
$pdf->AddPage();

// Write HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Output the generated PDF to the browser or save it to a file
$pdf->Output('output.pdf', 'I');
