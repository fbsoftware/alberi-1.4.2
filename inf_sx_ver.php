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
// riquadro inferiore-sx
$pdf->Rect(5,60+$disp,135,80);
$imp  = number_format($vimporto,2,',','.');
$implett = num_lett($vimporto);
$dec=substr($imp,-2,2); 
$pdf->SetFont('arial','',14);
$pdf->SetTextColor(0,0,0);
$pdf->Text(10,80+$disp,'Ricevuto '.EURO.' '.$imp.' ('.$implett.' / '.$dec.')');
$pdf->Text(10,90+$disp,'a mezzo '.$_POST['vmezzo'].' '.$_POST['vrife']);

if ($_POST['vassnum'] > '') {
$pdf->Text(10,100+$disp,'Numero: '.$_POST['vassnum']);
$pdf->SetFont('arial','B',16);
$pdf->Text(10,110+$disp,'da '.$_POST['cognome'].'  '.$_POST['nome'].'  ('.$_POST['vnume'].')');
$pdf->SetFont('arial','',14);
$pdf->Text(10,120+$disp,$causale);
}
else {
$pdf->SetFont('arial','B',16);
$pdf->Text(10,100+$disp,'da '.$_POST['cognome'].'  '.$_POST['nome'].'  ('.$_POST['vnume'].')');
$pdf->SetFont('arial','',14);
$pdf->Text(10,110+$disp,$causale);
}

//$pdf->Text(10,130+$disp,$registrato);

?>