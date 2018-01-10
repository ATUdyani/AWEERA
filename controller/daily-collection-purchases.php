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
    $pdf->AddFont('Gadugi','','gadugi.php');
    $pdf->AddPage();

    $pdf->Rect(5, 5, 200, 287, 'D');

    $report = new Report();
    $report ->setHeader($pdf);

    $pdf->Cell(189 ,15,'Daily Collection Report - Purchases',0,1,'C');//end of line

    $pdf->Cell(189 ,5,$date,0,1,'C');//end of line

    $pdf->Cell(189 ,10,'',0,1,'C');//end of line
    $pdf->Cell(189 ,10,'',0,1,'C');//end of line


    $pdf->SetFont('Gadugi','',14);


    $pdf->Cell(30 ,10,'',0,0,'C');//end of line
    $pdf->Cell(50 ,10,'Number of Purchases',0,0,'L');
    $pdf->Cell(80 ,10,$purchase_count,0,1,'R');//end of line

    $pdf->SetFont('Arial','b',14);
    $pdf->Cell(40 ,7,'',0,1,'C');//end of line
    $pdf->Cell(120 ,10,'TOTAL INCOME',0,0,'C');
    $pdf->Cell(40 ,10,"Rs. ".number_format($payment_sum, 2, '.', ''),1,1,'R');//end of line

    $pdf->Cell(40 ,10,'',0,0,'C');//end of line
    //$pdf->Cell(69 ,10,'Total Commission',0,0,'L');
    //$pdf->Cell(80 ,10,$t_commission,0,1,'C');//end of line

    $pdf->output();
}

?>