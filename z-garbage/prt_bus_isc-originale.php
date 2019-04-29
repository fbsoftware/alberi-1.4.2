<?php session_start();      ob_start();   
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
echo "<!DOCTYPE html lang='en'>
     <html>
     <head>
     <link rel='stylesheet' type='text/css' href='CSS/print.css' media='print'>";     
echo "<SCRIPT LANGUAGE='JavaScript'>window.print();</SCRIPT>";
echo "</head>";

include_once('classi/DB.php');
include_once('classi/data.php');
include_once('classi/bottoni.php');
include_once('classi/field.php');
include_once('post_isc.php');
print_r($_POST);//debug
$db2      = new DB('sito');   DB::config();   $db2->openDB();
$azione   = $_POST['submit']; 
// ricerca iscritto
     $sql = "SELECT * FROM `".DB::$pref."isc` 
             WHERE `id` = $id  "; 
     $_mod = mysql_query($sql);
     $row  = mysql_fetch_array($_mod);
     include('fields_isc.php');  
// dati anagrafici    
     echo "<div class='stampa_busta'>";
           $dec= new DB_decod2('xdb','xstat','xtipo','xcod','tit',$titolo,'xdes');  
              $dec->decod2();
           $dec2= new DB_decod2('xdb','xstat','xtipo','xcod','tit+',$titolo_plus,'xdes');  
              $dec2->decod2();
     

     echo $dec->dec2."&nbsp;".$dec2->dec2."<br>".
          $cognome."&nbsp;".$nome."<br>".
          $indirizzo."<br>".
          $cap." - ".$localita." - ".$provincia."</div>";
//          header('location:gest_bus.php');
ob_end_flush();
?>