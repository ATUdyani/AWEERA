<?php
require('../model/Appointment.php');
require('../model/Payment.php');
require('../model/Report.php');
require('../fpdf/fpdf.php');

if(!empty($_POST['submit'])){

    $date=$_POST['rdate'];

    $appointment = new Appointment();
    $row = $appointment -> getAppointmentCount($date);
    $appointment_count=$row['appointment_count'];

    $row = $appointment -> getAppointmentCommissionSumByDate($date);
    $commission_sum=$row['commission_sum'];

    $payment = new Payment();
    $row = $payment -> getAppointmentPaymentSumByDate($date);
    $payment_sum=$row['payment_sum'];

    $profit = $payment_sum-$commission_sum;


    $pdf=new FPDF();
    $pdf->AddPage();

    $report = new Report();
    $report ->setHeader($pdf);

    $pdf->Cell(189 ,15,'Daily Collection Report - Appointments',0,1,'C');//end of line

    $pdf->SetFont('Arial','B',16);

    $txt = $date; //access the variable
    $pdf->Cell(189 ,15,$txt,0,1,'C');//end of line

    $pdf->Cell(189 ,10,'',0,1,'C');//end of line
    $pdf->Cell(189 ,10,'',0,1,'C');//end of line


    $pdf->SetFont('Arial','',14);


    $pdf->Cell(40 ,10,'',0,0,'C');//end of line
    $pdf->Cell(69 ,10,'Number of Appointments',0,0,'L');
    $pdf->Cell(80 ,10,$appointment_count,0,1,'C');//end of line

    $pdf->Cell(40 ,10,'',0,0,'C');//end of line
    $pdf->Cell(69 ,10,'Total Income',0,0,'L');
    $pdf->Cell(80 ,10,"Rs. ".number_format($payment_sum, 2, '.', ''),0,1,'C');//end of line

    $pdf->Cell(40 ,10,'',0,0,'C');//end of line
    $pdf->Cell(69 ,10,'Total Commission',0,0,'L');
    $pdf->Cell(80 ,10,"Rs. ".number_format($commission_sum, 2, '.', ''),0,1,'C');//end of line

    $pdf->Cell(40 ,10,'',0,0,'C');//end of line
    $pdf->Cell(69 ,10,'PROFIT',0,0,'L');
    $pdf->Cell(80 ,10,"Rs. ".number_format($profit, 2, '.', ''),1,1,'C');//end of line

    $pdf->Cell(40 ,10,'',0,0,'C');//end of line
    //$pdf->Cell(69 ,10,'Total Commission',0,0,'L');
    //$pdf->Cell(80 ,10,$t_commission,0,1,'C');//end of line

    $pdf->output();
}

?>