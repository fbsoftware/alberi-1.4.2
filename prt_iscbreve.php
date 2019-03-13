<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa CONSIGLIO DIRETTIVO
=============================================================================  */
include_once('classi/DB.php');
$db1      = new DB('sito');  $db1->openDB();  
                
define('FPDF_FONTPATH','font/');
require('fpdf.php');
include_once('headers_breve.php');

$pdf=new PDF('P','mm');
$pdf->Open();
$pdf->SetTextColor(0,0,0); 
$title=DB::$page_title.' - CONSIGLIO DIRETTIVO';
$pdf->AddPage();   
$pdf->SetTitle($title);
$pdf->SetFont('arial','',10); 
$pdf->SetAutoPageBreak(true,15);
 
// sql
          $sql="SELECT cognome,nome,icons_dir FROM `".DB::$pref."isc` 
                 WHERE stato = 'I' and icons_dir > 0
                 ORDER BY icons_dir DESC";

// lettura dati                 
           $res2 = mysql_query($sql);
           if (!$res2) die('prt_isc:'.mysql_error());
          while($row = mysql_fetch_array($res2))  
            { 
                include('fields_isc_p.php'); 
                include('riga_breve.php');
            }
$pdf->Output();
?>
