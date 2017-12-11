<?php
require('../model/Appointment.php');
require('../model/Purchase.php');
require('../model/Payment.php');
require('../model/Report.php');
require('../fpdf/fpdf.php');

if(!empty($_POST['submit'])){

    $fdate=$_POST['fromdate'];
    $tdate=$_POST['todate'];

    $appointment = new Appointment();
    $row = $appointment -> getAppointmentCountPeriod($fdate,$tdate);
    $appointment_count=$row['appointment_count'];

    $row = $appointment -> getAppointmentCommissionSumByPeriod($fdate,$tdate);
    $commission_sum=$row['commission_sum'];

    $payment = new Payment();
    $row = $payment -> getAppointmentPaymentSumByPeriod($fdate,$tdate);
    $appointment_payment_sum=$row['appointment_payment_sum'];

    $profit_appointment = $appointment_payment_sum-$commission_sum;

    $purchase = new Purchase();
    $row = $purchase -> getPurchaseCountByPeriod($fdate,$tdate);
    $purchase_count=$row['purchase_count'];


    $payment = new Payment();
    $row = $payment -> getPurchasePaymentSumByPeriod($fdate,$tdate);
    $purchase_payment_sum=$row['purchase_payment_sum'];

    $total_income = $profit_appointment + $purchase_payment_sum;

    $pdf=new FPDF();
    $pdf->AddFont('Gadugi','','gadugi.php');
    $pdf->AddPage();

    $pdf->Rect(5, 5, 200, 287, 'D');

    $report = new Report();
    $report ->setHeader($pdf);

    $pdf->Cell(189 ,15,'Period Collection Report - Total',0,1,'C');//end of line

    $pdf->SetFont('Gadugi','',16);

    $txt = $date; //access the variable
    $pdf->Cell(189 ,5,$txt,0,1,'C');//end of line

    $pdf->Cell(189 ,10,'',0,1,'C');//end of line
    $pdf->Cell(189 ,10,'',0,1,'C');//end of line


    $pdf->SetFont('Gadugi','',14);


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