<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.2    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template. 
   * ------------------------------------------------------------------------
   * Stampa elargitori dell'anno : scelte  
   * 1.4.2 
============================================================================= */  
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>"; 

//   bottoni gestione
$param = array('stampa','ritorno');
$btx   = new bottoni_str_par_new('Stampa per anno','vel','prt_elanno.php',$param);     
     $btx->btn();
     
// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];    
 
//   scelte
     echo    "<div class='col-md-4'><fieldset >";
     $tb = new DB_tip_i('ord2','ordine','','Ordine di stampa','');      
          $tb->select();
// anno corrente -------------------------------------------------------------------------         
//     $fd = new input(array(date("Y"),'anno',4,'Anno di riferimento',' ','ir'));
//          $fd->field();
// annoda tabella
          $x1 = new DB_decod('xdb','anno','xstat','xcod','ver','xdes');
    $anno = $x1->decod(); 
$fd = new input(array($anno,'anno',4,'Anno','Anno di riferimento','i'));     
     $fd->field(); 
//----------------------------------------------------------------------------------------     
     $ti = new DB_tip_i('cat','catego','','Categoria','');      
          $ti->select();
     $tf = new DB_tip_i('eve','evento','','Evento','');      
          $tf->select();
     echo "</form></fieldset></div>" ;
?>
