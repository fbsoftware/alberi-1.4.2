<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.2    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template. 
   * ------------------------------------------------------------------------
   * Stampa breve iscritti senza rinnovo: scelte      
============================================================================= */  
$tipo     = $_SESSION['pag'];
     // contenitore
     echo     "<div class='container form-horizontal'>"; 
     echo     "<div class='row'>";
     echo     "<div class='col-md-12'>";
//   bottoni gestione
          $param  = array('stampa','ritorno');    
          $btx    = new bottoni_str_par_new('SENZA rinnovo','isc','prt_iscnor.php',$param);  
               $btx->btn();
// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];

     echo     "<div>";   // col
     echo     "<div>";   // row  
     
//   scelte
echo    "<div class='col-md-4'>";
echo    "<fieldset >";
echo "<legend> Scelte </legend>";
    $tb = new DB_tip_i('ord','ordine','','Ordine di stampa');
    $tb->select();
$an = date("Y");// anno di default
    $fd = new input(array($an,'anno',4,'Anno di riferimento',' ','ir'));
    $fd->field(); 
echo "</form>" ;
echo "</fieldset>" ;
echo "</div>" ;
?>
