<?php   session_start();
/*** Fausto Bresciani   fbsoftware.bresciani@gmail.com  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2013 - 2014 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * riquadro inferiore-sx elargitori
=============================================================================  */
$pdf->Rect(5,60+$disp,135,80);
$fimp = number_format($eimporto,2,',','.');
$fimp = $eimporto;
$implett = num_lett($eimporto);
$dec=substr($fimp,-2,2);
$pdf->SetFont('arial','',14);
$pdf->SetTextColor(0,0,0);
$pdf->Text(10,80+$disp,'Ricevuto '.EURO.' '.number_format($fimp,2,',','.').' ('.$implett.' / '.$dec.')');
$pdf->Text(10,90+$disp,'a mezzo '.$_POST['emezzo'].' '.$_POST['erife']);

if ($_POST['eassnum'] > '') {
$pdf->Text(10,100+$disp,$_POST['eassnum']);
$pdf->SetFont('arial','B',16);
$pdf->Text(10,110+$disp,'da '.$_POST['RagioneSociale']);
$pdf->SetFont('arial','',14);
$pdf->Text(10,120+$disp,$erogazione);
$pdf->Text(10,130+$disp,$enota);
}
else {
$pdf->SetFont('arial','B',16);
$pdf->Text(10,110+$disp,'da '.$_POST['RagioneSociale']);
$pdf->SetFont('arial','',14);
$pdf->Text(10,120+$disp,$erogazione);
$pdf->Text(10,130+$disp,$enota);
}
//$pdf->Text(10,130+$disp,$registrato);

?>