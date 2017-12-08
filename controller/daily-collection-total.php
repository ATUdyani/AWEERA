<?php
require('../model/Appointment.php');
require('../model/Purchase.php');
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
    $appointment_payment_sum=$row['payment_sum'];

    $profit_appointment = $appointment_payment_sum-$commission_sum;

    $purchase = new Purchase();
    $row = $purchase -> getPurchaseCountByDate($date);
    $purchase_count=$row['purchase_count'];


    $payment = new Payment();
    $row = $payment -> getPurchasePaymentSumByDate($date);
    $purchase_payment_sum=$row['payment_sum'];

    $total_income = $appointment_payment_sum + $purchase_payment_sum;

    $pdf=new FPDF();
    $pdf->AddPage();

    $report = new Report();
    $report ->setHeader($pdf);

    $pdf->Cell(189 ,15,'Daily Collection Report - Total',0,1,'C');//end of line

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
    $pdf->Cell(69 ,10,'Income from Appointments',0,0,'L');
    $pdf->Cell(80 ,10,"Rs. ".number_format($appointment_payment_sum, 2, '.', ''),0,1,'C');//end of line

    $pdf->Cell(40 ,10,'',0,0,'C');//end of line
    $pdf->Cell(69 ,10,'Total Commission',0,0,'L');
    $pdf->Cell(80 ,10,"Rs. ".number_format($commission_sum, 2, '.', ''),0,1,'C');//end of line

    $pdf->Cell(40 ,10,'',0,0,'C');//end of line
    $pdf->Cell(69 ,10,'Profit from Appointments',0,0,'L');
    $pdf->Cell(80 ,10,"Rs. ".number_format($profit_appointment, 2, '.', ''),0,1,'C');//end of line

    $pdf->Cell(189 ,15,"",0,1,'C');//end of line



    $pdf->Cell(40 ,10,'',0,0,'C');//end of line
    $pdf->Cell(69 ,10,'Number of Purchases',0,0,'L');
    $pdf->Cell(80 ,10,$purchase_count,0,1,'C');//end of line

    $pdf->Cell(40 ,10,'',0,0,'C');//end of line
    $pdf->Cell(69 ,10,'Income from Purchases',0,0,'L');
    $pdf->Cell(80 ,10,"Rs. ".number_format($purchase_payment_sum, 2, '.', ''),0,1,'C');//end of line

    $pdf->Cell(189 ,15,"",0,1,'C');//end of line



    $pdf->Cell(40 ,10,'',0,0,'C');//end of line
    $pdf->Cell(69 ,10,'TOTAL INCOME',0,0,'L');
    $pdf->Cell(80 ,10,"Rs. ".number_format($total_income, 2, '.', ''),1,1,'C');//end of line


    $pdf->Cell(40 ,10,'',0,0,'C');//end of line
    //$pdf->Cell(69 ,10,'Total Commission',0,0,'L');
    //$pdf->Cell(80 ,10,$t_commission,0,1,'C');//end of line

    $pdf->output();
}

?>