<?php   
session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa breve - ISCRITTI SENZA RINNOVO 
=============================================================================  */
include_once 'include_gest.php';

// DOCTYPE & head
$head = new getBootHead('versamenti iscritti');
     $head->getBootHead();
     
$azione   = $_POST['submit'];
$ordine   = $_POST['ordine'];
   switch ($azione) 
   {
   case 'ritorno': 
     $_SESSION['esito'] = 2;
     $loc = "location:index.php?urla=widget.php&pag=";
     header($loc);
   break;
   
   default:
define('FPDF_FONTPATH','font/');
require('fpdf.php');
include_once('headers_breve.php');
ob_clean();;
$pdf=new PDF('P','mm');
$pdf->Open();
$pdf->SetTextColor(0,0,0); 
$title=DB::$page_title." - ISCRITTI SENZA RINNOVO anno ".$_POST['anno'];
$pdf->AddPage();   
$pdf->SetTitle($title);
$pdf->SetFont('arial','',10); 
$pdf->SetAutoPageBreak(true,15);

// scelta ordinamento
        switch ($ordine)                          
        {
        case 'alfa':
          $sql = "  SELECT * FROM ".DB::$pref."isc
          WHERE stato = 'I' and data_iscrizione <= '".$_POST['anno']."-12-31' 
          and numero_iscrizione 
          NOT IN ( SELECT DISTINCT vnume 
                   FROM ".DB::$pref."ver 
                   WHERE vanno = ".$_POST['anno'].")  
          ORDER BY cognome , nome ";                     
         break;
        case 'nume':
          $sql = "  SELECT * FROM ".DB::$pref."isc 
          WHERE stato = 'I' and data_iscrizione <= '".$_POST['anno']."-12-31' 
          and numero_iscrizione 
         NOT IN ( SELECT DISTINCT vnume 
                   FROM ".DB::$pref."ver 
                   WHERE vanno = ".$_POST['anno'].") 
          ORDER BY numero_iscrizione ";
        break;
        }  
 
// lettura dati                 
//           $res2 = mysql_query($sql);
  //         if (!$res2) die('prt_isc:'.mysql_error());
    //      while($row = mysql_fetch_array($res2))
// transazione    
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sql) as $row)  
            { 
                include('fields_isc_p.php'); 
                include('riga_breve.php');
            }
$pdf->Output();
ob_endflush();
   	break;
   }
?>
