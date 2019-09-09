<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.2    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template. 
   * ------------------------------------------------------------------------
   * Stampa globale buste elargitori: lancio     
============================================================================= */  
 //   bottoni gestione
$param = array('stampa','ritorno');
$btx   = new bottoni_str_par_new('Buste ELARGITORI','ela','prt_busela.php',$param);     
     $btx->btn();
echo "</form></fieldset></div>" ;
?>
