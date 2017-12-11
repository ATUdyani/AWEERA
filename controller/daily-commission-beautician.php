<?php
require('../model/Commission.php');

require('../model/Report.php');
require('../fpdf/fpdf.php');

if(!empty($_POST['submit'])){

    $date=$_POST['rdate'];
    $emp_id=$_POST['select_beautician_name'];

    $commission = new Commission();
    $row = $commission -> getBeauticianCommissionSumByDate($date,$emp_id);
    $beautician_com=$row['commission'];
    $beautician_name=$row['employee_name'];


   


    $pdf=new FPDF();
    $pdf->AddFont('Gadugi','','gadugi.php');
    $pdf->AddPage();

    $pdf->Rect(5, 5, 200, 287, 'D');

    $report = new Report();
    $report ->setHeader($pdf);

    $pdf->Cell(189 ,15,'Daily Commission Report - Beautician',0,1,'C');//end of line

    $pdf->SetFont('Gadugi','',16);

    $txt = $date; //access the variable
    $pdf->Cell(189 ,5,$txt,0,1,'C');//end of line

    $pdf->Cell(189 ,10,'',0,1,'C');//end of line
    $pdf->Cell(189 ,10,'',0,1,'C');//end of line


    $pdf->SetFont('Gadugi','',14);


    $pdf->Cell(40 ,10,'',0,0,'C');//end of line
    $pdf->Cell(69 ,10,$beautician_name,0,0,'L');
    $pdf->Cell(80 ,10,"Rs. ".number_format($beautician_com, 2, '.', ''),0,1,'C');//end of line

   
    //$pdf->Cell(69 ,10,'Total Commission',0,0,'L');
    //$pdf->Cell(80 ,10,$t_commission,0,1,'C');//end of line

    $pdf->output();
}

?>