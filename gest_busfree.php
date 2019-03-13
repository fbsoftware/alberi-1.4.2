<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa busta singola con dati liberi
=============================================================================  */
 //   bottoni gestione
$param = array('stampa','ritorno');
$btx   = new bottoni_str_par('Busta libera','isc','prt_busfree.php',$param);     
     $btx->btn();
     
//------- indirizzo libero -----------------------------
          echo "<div class='crea'><fieldset>"; 
          $tb = new DB_tip_i('tit','titolo','A','Titolo');          
               $tb->select();
          $tc = new DB_tip_i('tit+','titolo_plus',' ','Segue titolo');   
               $tc->select();
          $ta = new input(array('','denominazione',50,'Denominazione',' ','i'));
               $ta->field();
          $td = new input(array('','segue',50,'Segue',' ','i'));
               $td->field();
          $tf = new input(array('','indirizzo',50,'Indirizzo',' ','i'));
               $tf->field();
          $te = new input(array('','caploc',50,'CAP e localit&agrave;',' ','i'));
               $te->field();

          echo "</fieldset></div>";
          echo "</form>";           
?> 
