<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.2    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template. 
   * ------------------------------------------------------------------------
   * Stampa indirizzi : scelte      
============================================================================= */  
//   bottoni gestione
$param = array('stampa','ritorno');
$btx   = new bottoni_str_par_new('Stampa INDIRIZZI','ind','prt_ind.php',$param);     
     $btx->btn();

// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];
     
//   scelte
     echo    "<div class='container col-md-4'><fieldset >";
     $tb = new DB_tip_i('ord','ordine','','Ordine di stampa','');      
     $tb->select();
// categoria

     $ti = new DB_tip_i('ind','stampa','','Categoria','');      
     $ti->select();
     echo "</form></fieldset></div>" ;
?>
