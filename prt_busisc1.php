<?php session_start();     
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * stampa busta singola iscritti
============================================================================= */
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
     echo "</head>";   
$azione   = $_POST['submit'];
$id       = $_POST['id']; 

// test scelta id 
if (($id <= 0 )  ||  ($id == '')  || ($id == NULL ))
   { 
   $_SESSION['esito'] = 4;
$loc = "location:index.php?".$_SESSION['location']."";
     header($loc);
   }

   switch ($azione) 
   {
   case 'ritorno': 
   $_SESSION['esito'] = 2;
$loc = "location:index.php?".$_SESSION['location']."";
     header($loc);
   break;
 
   default:
  define ('FPDF_FONTPATH','font/');
require 'fpdf.php' ;
include 'set_bus.php' ;
// ricerca iscritto
     $sql = "SELECT * FROM `".DB::$pref."isc` 
             WHERE `id` = $id  
             ORDER BY cognome"; 
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sql) as $row) 
     {
     include 'fields_isc_p.php' ; 
     include 'indiri_isc.php' ; 
     }           
     $pdf->Output();
   	break;  
   } 
?>
