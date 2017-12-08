<?php

class Report{

    protected static $pdf;

    public function setHeader($pdf){
        /*require "../fpdf/fpdf.php";
        $pdf = new fpdf();*/

        //set font
        $pdf->SetFont('Arial','B',24);

        //Cell(width,height,text,border,endline,[align])
        $pdf->Cell(189 ,12,'',0,1,'C');//end of line

        $pdf->Image('../img/aweera-black.png',73,10,-200);

        $pdf->SetFont('Arial','',11);

        $pdf->Cell(189 ,10,'No. 220, Solomon Peiris Avenue, Mount Lavinia ',0,1,'C');//end of line

        $pdf->Cell(189 ,0,'+94 11 2 727285 ',0,1,'C');//end of line

        $pdf->SetFont('Arial','B',20);

        $pdf->Cell(189 ,10,'',0,1,'C');//end of line
        $pdf->Cell(189 ,10,'',0,1,'C');//end of line
    }

}