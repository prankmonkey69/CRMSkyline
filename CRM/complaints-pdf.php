<?php
include '../class/db.php';
include '../class/controller.php';
include '../class/view.php';
$object = new View;
$row = $object->viewComplaints();


require "pdf/fpdf.php";

class report extends FPDF{
    function header(){
        $this->Image('Images.png',10,6,30,20);
        $this->SetFont('Arial','B',14);
        $this->Cell('275','5','Complaints',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell('275','10','Guest Complaints',0,0,'C');
        $this->Ln(20);
    }
    
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',6);
        $this->Cell(0,10,'Page: '.$this->PageNo().'/{nb}',0,0,'C');
    }

    function tableheader(){
        $this->Cell('40','10','ID',1,0,'C');
        $this->Cell('80','10','Guest Name',1,0,'C');
        $this->Cell('50','10','Date Created',1,0,'C');
        $this->Cell('50','10','Status',1,0,'C');
        $this->Cell('50','10','Resolve Date',1,0,'C');
        $this->Ln();
    }

    function table($row){
        $this->SetFont('Times','',12);
        while ($data = $row->fetch()) {
            $this->Cell('80','10','1',1,0,'C');
            $this->Cell('50','10','Date Created',1,0,'C');
            $this->Cell('50','10','Status',1,0,'C');
            $this->Cell('50','10','Resolve Date',1,0,'C');
            $this->Ln();
        }
    }

}

$pdf = new report();
$pdf->AliasNbPages();

$pdf->AddPage('L','A4',0);
$pdf->tableheader();

$pdf->SetFont('Times','',12);
$count = 1;
        while ($data = $row->fetch()) {

            $pdf->Cell('40','10',$count++,1,0,'C');
            $pdf->Cell('80','10',$data['lname'].', '.$data['fname'],1,0,'C');
            $pdf->Cell('50','10', date("F d Y",strtotime($data['created_at'])),1,0,'C');
            $pdf->Cell('50','10','',1,0,'C');
            $pdf->Ln();
            /*if($data['action']!=null){
            $pdf->Cell('50','10','Resolve',1,0,'C');
            $pdf->Cell('50','10',date("F d Y",strtotime($data['updated_at'])),1,0,'C');
            
            }else{
            $pdf->Cell('50','10','Not Resolve',1,0,'C');
            $pdf->Cell('50','10', '' ,1,0,'C');
            $pdf->Ln();
            }*/
        }
 

$pdf->output();

