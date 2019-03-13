<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 3.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= */ 
echo  "<link rel='stylesheet' type='text/css' href='css/style.css'>";
// istanzia le classi -----------------------
include_once('classi/DB.php');
include_once('classi/bottoni.php');
include_once('classi/field.php');

$db1 = new DB('sito');       $db1->openDB();  
// variabili di configurazione 
$pref          = DB::$pref;               // prefisso tabelle

 //   bottoni gestione
$param  = array( 'Menu','mnu','upd_mnu.php','nuovo','modifica','cancella','chiudi');  
$btx    = new bt_param($param);     $btx->show_bottoni($param);

// zona messaggi
include_once('msg.php');
 
//   mostra la tabella
echo    "<div class='tabella'><fieldset class='tabella' >";
      $fa = new fieldt('Sc',1);             $fa->field();
      $fb = new fieldt('St',1);             $fb->field();
      $fc = new fieldt('Prg',3);            $fc->field();
      $fd = new fieldt('Nome',20);          $fd->field();
      $fe = new fieldt('Tipo',20);          $fe->field();
      $ff = new fieldt('Descrizione',50);   $ff->field();
      $fg = new fieldt('Sel',1);            $fg->field();

      $sql = "SELECT * FROM ".$pref."mnu ORDER BY bprog";
      $result = mysql_query($sql);                      
if (mysql_num_rows($result))
{
      while($row = mysql_fetch_array($result))
      {       
      include('fields_mnu.php');
echo "<br >&nbsp;";    
     $f1 = new fieldi($bid,'bid',2);               $f1->field_ck();     
     $f2 = new fieldi(@$bstat,'bstat',2);          $f2->field_st();
     $f3 = new fieldi($bprog,'bprog',3);           $f3->field_r();
     $f4 = new fieldi($bmenu,'bmenu',20);          $f4->field_r();
     $f5 = new fieldi($btipo,'btipo',20);          $f5->field_r();
     $f6 = new fieldi($btesto,'btesto',50);        $f6->field_r();
     $f7 = new fieldi($bselect,'bselect',1);       $f7->field_r(); 
     }
}
  echo "</form></fieldset></div>";
?> 
