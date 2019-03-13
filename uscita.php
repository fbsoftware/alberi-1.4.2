<?php session_start();  ob_start();
/* * Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.4    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= */
$err   =0;    // flag errore al login
$admin ="";  // amministratore
setcookie ( 'admin','',time()-43200,'/');
header('location:../index.php?form=home&iframe=&url=');
ob_end_flush();
?>