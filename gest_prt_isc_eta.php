<?php
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.2    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template. 
   * ------------------------------------------------------------------------
   * Stampa breve iscritti: scelte      
============================================================================= */  
$tipo     = $_SESSION['pag'];

//   bottoni gestione
$param = array('mostra','stampa','ritorno');
$btx   = new bottoni_str_par_new('ISCRITTI per et&agrave;','isc','prt_isc_eta.php',$param);     
     $btx->btn();
// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];
// setta limite 
echo "<div class='scelte'><fieldset >";
$gio = new input(array(30,'gio',2,'Limite giovani','Data limite per giovani','i'));
     $gio->field();
echo "<br />";
$anz = new input(array(60,'anz',2,'Limite anziani','Data limite per anziani','i'));
     $anz->field();
echo "</fieldset></div></form>" ;
?>
