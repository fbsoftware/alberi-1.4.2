<?php session_start();   ob_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= 
   * Scrittura versamenti iscritti
=============================================================================*/
include_once 'include_gest.php';
// DOCTYPE & head
$head = new getBootHead('Versamenti iscritti');
     $head->getBootHead(); 
     // transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
//print_r($_POST);//debug
include_once('post_ver.php');
$anno= '2018';
$numero_iscrizione= 766;
               // cerca il versamento anno iscrizione
               $sql = "SELECT * FROM `".DB::$pref."ver`
                        WHERE vnume = $numero_iscrizione 
				    ORDER BY vanno 
                        LIMIT 1";
			foreach($PDO->query($sql) as $row)
               include 'fields_ver.php';
               print_r($row);
               echo "<br />importo=".$vimporto;
?>