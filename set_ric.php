<?php   session_start();
/*** Fausto Bresciani   fbsoftware.bresciani@gmail.com  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2013 - 2014 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * 
=============================================================================  */
// settaggi per stampa ricevuta veramenti
$pdf = new FPDF('P','mm','A4');
$pdf->Open();
$pdf->AddPage();
$pdf->SetMargins(5,5);
$pdf->SetAutoPageBreak(true,10);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('arial','B',14);
$pdf->SetX(5);
$pdf->SetY(5);
?>