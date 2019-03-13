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
// riquadro sup-sx
$pdf->SetDrawColor(0,255,0);
$pdf->Rect(5,5+$disp,100,45);
$pdf->Image('images/logo/logo.png',10,13+$disp,23,28,'PNG');
$pdf->SetFont('arial','B',16);
$pdf->Text(44,16+$disp,'Alberi di vita');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('arial','',8);
$pdf->Text(31,20+$disp,'Onlus - Organizzazione non lucrativa di utilità sociale');
$pdf->Text(34,33+$disp,'Via Bligny,12 - 25133 Brescia - Tel.392 9169439');
$pdf->Text(34,36+$disp,'Cod. Fisc. 98031170172 - Registro: 408–0132857/16');
$pdf->Text(34,39+$disp,'sito internet: www.alberidivita.it');
$pdf->Text(34,42+$disp,'email: alberidivita@gmail.com');

?>
