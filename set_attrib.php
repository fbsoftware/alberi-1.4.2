<?php
// settaggi per stampa attribuzione nuovo socio
$pdf = new FPDF('P','mm');
$pdf->Open();
$pdf->AddPage();
$pdf->SetMargins(30,80);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('arial','',12);
$pdf->SetX(30);
$pdf->SetY(80);           
?>
