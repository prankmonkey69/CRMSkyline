<?php
include '../class/db.php';
include '../class/controller.php';
include '../class/view.php';
$object = new View;
$info = $object->viewtEnclosement($_GET["id"]);
$type = $object->viewEnclosetype($_GET["id"]);  
$date = $object->viewtEnclosement($_GET["id"]);


require "pdf/fpdf.php";

class enclose extends FPDF{
    function header(){
        $this->Image('../images/logo.png',70,6,15,15);
        $this->SetFont('Arial','B',18);
        $this->Cell('200','5','Enclosement',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell('200','8','Travel Agent Enclosement',0,0,'C');
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


        if ($data = $info->fetch()) {
            $diff1 = date_create($data['reserved_date']);
            $diff2 = date_create($data['check_out_date']);
            $diff = date_diff($diff1,$diff2)->format("%a%");
        $pdf->SetFont('Arial','',12);
        $pdf->Cell('15','5','Name: ',0,0);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell('15','5', ucfirst($data['firstname']).' '.ucfirst($data['lastname']),0,1);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell('15','5', 'Contact #: '.ucfirst($data['contact_no']),0,1);
        $pdf->Cell('15','5','Email: '.$data['email'],0,1);
        $pdf->Cell('15','10','_____________________________________________________________________________',0,1);
        $pdf->Cell('15','5','',0,1);
        $pdf->Cell('73','5','Number of Guest: '.$data['no_of_guests'],0,0);
        $pdf->Cell('73','5','Reserved Date: '.date("F j, Y",strtotime($data['reserved_date'])),0,1);
        $pdf->Cell('73','5','Check Out Date: '.date("F j, Y",strtotime($data['check_out_date'])),0,0);
        $pdf->Cell('73','5','Number of Days: '.$diff,0,1);
        $pdf->Cell('73','5','Package Name: '.$data['promo'],0,0);
        $pdf->Cell('73','5','Number of Room: '.$data['no_of_room'],0,1);
        $pdf->Cell('73','5','Package Rate: '.$data['promorate'].' Php/Day',0,0);
        $pdf->Cell('73','5','',0,1);
        $pdf->Cell('73','5','',0,1);
        $pdf->Cell('73','5','',0,0);
        $pdf->Cell('73','5','Total Amount: '.$data['promorate']*$diff*$data['no_of_room'].' Php',0,1);
        $pdf->Cell('15','5','_____________________________________________________________________________',0,1);
        $pdf->Cell('15','5','',0,1);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell('73','10','Include(s):',0,1);
        while ($types = $type->fetch()) {
            $pdf->SetFont('Arial','',12);
            $pdf->Cell('73','5',$types['type'],0,1);
        }
        $pdf->Cell('15','5','_____________________________________________________________________________',0,1);
        $pdf->Cell('15','5','',0,1);


        $pdf->Cell('130','5','',0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell('25','7','Date Created:',0,0);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell('10','7',date("F j, Y",strtotime($data['created_at'])),0,1);
        
        
        }



$pdf->output();

