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
// riquadro sup-dx elargitori
$pdf->Rect(110,5+$disp,95,45);
$pdf->Text(120,15+$disp,'Brescia    '.$edata);
$pdf->SetFont('arial','',10);
$pdf->Text(120,38+$disp,'Ricevuta  Nr. ');
$pdf->SetFont('arial','B',14);
$pdf->Text(120,38+$disp,'                    ELA / '.$eprog);
$pdf->SetFont('arial','',10);

?>