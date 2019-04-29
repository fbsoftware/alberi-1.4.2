<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.2    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template. 
   * ------------------------------------------------------------------------
   * Stampa breve iscritti con rinnovo: scelte      
============================================================================= */  
$tipo     = $_SESSION['pag'];
     // contenitore
     echo     "<div class='container form-horizontal'>"; 
     echo     "<div class='row'>";
     echo     "<div class='col-md-12'>";

//   bottoni gestione
          $param  = array('stampa','ritorno');    
          $btx    = new bottoni_str_par_new('Iscritti CON RINNOVO','isc','prt_iscsir.php',$param);  
               $btx->btn();

     echo     "<div>";   // col
     echo     "<div>";   // row  

//   scelte
echo    "<div class='col-md-4'>";
echo    "<fieldset >";
echo "<legend> Scelte </legend>";
    $tb = new DB_tip_i('ord','ordine','','Ordine di stampa','');       
          $tb->select();
    $fd = new input(array(date("Y"),'anno',4,'Anno di riferimento',' ','ir'));            
          $fd->field(); 
echo "</form>" ;
echo "</fieldset>" ;
echo "</div>" ;
?>
