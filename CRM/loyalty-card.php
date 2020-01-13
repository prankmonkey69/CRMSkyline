<?php
include '../class/db.php';
include '../class/controller.php';
include '../class/view.php';
$object = new View;
$row = $object->viewCustomer_loyalty_view($_GET['id']);


require "pdf/fpdf.php";



//$pdf = new PDF_HTML('L','mm',array(88.9,50.8));
$pdf = new FPDF('L','mm',array(88.9,50.8));
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();

$pdf->SetMargins(5, 0, 0);
$pdf->Image('card/frontcard.png',0,0,88.9,50.8);

if($rows = $row->fetch()){
$pdf->SetFont('Arial','',12);

$pdf->Cell(1,10,'',0,1);
$pdf->Cell(1,2,'',0,1);
$pdf->Cell(1,5,'',0,1);
$pdf->Cell(1,10,'',0,1);
$pdf->Cell(1,5,'Loyaty ID: '.$rows[0],0,1,"L");
$pdf->Cell(1,5,ucfirst($rows['lname']).', '.ucfirst($rows['fname']).' '.ucfirst($rows['mname']).'.',0,1,"L");


$pdf->AddPage();
$pdf->SetFont('Arial','',9);
$pdf->SetMargins(5, 5, 5);
$pdf->Image('card/backcard.png',0,0,88.9,50.8);

$pdf->Cell(0,5,'',0,1);
$pdf->Cell(17,5,'ADDRESS: ',0,0);
$pdf->MultiCell(65,5,''.$rows['address'],0,1);
$pdf->Cell(1,5,'DATE OF BIRTH: '.date_format(date_create($rows['birthdate']),"m/j/Y"),0,1);
$pdf->Cell(1,5,'DATE ISSUED: '.date_format(date_create($rows['created_at']),"m/j/Y"),0,1);
$pdf->Cell(1,5,'CONTACT NO.: '.$rows['contact_number'],0,1);
$pdf->SetFont('Arial','B',9);
$pdf->SetMargins(-1, 5, 5);

$pdf->Cell(0,5,'',0,1);
$pdf->Cell(0,5,'____________________________________________________',0,1);
$pdf->SetFont('Arial','',9);
$pdf->Cell(88,5,' * The use of this card is exclusive on Skyline Hotel . * ',0,1,'C');
$pdf->Cell(88,5,' * If the card is lost. Please request for replacement. * ',0,1,'C');
}
$pdf->output();


?>