<?php session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 3.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= 
   * permette di selezionare il template fra quelli presentati dalla lista
   * che esclude quello dell'amministratore. 
============================================================================= */
echo  "<link rel='stylesheet' type='text/css' href='CSS/style.css'>";
include_once 'classiFB.php';

$dbase    = new DB('sito');   
$dbase->openDB();    // riga modificata per verifica backup

$tmp      = new DB_tmp('sito'); 
  
// richiesta password                  
echo    "<div id=login>";
echo  "<fieldset class='mid'>";
echo  "<legend>&nbsp;Cambio template&nbsp;</legend>"; 
echo  "<p>"; 
echo  "<form name='modulo' action='fix_tmp.php' method='post'>";
     $tmp->select_tmp();    
echo "<br ><br >";    
echo  "<button type='submit' name='submit' value='Conferma'>Conferma</button><br >";
echo  "</form>";

// ritorno
echo  "<form name=modulo2  action='fix_tmp.php' method=post>"; 
echo  "<hr ><br >";
echo  "<button type='submit' name='submit' value='Ritorno'>Ripristina</button>";
echo  "<script type=\"text/javascript\" language=\"JavaScript\"> ";
echo  "close()";
echo  "</script>" ; 
echo  "</form>";
echo  "</p>";
echo  "</fieldset>";
echo  "</div>";  
?> 