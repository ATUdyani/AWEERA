<?php
require('../model/Purchase.php');
require('../model/Payment.php');
require('../model/Report.php');
require('../fpdf/fpdf.php');

if(!empty($_POST['submit'])){

    $date=$_POST['rdate'];

    $purchase = new Purchase();
    $row = $purchase -> getPurchaseCountByDate($date);
    $purchase_count=$row['purchase_count'];


    $payment = new Payment();
    $row = $payment -> getPurchasePaymentSumByDate($date);
    $payment_sum=$row['payment_sum'];


    $pdf=new FPDF();
    $pdf->AddPage();

    $report = new Report();
    $report ->setHeader($pdf);

    $pdf->Cell(189 ,15,'Daily Collection Report - Purchases',0,1,'C');//end of line

    $pdf->SetFont('Arial','B',16);

    $txt = $date; //access the variable
    $pdf->Cell(189 ,15,$txt,0,1,'C');//end of line

    $pdf->Cell(189 ,10,'',0,1,'C');//end of line
    $pdf->Cell(189 ,10,'',0,1,'C');//end of line


    $pdf->SetFont('Arial','',14);


    $pdf->Cell(40 ,10,'',0,0,'C');//end of line
    $pdf->Cell(69 ,10,'Number of Purchases',0,0,'L');
    $pdf->Cell(80 ,10,$purchase_count,0,1,'C');//end of line

    $pdf->Cell(40 ,10,'',0,0,'C');//end of line
    $pdf->Cell(69 ,10,'Total Income',0,0,'L');
    $pdf->Cell(80 ,10,number_format($payment_sum, 2, '.', ''),0,1,'C');//end of line

    $pdf->Cell(40 ,10,'',0,0,'C');//end of line
    //$pdf->Cell(69 ,10,'Total Commission',0,0,'L');
    //$pdf->Cell(80 ,10,$t_commission,0,1,'C');//end of line

    $pdf->output();
}

?>