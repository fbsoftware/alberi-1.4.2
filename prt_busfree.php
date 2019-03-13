<?php session_start();     
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * stampa busta libera
============================================================================= */
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
     echo "</head>";   
$azione   = $_POST['submit']; 
   switch ($azione) 
   {
   case 'ritorno': 
     $loc = "location:index.php?urla=widget.php&pag=";
     header($loc);                           
   break;
 
   default:
 
define ('FPDF_FONTPATH','font/');
require 'fpdf.php' ;
include 'set_bus.php' ;

// stampa dati liberi
          $dc  = new DB_decxdb('tit',$_POST['titolo']); 
               $tit1 = $dc->decxdb();
          $dc  = new DB_decxdb('tit+',$_POST['titolo_plus']); 
               $tit2 = $dc->decxdb();
          $pdf->Cell(0,5,$tit1."  ".$tit2);   
          $pdf->Ln(5);
          $pdf->Cell(10,5,$_POST['denominazione']);
          $pdf->Ln(5);
          $pdf->Cell(20,5,$_POST['segue']);
          $pdf->Ln(5);               
          $pdf->Cell(30,5,$_POST['indirizzo']);
          $pdf->Ln(5);   
          $pdf->Cell(40,5,$_POST['caploc']);
          $pdf->Output();
          $pdf->Close();
   break;
 }  
?>
