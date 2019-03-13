<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa buste ISCRITTI per gruppo
=============================================================================  */
 //   bottoni gestione
$param  = array('stampa','ritorno');    
$btx    = new bottoni_str_par_new('Buste per gruppo','isc','prt_busiscgru.php',$param);  
     $btx->btn();

// zona messaggi
include_once('msg.php'); 

// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];
     // contenitore
     echo     "<div class='container form-horizontal'>"; 
     echo     "<div class='row container'>";
     echo     "<div class='col-md-12'>";
 
//   scelte
     $tb = new DB_tip_i('prt','gruppo','','Gruppo');      
          $tb->select();
     echo "</form>" ;
     echo "</div>" ;       // col
     echo "</div>" ;       // row
          
// note di stampa
     echo "<br />";
     echo     "<div class='row container'>";
     echo     "<div class='col-md-12'>";
     
     echo "<div class='alert alert-info'>";
     echo "<img src='images/info.png' height=20 alt='ok'>&nbsp;&nbsp;Verranno stampate le buste degli iscritti appartenenti al gruppo scelto 
               che non abbiano email e che non siano coniuge di altro iscritto.";
     echo "</div>" ;     // alert 
     
     echo "</div>" ;     // col
     echo "</div>" ;     // row   
     echo "</div>" ;       // container
?>
