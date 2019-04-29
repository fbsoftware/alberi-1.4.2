<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa buste ISCRITTI appartenenti al consiglio direttivo
=============================================================================  */

$tipo         = $_SESSION['pag']; 
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>"; 

 //   bottoni gestione
$param  = array('stampa','ritorno');    
$btx    = new bottoni_str_par_new('Consiglio Direttivo','isc','prt_busiscons.php',$param);  
     $btx->btn();

// zona messaggi
include_once('msg.php'); 

// note di stampa
     echo     "<div class='container'>";
     echo     "<div class='row container'>";
     echo     "<div class='col-md-12'>";
     echo "<div class='alert alert-info'>";echo "<img src='images/info.png' height=20 alt='ok'>
               &nbsp;&nbsp;Verranno stampate le buste di tutti gli iscritti appartenenti al consiglio direttivo  
               che non abbiano email e non siano coniuge di altro iscritto.";
     echo "</div>" ;     // col
     echo "</div>" ;     // row   
     echo "</div>" ;     // container
?>



