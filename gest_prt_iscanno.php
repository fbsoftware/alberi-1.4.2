<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.2    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template. 
   * ------------------------------------------------------------------------
   * Stampa iscritti dell'anno : scelte
============================================================================= */  
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
     echo "</head>";   
$tipo     = $_SESSION['pag'];

//   bottoni gestione
$param = array('stampa','ritorno');
$btx   = new bottoni_str_par_new('ISCRITTI PER ANNO','isc','prt_iscanno.php',$param);     
     $btx->btn();

// zona messaggi
include_once('msg.php');

//   scelte
     echo    "<div class='scelte'><fieldset >";
     $an = date("Y");// anno di default
     $fd = new input(array($an,'anno',4,'Anno di riferimento',' ','ir'));            
          $fd->field(); 
     echo "</form></fieldset></div>" ;
?>
