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
// riquadro inferiore-dx
$pdf->Rect(145,60+$disp,60,80);
$pdf->SetFont('arial','',10);
$pdf->Text(150,95+$disp,'               Alberi di vita onlus                 ');
$pdf->Text(150,100+$disp,'                 il Presidente                 ');
$pdf->Text(150,110+$disp,'. . . . . . . . . . . . . . . . . . . . . . . . . .');
?>