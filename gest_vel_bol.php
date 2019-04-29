<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Gestione versamenti elargitori - ricerca per ricevuta
=============================================================================  */
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>";    
$tipo         = $_SESSION['pag'];            

 //   bottoni gestione
$param = array('cerca','chiudi');
$btx   = new bottoni_str_par('Ricerca per ricevuta','vel','upd_vel_bol.php',$param);     
     $btx->btn();
     
// zona messaggi
include_once('msg.php');

// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];

// bollettina
     echo "<div class='col-md-4'>";
     echo "<fieldset>" ;
 $f = new input(array('','bolletta',5,'Numero ricevuta','','ia'));
 $f->field();
     echo "</form>" ;
     echo "</fieldset>" ;
     echo "</div>" ;    // col    
?>