<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa buste - ISCRITTI (tutte)
=============================================================================  */
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
     echo "</head>";   
$azione   = $_POST['submit'];
$gruppo   = $_POST['gruppo'];
echo "Gruppo=".$gruppo."<br />"; //debug

// test effettuata scelta 
if (($_POST['gruppo'] < 0) && ($azione == 'stampa' ))
     { 
     $_SESSION['esito'] = 4;
$loc = "location:index.php?".$_SESSION['location']."";
     header($loc);
   break;                               
     }
     
   switch ($azione) 
   {
   case 'ritorno': 
     $_SESSION['esito'] = 2;
     $loc = "location:index.php?".$_SESSION['location']."";
     header($loc);
   break;
 
   default:
define('FPDF_FONTPATH','font/');
require('fpdf.php');
include 'set_bus.php' ;
               $sql="SELECT * FROM `".DB::$pref."isc`
                    WHERE stato = 'I' and stampa = $gruppo 
                        and email = '  ' and archiviare <> 'C'  
                    ORDER BY cognome,nome";

          // lettura dati
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sql) as $row) 
               { 
               include('fields_isc_p.php'); 
               include 'indiri_isc.php' ;
               }
               
$pdf->Output();
   	break;  
   } 
?>
