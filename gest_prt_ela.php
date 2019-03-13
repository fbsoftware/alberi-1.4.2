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
$tipo     = $_SESSION['pag'];

 //   bottoni gestione
$param = array('stampa','ritorno');
$btx   = new bottoni_str_par_new('Stampa ELARGITORI','ela','prt_ela.php',$param);     
     $btx->btn();

// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];

     echo     "<div class='container'>";
     echo     "<div class='row'>"; 
     echo     "<div class='col-md-10'>";    
//   scelte
echo    "<fieldset >";
     $tb = new DB_tip_i('ord','ordine','','Ordine di stampa','');      
		$tb->select();

echo "</form>" ;
echo "</fieldset>" ;
echo "</div>" ;
echo "</div>" ;
echo "</div>" ;
?>
