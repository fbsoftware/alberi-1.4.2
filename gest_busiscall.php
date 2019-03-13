<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa buste ISCRITTI : tutte e tutte tutte
=============================================================================  */
include_once 'include_gest.php';
// DOCTYPE & head
 $head = new getBootHead('gestione iscritti');
      $head->getBootHead();

 //   bottoni gestione
$param  = array('stampa','ritorno');    
$btx    = new bottoni_str_par_new('Buste iscritti (Tutte)','isc','prt_busiscall.php',$param);  
     $btx->btn();

// zona messaggi
include_once('msg.php'); 
// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];
// note di stampa
     echo     "<div class='container'>";
     echo     "<div class='row container'>";
     echo     "<div class='col-md-12'>";
     echo "<div class='alert alert-info'>";echo "<img src='images/info.png' height=20 alt='ok'>
               &nbsp;&nbsp;Verranno stampate le buste di tutti gli iscritti anche se 
               hanno email e sono coniuge di altro iscritto.";
     echo "</div>" ;     // col
     echo "</div>" ;     // row   
     echo "</div>" ;     // container
?>



