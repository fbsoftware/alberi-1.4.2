<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.2    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template. 
   * ------------------------------------------------------------------------
   * Stampa versamenti iscritti dell'anno : scelte
============================================================================= */  
$tipo     = $_SESSION['pag'];

 //   bottoni gestione
$param = array('stampa','ritorno');
$btx   = new bottoni_str_par_new('Versamenti per anno','ver','prt_veranno.php',$param);     
     $btx->btn();
//   scelte
     echo "<div class='col-md-4'>";
     echo "<fieldset>" ;
     $an = date("Y");// anno di default
     $fd = new input(array($an,'anno',4,'Anno di riferimento',' ','ir'));            
          $fd->field(); 
     echo "</form>" ;
     echo "</fieldset>" ;
     echo "</div>" ;    // col
?>
