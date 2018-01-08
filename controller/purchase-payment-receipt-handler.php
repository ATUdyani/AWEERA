<?php
require('../model/Report.php');
require('../model/StockItem.php');
require('../fpdf/fpdf.php');
session_start();

$data = json_decode($_GET['data']);


$stock_id_array = $data[0];
$stock_price_array = [];
$stock_brand_array = [];
$stock_type_array = [];
$stock_description_array = [];
$sub_total = $data[2];
$payment_id="";
$stock_quantity_array = $data[4];

$stock = new StockItem();
$db = new Database();
$payment_id = "PAY".$db->getLastId('payment_id','payment');

foreach ($stock_id_array as $stock_id){
    $result_stock = $stock->getStockData($stock_id);
    //$result_service = $service->getServiceData($result_appointment['service_id']);

    array_push($stock_brand_array,$result_stock['stock_brand']);
    array_push($stock_type_array,$result_stock['type']);
    array_push($stock_description_array,$result_stock['description']);
    array_push($stock_price_array,$result_stock['price']);
    //$payment_id = $result_appointment['payment_id'];
}

//echo "<pre>";
//print_r($stock_price_array);
//return;


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

$pdf->Cell(25 ,10,'Stock ID',0,0,'L');
$pdf->Cell(35 ,10,'Description',0,0,'L');
$pdf->Cell(25 ,10,'Unit Price',0,0,'L');
$pdf->Cell(25 ,10,'Quantity',0,0,'L');
$pdf->Cell(25 ,10,'Total',0,0,'L');


$pdf->SetFont('Gadugi','',10);

$pdf->Cell(189 ,5,'',0,1,'C');//end of line

$count=0;
foreach ($stock_id_array as $stock_id){
    $pdf->Cell(189 ,5,'',0,1,'C');//end of line
    $pdf->Cell(25 ,10,$stock_id,0,0,'L');
    $pdf->Cell(35 ,10,$stock_brand_array[$count]." ".$stock_type_array[$count],0,0,'L');
    $pdf->Cell(25 ,10,"Rs. ".number_format($stock_price_array[$count], 2, '.', ''),0,0,'L');
    $pdf->Cell(25 ,10,$stock_quantity_array[$count],0,0,'L');
    $pdf->Cell(25 ,10,"Rs. ".number_format($stock_price_array[$count]*$stock_quantity_array[$count], 2, '.', ''),0,0,'L');

    $pdf->Cell(189 ,5,'',0,1,'C');//end of line
    $pdf->Cell(25 ,10,"",0,0,'L');
    $pdf->Cell(35 ,10,$stock_description_array[$count],0,0,'L');

    $count+=1;
}

$pdf->Cell(189 ,10,'',0,1,'C');//end of line
$pdf->Cell(15 ,10,'',0,0,'L');


$pdf->SetFont('Arial','b',12);
$pdf->Cell(90 ,10,'SUB TOTAL',0,0,'L');
$pdf->Cell(25 ,10,"Rs. ".number_format($sub_total, 2, '.', ''),1,0,'C');//end of line

$pdf->output();
?>