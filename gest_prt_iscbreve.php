<?php  session_start(); 
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
echo  "<link rel='stylesheet' type='text/css' href='css/style.css'>";
include_once('classi/bottoni.php');  
include_once('classi/DB.php');
$db1      = new DB('sito');  $db1->openDB();  DB::config();
$tipo     = $_SESSION['pag'];

//   bottoni gestione
$btx = new bottoni_str('Stampa breve ISCRITTI','iscbreve');     
	$btx->bot_prt();

//   scelte
echo    "<div class='scelte'><fieldset >";
     $tb = new DB_tip_i('ord','ordine','','Ordine di stampa','');      
		$tb->select();

  echo "</form></fieldset></div>" ;
?>