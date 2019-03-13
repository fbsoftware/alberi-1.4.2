<?php session_start();     
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * stampa busta singola indirizzi
============================================================================= */
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "<meta http-equiv='content-type' content='text/html;charset=windows-1252'>";
     echo "</head>";   

include_once('post_isc.php');
$azione   = $_POST['submit']; 

// test scelta id 
if (($id <= 0 )  ||  ($id == '')  || ($id == NULL ))
   { 
   $_SESSION['esito'] = 4;
   header('location:gest_busind1.php'); 
   }
 
   switch ($azione) 
   {
   case 'ritorno': 
   $_SESSION['esito'] = 2;
   header('location:widget.php'); 
   break;
 
   default:
  define ('FPDF_FONTPATH','font/');
require 'fpdf.php' ;
include 'set_bus.php' ;
// ricerca iscritto
$con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
$PDO = new PDO($con,DB::$user,DB::$pw);
$PDO->beginTransaction(); 
     $sql = "SELECT * FROM `".DB::$pref."ind` 
             WHERE `id` = $id "; 
			foreach($PDO->query($sql) as $row)
           	{  
               include 'fields_ind_p.php' ; 
               include 'indiri_ela.php' ;
			} 
     $pdf->Output();
   	break;  
   } 
?>
