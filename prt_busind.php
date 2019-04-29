<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa buste - INDIRIZZI x gruppi
=============================================================================  */
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>";    
$ordine   = $_POST['ordine'];
$categ    = $_POST['categ'];  
$azione   = $_POST['submit']; 

   switch ($azione) 
   {
   case 'chiudi': 
     $loc = "location:index.php?urla=widget.php&pag=";
     header($loc);                          
   break;
 
   default:          
define('FPDF_FONTPATH','font/');
require('fpdf.php');
include 'set_bus.php' ;

// lettura dati
 switch ($categ) 
 {            
  case 9 : 
          if ($ordine == 'alfa') 
          {
           $sql="SELECT * FROM `".DB::$pref."ind` 
                 WHERE stato != 'A' 
                  ORDER BY RagioneSociale  ";
           }
           else {
           $sql="SELECT * FROM `".DB::$pref."ind` 
                 WHERE stato != 'A' 
                 ORDER BY numero  ";
                 }
       
          break;
 default:
          if ($ordine == 'alfa') 
          {
           $sql="SELECT * FROM `".DB::$pref."ind` 
                 WHERE stato != 'A' and stampa = '".$categ."'
                  ORDER BY RagioneSociale  ";
           }
           else {
           $sql="SELECT * FROM `".DB::$pref."ind` 
                 WHERE stato != 'A' and stampa = '".$categ."' 
                 ORDER BY numero  ";
                 }

 	break;
 }
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
     foreach($PDO->query($sql) as $row) 
               { 
               include('fields_ela_p.php'); 
               include 'indiri_ela.php' ;
               $pdf->SetY(297);
               }

$pdf->Output();
}
?>
