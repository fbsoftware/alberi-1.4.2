<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa buste - ELARGITORI (tutti)
=============================================================================  */
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
     echo "</head>";  
     
$azione   = $_POST['submit'];
   switch ($azione) 
   {
   case 'ritorno': 
   header('location:widget.php'); 
   break;
    
default :               
define('FPDF_FONTPATH','font/');
require('fpdf.php');
include 'set_bus.php' ;

// lettura dati
           $sql="SELECT * FROM `".DB::$pref."ela` 
                 WHERE stato = 'L' and stampa = 1
                 ORDER BY RagioneSociale  ";
			foreach($PDO->query($sql) as $row) 
               { 
               include('fields_ela_p.php'); 
               include 'indiri_ela.php' ;
               $pdf->SetY(297);
               }

$pdf->Output(); 
   break;
 }
?>
