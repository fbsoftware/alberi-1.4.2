<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.2    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template. 
   * ------------------------------------------------------------------------
   * Stampa CELENCO ISCRITTI - lancio   
============================================================================= */  
$tipo     = $_SESSION['pag'];
     // contenitore
     echo     "<div class='container form-horizontal'>"; 
     echo     "<div class='row'>";
     echo     "<div class='col-md-12'>";
//   bottoni gestione
$param  = array('stampa','ritorno');    
$btx    = new bottoni_str_par_new('ELENCO ISCRITTI','isc','prt_iscelenco.php',$param);  
     $btx->btn();
     echo "</form>" ;
     echo     "<div>";   // col
     echo     "<div>";   // row  
     echo     "<div>";   // container
// note di stampa
     echo "<br />";
     echo     "<div class='row container'>";
     echo     "<div class='col-md-12'>";
     echo "<div class='alert alert-info'>";
     echo "<img src='images/info.png' height=20 alt='ok'>&nbsp;&nbsp;Stampa elenco iscritti  
               (Solo numero, cognome e nome) su tre colonne per pagina.";
     echo "</div>" ;     // alert 
     echo "</div>" ;     // col
     echo "</div>" ;     // row   
     echo "</div>" ;       // container
?>
