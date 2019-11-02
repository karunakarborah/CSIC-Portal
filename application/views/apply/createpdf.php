<?php

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('CSIC');
$pdf->SetTitle('CSIC Application');
$pdf->SetSubject('Application');
$pdf->SetKeywords('CSIC');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 021', PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// add a page
$pdf->AddPage();



$application_no=$_POST["application_no"];
$fname= ucfirst($_POST["fname"]);
$lname= ucfirst($_POST["lname"]);
$phone= $_POST["phone"];
$email= $_POST["email"];
$supervisor= $_POST["supervisor"];
$department= $_POST["department"];
$institution= $_POST["institution"];


// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 255);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

$pdf->SetFont('times', '', 20);
$pdf->MultiCell(25, 10, '<img src="assets/img/dulogo.png" width="75" height="75">', 0, 'L', 0, 0, '10', '10', true, 0, true);
$pdf->MultiCell(150, 10, 'Central Sophisticated Instrumentation Centre', 0, 'L', 0, 0, '35', '12', true, 0, false);
$pdf->SetFont('times', '', 12);
$pdf->MultiCell(150, 10, 'Dibrugarh University, Assam', 0, 'L', 0, 0, '35', '22', true, 0, false);

$pdf->SetFont('times', '', 12);

$pdf->MultiCell(55, 42, 'Application No:<br><br><img src="assets/barcode/'.$application_no.'.png" width="132px" height="62px"></br>'.$application_no, 1, 'C', 0, 0, '130', '40', true, 0, true, true, 0, 'B');



$pdf->SetFont('times', '', 10);
$pdf->MultiCell(35, 7, 'Name:   ', 1, 'R', 0, 0, '15', '40', true, 0, false);
$pdf->MultiCell(80, 7, $fname.' '.$lname, 1, 'L', 0, 0, '50', '40', true, 0, false);
$pdf->MultiCell(35, 7, 'Phone:   ', 1, 'R', 0, 0, '15', '47', true, 0, false);
$pdf->MultiCell(80, 7, $phone, 1, 'L', 0, 0, '50', '47', true, 0, false);
$pdf->MultiCell(35, 7, 'Email:   ', 1, 'R', 0, 0, '15', '54', true, 0, false);
$pdf->MultiCell(80, 7, $email, 1, 'L', 0, 0, '50', '54', true, 0, false);
$pdf->MultiCell(35, 7, 'Supervisor:   ', 1, 'R', 0, 0, '15', '61', true, 0, false);
$pdf->MultiCell(80, 7, $supervisor, 1, 'L', 0, 0, '50', '61', true, 0, false);
$pdf->MultiCell(35, 7, 'Department:   ', 1, 'R', 0, 0, '15', '68', true, 0, false);
$pdf->MultiCell(80, 7, $department, 1, 'L', 0, 0, '50', '68', true, 0, false);
$pdf->MultiCell(35, 7, 'Institution:   ', 1, 'R', 0, 0, '15', '75', true, 0, false);
$pdf->MultiCell(80, 7, $institution, 1, 'L', 0, 0, '50', '75', true, 0, false);






// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($application_no.'.pdf', 'I');


?>