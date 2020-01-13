<?php
include '../class/db.php';
include '../class/controller.php';
include '../class/view.php';
$object = new View;
$row = $object->viewComplaints_view($_GET['id']);


require "pdf/fpdf.php";

class enclose extends FPDF{
    function header(){
        $this->Image('../images/logo.png',70,6,15,15);
        $this->SetFont('Arial','B',18);
        $this->Cell('200','5','Complaint',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell('200','8','Complaint Report',0,0,'C');
        $this->Ln(30);
    }
    
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',6);
        $this->Cell(0,10,'Page: '.$this->PageNo().'/{nb}',0,0);
    }

}

$pdf = new enclose();
$pdf->AliasNbPages();

$pdf->AddPage('P','A4',0);


        if ($data = $row->fetch()) {
        $pdf->SetFont('Arial','',12);
        $pdf->Cell('39','5','Complainant Name: ',0,0);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell('15','5', ucfirst($data['lname']).', '.ucfirst($data['fname']).' '.ucfirst($data['mname']),0,1);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell('15','10','_____________________________________________________________________________',0,1);
        $pdf->Cell('39','5','Complaint: ',0,1);
        $pdf->Cell('15','5','',0,0);
        $pdf->Cell('39','5',$data['message'],0,0);
        $pdf->Cell('15','5','',0,1);
        
        $pdf->Cell('15','5','_____________________________________________________________________________',0,1);


        $pdf->Cell('130','5','',0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell('25','7','Date Created:',0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell('10','7',date("F j, Y",strtotime($data['created_at'])),0,1);
        
        
        }



$pdf->output();

