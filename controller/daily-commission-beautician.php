<?php
require('../model/Beautician.php');
require('../model/Appointment.php');

require('../model/Report.php');
require('../fpdf/fpdf.php');

if(!empty($_POST['submit'])){

    $date=$_POST['rdate'];
    $emp_id=$_POST['select_beautician_name'];

    $beautician = new Beautician();
    $row_beautician = $beautician -> getBeauticianCommissionSumByDate($date,$emp_id);

    $appointment = new Appointment();
    $result_appointments = $appointment ->getBeauticianAppointments($emp_id,$date);

    $beautician_com=$row_beautician['commission'];
    $beautician_name=$row_beautician['first_name']." ".$row_beautician['last_name'];

    $pdf=new FPDF();
    $pdf->AddFont('Gadugi','','gadugi.php');
    $pdf->AddPage();

    $pdf->Rect(5, 5, 200, 287, 'D');

    $report = new Report();
    $report ->setHeader($pdf);

    $pdf->Cell(189 ,10,'Daily Commission Report - '.$beautician_name,0,1,'C');//end of line

    $txt = $date; //access the variable
    $pdf->Cell(189 ,5,$txt,0,1,'C');//end of line

    $pdf->Cell(189 ,10,'',0,1,'C');//end of line


    $pdf->SetFont('Gadugi','u',12);

    $pdf->Cell(35 ,10,'Appointment',0,0,'C');
    $pdf->Cell(45 ,10,'Service Name',0,0,'C');
    $pdf->Cell(40 ,10,'Charge',0,0,'C');
    $pdf->Cell(40 ,10,'Percentage',0,0,'C');
    $pdf->Cell(40 ,10,'Commission',0,0,'C');

    $pdf->Cell(40 ,10,'',0,1,'C');//end of line

    $pdf->SetFont('Gadugi','',12);

    while($row=mysqli_fetch_assoc($result_appointments)){
        $pdf->Cell(35 ,10,$row['appointment_id'],0,0,'C');
        $pdf->Cell(45 ,10,$row['service_name'],0,0,'C');
        $pdf->Cell(40 ,10,"Rs. ".$row['service_charge'],0,0,'C');
        $pdf->Cell(40 ,10,$row['commission_percentage']."%",0,0,'C');
        $pdf->Cell(40 ,10,"Rs. ".$row['service_charge']*$row['commission_percentage']/100,0,0,'C');
        $pdf->Cell(40 ,7,'',0,1,'C');//end of line
    }

    $pdf->SetFont('Arial','b',14);

    $pdf->Cell(40 ,10,'',0,1,'C');//end of line
    $pdf->Cell(160 ,10,"TOTAL COMMISSION",0,0,'C');
    $pdf->Cell(30 ,10,"Rs. ".number_format($beautician_com, 2, '.', ''),1,1,'C');//end of line

   
    //$pdf->Cell(69 ,10,'Total Commission',0,0,'L');
    //$pdf->Cell(80 ,10,$t_commission,0,1,'C');//end of line

    $pdf->output();
}

?>