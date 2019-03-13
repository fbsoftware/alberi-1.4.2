<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.2    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template. 
   * ------------------------------------------------------------------------
   * Visualizza elargitori: lancio     
============================================================================= */  
//   bottoni gestione
$param = array('mostra','chiudi');
$btx   = new bottoni_str_par('Visualizza Elargitori','ela','vid_ela.php',$param);     
     $btx->btn();
     
// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];

//   scelte
echo    "<div class='col-md-4'><fieldset >";
     $tb = new DB_tip_i('ord','ordine','','Ordine');      $tb->select();

echo "</form></fieldset></div>" ;
?>
