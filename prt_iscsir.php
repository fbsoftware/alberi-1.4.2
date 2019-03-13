<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa breve - ISCRITTI CON RINNOVO 
=============================================================================  */
include_once('classi/DB.php');
include_once('classi/data.php');
$db1      = new DB('sito');  $db1->openDB();  
$ordine   = $_POST['ordine'];
$azione   = $_POST['submit'];
 
   switch ($azione) 
   {
   case 'ritorno': 
     $loc = "location:index.php?urla=widget.php&pag=";
     header($loc);                           
   break;
 
   default:

define('FPDF_FONTPATH','font/');
require('fpdf.php');
include_once('headers_breve.php');

$pdf=new PDF('P','mm');
$pdf->Open();
$pdf->SetTextColor(0,0,0); 
$title=DB::$page_title." - ISCRITTI CON RINNOVO anno ".$_POST['anno'];
$pdf->AddPage();   
$pdf->SetTitle($title);
$pdf->SetFont('arial','',10); 
$pdf->SetAutoPageBreak(true,15);

// scelta ordinamento
        switch ($ordine)                          
        {
        case 'alfa':
$sql = "  SELECT * FROM ".DB::$pref."isc 
          WHERE stato = 'I' and  numero_iscrizione 
              IN ( SELECT DISTINCT vnume 
                   FROM ".DB::$pref."ver 
                   WHERE vanno = ".$_POST['anno'].") 
          ORDER BY cognome , nome ";
         break;
        case 'nume':
$sql = "  SELECT * FROM ".DB::$pref."isc 
          WHERE stato = 'I' and  numero_iscrizione 
              IN ( SELECT DISTINCT vnume 
                   FROM ".DB::$pref."ver 
                   WHERE vanno = ".$_POST['anno'].") 
          ORDER BY numero_iscrizione ";
        break;
        }  
 
// lettura dati                 
           $res2 = mysql_query($sql);
           if (!$res2) die('prt_iscsir:'.mysql_error());
          while($row = mysql_fetch_array($res2))  
               { 
                include('fields_isc_p.php'); 
                include('riga_breve.php');
               }
$pdf->Output();
   	break;
   }

?>
