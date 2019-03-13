<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.2    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template. 
   * ------------------------------------------------------------------------
   * Stampa versamenti iscritti del mese : scelte
============================================================================= */  
$tipo     = $_SESSION['pag'];

 //   bottoni gestione
$param = array('stampa','ritorno');
$btx   = new bottoni_str_par_new('Versamenti per mese','ver','prt_vermese.php',$param);     
     $btx->btn();

//   scelte
     echo "<div class='col-md-4'>";
     echo "<fieldset>" ;
     $fd = new input(array(date("Y"),'anno',4,'Anno di riferimento',' ','ir'));        
          $fd->field();
     $fo = new input(array('','dadata',12,'Periodo dal',' ','d1'));                      
          $fo->field();
     $fq = new input(array('','adata',12,'al',' ','d2'));                        
          $fq->field();
     echo "</form>" ;
     echo "</fieldset>" ;
     echo "</div>" ;    // col
?>
