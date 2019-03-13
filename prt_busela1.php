<?php     session_start();     
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3.1    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * stampa busta singola elargitori
============================================================================= */
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
     echo "</head>";  

$azione   = $_POST['submit'];
$id       = $_POST['id'];

   switch ($azione) 
   {
   case 'ritorno': 
$loc = "location:index.php?urla=widget.php&pag=";
     header($loc);                           
   break;

   default:
// test scelta id 
if (($id <= 0 )  ||  ($id == '')  || ($id == NULL ))
   { 
   $_SESSION['esito'] = 4;
   header('location:gest_busela1.php'); 
   }
     
define ('FPDF_FONTPATH','font/');
require 'fpdf.php' ;
include 'set_bus.php' ;

// ricerca elargitore
     $sql = "SELECT * FROM `".DB::$pref."ela`
                 WHERE `id` = ".$id."  ";
	foreach($PDO->query($sql) as $row)
		{
          include 'fields_ela_p.php' ;
          include 'indiri_ela.php' ;
          }
     $pdf->SetY(297);
     $pdf->Output();
   	break;  
   } 

?>
