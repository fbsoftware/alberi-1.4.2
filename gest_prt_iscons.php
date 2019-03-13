<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.2    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template. 
   * ------------------------------------------------------------------------
   * Stampa CONSIGLIO DIRETTIVO - lancio   
============================================================================= */  

$tipo     = $_SESSION['pag'];

//   bottoni gestione
$param = array('stampa','ritorno');
$btx   = new bottoni_str_par_new('Stampa: CONSIGLIO DIRETTIVO','isc','prt_iscons.php',$param);     
     $btx->btn();

  echo "</form></fieldset></div>" ;
  
            
// note di stampa
     echo "<br />";
     echo     "<div class='row container'>";
     echo     "<div class='col-md-12'>";
     
     echo "<div class='alert alert-info'>";
     echo "<img src='images/info.png' height=20 alt='ok'>&nbsp;&nbsp;Stampa dei componenti il Consiglio Direttivo";
     echo "</div>" ;     // alert 
     
     echo "</div>" ;     // col
     echo "</div>" ;     // row   
     echo "</div>" ;       // container
?>
