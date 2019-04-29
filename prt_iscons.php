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
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>";  
$azione        = $_POST['submit'];
   switch ($azione) 
   {
   case 'ritorno': 
     $loc = "location:index.php?urla=widget.php&pag=";
     header($loc);                          
   break;
   }             
define('FPDF_FONTPATH','font/');
require('fpdf.php');
include_once('headers_cd.php');

$pdf=new PDF('P','mm');
$pdf->Open();
$pdf->SetTextColor(0,0,0); 
$title=$page_title."CONSIGLIO DIRETTIVO";
$pdf->AddPage();   
$pdf->SetTitle($title);
$pdf->SetFont('arial','',10); 
$pdf->SetAutoPageBreak(true,15);
 
// sql
          $sql="SELECT cognome,nome,icons_dir FROM `".DB::$pref."isc` 
                 WHERE stato = 'I' and icons_dir > 0
                 ORDER BY icons_dir DESC , cognome";

// lettura dati                 
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sql) as $row)
            { 
                include('fields_isc_p.php'); 
                include('riga_cd.php');
            }
$pdf->Output();
?>
