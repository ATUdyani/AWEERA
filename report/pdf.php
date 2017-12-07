<?php
require('Database.php');
if(!empty($_GET['submit']))
{
 $date=$_GET['rdate'];
     $db = new Database();
  $result = $db->executeQuery("SELECT appointment_date, COUNT(*) AS test FROM appointment WHERE appointment_date='".$date."' " );
// working 
  //$app_resul=utf8_decode($app_result);
while ($row = $result->fetch_assoc()) {
     echo $row['test']."<br>";
     $app=$row['test']; 
	}
	
	$ti_result = $db->executeQuery("SELECT * FROM payment WHERE payment_date='".$date."' " );
	//$row1 = mysql_fetch_array($ti_result);
	//$t_income = $row1['income'];
	$sum = 0;
	settype($sum, "float");
	while ($row1 = $ti_result->fetch_assoc()) 
	{
     $sum += $row1['paid_amount'];
 	}
 	
 	$t_income = $sum;
 	settype($t_income, "float");
	//while ($row1 = $ti_result->fetch_assoc()) {
     //echo $row1['test']."<br>";
     //$app=$row['test']; 
	//}

require("fpdf/fpdf.php");
$pdf=new FPDF();
$pdf->AddPage();

//set font
$pdf->SetFont('Arial','B',24);

//Cell(width,height,text,boarder,endline,[align])
$pdf->Cell(189 ,20,'Aweera Hair & Beauty ',0,1,'C');//end of line

$pdf->SetFont('Arial','',14);

$pdf->Cell(189 ,10,'No. 220, Solomon Peiris Avenue, Mount Lavinia ',0,1,'C');//end of line

$pdf->Cell(189 ,10,'+94 11 2 727285 ',0,1,'C');//end of line

$pdf->SetFont('Arial','B',20);

$pdf->Cell(189 ,10,'',0,1,'C');//end of line
$pdf->Cell(189 ,10,'',0,1,'C');//end of line

$pdf->Cell(189 ,15,'Daily Collection Report',0,1,'C');//end of line

$pdf->SetFont('Arial','B',16);

 $txt = "for the date of ".$date.""; //access the variable
$pdf->Cell(189 ,15,$txt,0,1,'C');//end of line

$pdf->Cell(189 ,10,'',0,1,'C');//end of line
$pdf->Cell(189 ,10,'',0,1,'C');//end of line


$pdf->SetFont('Arial','',14);


$pdf->Cell(40 ,10,'',0,0,'C');//end of line
$pdf->Cell(69 ,10,'Total Appointments',0,0,'L');
$pdf->Cell(80 ,10,$app,0,1,'C');//end of line

$pdf->Cell(40 ,10,'',0,0,'C');//end of line
$pdf->Cell(69 ,10,'Total Income',0,0,'L');
$pdf->Cell(80 ,10,$t_income,0,1,'C');//end of line

$pdf->Cell(40 ,10,'',0,0,'C');//end of line
//$pdf->Cell(69 ,10,'Total Commission',0,0,'L');
//$pdf->Cell(80 ,10,$t_commission,0,1,'C');//end of line

$pdf->output();
}

?>