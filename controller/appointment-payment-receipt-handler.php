<?php
require('../model/Report.php');
require('../model/Appointment.php');
require('../fpdf/fpdf.php');
session_start();

$data = json_decode($_GET['data']);
$appointment_id_array = $data[0];
$appointment_amount_array = $data[1];
$sub_total = $data[2];
$payment_id="";
$service_name_array = [];

$appointment = new Appointment();
$service = new Service();

foreach ($appointment_id_array as $appointment_id){
    $result_appointment = $appointment->getAppointmentData($appointment_id);
    $result_service = $service->getServiceData($result_appointment['service_id']);
    array_push($service_name_array,$result_service['service_name']);
    $payment_id = $result_appointment['payment_id'];
}


date_default_timezone_set('Asia/Colombo');
$date = date("Y-m-d");
$time = date("H:i:s a" );

$pdf=new FPDF();
$pdf->AddFont('Gadugi','','gadugi.php');
$pdf->AddPage('P','A5');

$pdf->Rect(5, 5, 138, 200, 'D');

$report = new Report();
$report ->setHeaderReceipt($pdf);

//$pdf->Cell(130 ,15,'Daily Collection Report - Total',0,1,'C');//end of line

$pdf->SetFont('Gadugi','',10);

$pdf->Cell(20 ,5,'Date   :',0,0,'L');//end of line
$pdf->Cell(30 ,5,$date,0,0,'L');

$pdf->Cell(22 ,5,'',0,0,'L');//end of line

$pdf->Cell(30 ,5,'Receptionist   :',0,0,'L');
$pdf->Cell(30 ,5,$_SESSION['first_name'],0,0,'L');

$pdf->Cell(189 ,7,'',0,1,'C');//end of line

$pdf->Cell(20 ,5,'Time   :',0,0,'L');//end of line
$pdf->Cell(30 ,5,$time,0,0,'L');

$pdf->Cell(22 ,5,'',0,0,'L');//end of line

$pdf->Cell(30 ,5,'Invoice No     :',0,0,'L');
$pdf->Cell(30 ,5,$payment_id,0,0,'L'); //PAY0000001


$pdf->Cell(189 ,10,'',0,1,'C');//end of line
$pdf->Cell(189 ,10,'',0,1,'C');//end of line


$pdf->SetFont('Gadugi','u',12);

$pdf->Cell(15 ,10,'',0,0,'L');
$pdf->Cell(70 ,10,'Service',0,0,'L');
$pdf->Cell(10 ,10,'Amount',0,0,'L');

$pdf->SetFont('Gadugi','',10);

$pdf->Cell(189 ,5,'',0,1,'C');//end of line

$count=0;
foreach ($appointment_id_array as $appointment_id){
    $pdf->Cell(189 ,5,'',0,1,'C');//end of line
    $pdf->Cell(15 ,10,'',0,0,'L');
    $pdf->Cell(70 ,10,$service_name_array[$count],0,0,'L');
    $pdf->Cell(10 ,10,"Rs. ".number_format($appointment_amount_array[$count], 2, '.', ''),0,0,'L');
    $count+=1;
}

$pdf->Cell(189 ,10,'',0,1,'C');//end of line
$pdf->Cell(15 ,10,'',0,0,'L');


$pdf->SetFont('Arial','b',12);
$pdf->Cell(68 ,10,'SUB TOTAL',0,0,'L');
$pdf->Cell(25 ,10,"Rs. ".number_format($sub_total, 2, '.', ''),1,0,'C');//end of line

$pdf->output();
?>