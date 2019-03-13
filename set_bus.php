<?php
// settaggi per stampa busta 11x23 in PDF
$pdf = new FPDF('L','mm',array(110,230));       
$pdf->Open();
$pdf->AddPage();
$pdf->SetMargins(150,70);
$pdf->SetAutoPageBreak(true,10);
$pdf->SetTextColor(0,0,0); 
$pdf->SetFont('arial','',10);
$pdf->SetX(100);
$pdf->SetY(60);
?>
