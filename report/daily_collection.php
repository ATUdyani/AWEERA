<?php
if(!empty($_POST['submit']))
{
  $date=$_POST['rdate'];
  $t_app=$_POST['total_appointments'];
  $t_income=$_POST['total_income'];
  $t_commission=$_POST['total_commission'];

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
$pdf->Cell(80 ,10,$t_app,0,1,'C');//end of line

$pdf->Cell(40 ,10,'',0,0,'C');//end of line
$pdf->Cell(69 ,10,'Total Income',0,0,'L');
$pdf->Cell(80 ,10,$t_income,0,1,'C');//end of line

$pdf->Cell(40 ,10,'',0,0,'C');//end of line
$pdf->Cell(69 ,10,'Total Commission',0,0,'L');
$pdf->Cell(80 ,10,$t_commission,0,1,'C');//end of line

$pdf->output();

}
 ?>
