<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 3.0   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Gestione della tabella 'nav' voci di menu e sottovoci.
   * Aggiunto "nhead" per gestire header per ogni voce menu (Max.9).
=============================================================================  */

echo  "<link rel='stylesheet' type='text/css' href='css/style.css'>";
include_once('classi/DB.php');
include_once('classi/bottoni.php');
include_once('classi/field.php');

$db1 = new DB('sito');  $db1->openDB();               

  //   bottoni gestione
 $param  = array( 'Voci di menu','nav','upd_nav.php','nuovo','modifica','cancella','chiudi');  
 $btx    = new bt_param($param);     $btx->show_bottoni($param);

// zona messaggi
include_once('msg.php');
  
// mostra la tabella filtrata --------------------------------------------------
echo    "<div class='tabella'><fieldset >";
      $fa = new fieldt('Sc',1);                         $fa->field();
      $fb = new fieldt('St',1);                         $fb->field();
      $fc = new fieldt('Prg',2);                        $fc->field();
      $fd = new fieldt('Menu',10);                      $fd->field();
      $fe = new fieldt('Voce',20);                      $fe->field();
      $fg = new fieldt('Sottovoce',20);                 $fg->field();      
      $ff = new fieldt('Descrizione',25);               $ff->field();
      $fj = new fieldt('Tipo',2);                       $fj->field();
      $fm = new fieldt('Contenuto',30);                 $fm->field();
  //    $fh = new fieldt('Target',10);                    $fh->field();
      $fi = new fieldt('Sel',1);                        $fi->field();
      $fk = new fieldt('Tit',1);                        $fk->field();  
      $fp = new fieldt('Hdr',1);                        $fp->field();
      $fr = new fieldt('Par',1);                        $fr->field(); 
      $fs = new fieldt('Acc',1);                        $fs->field();     
echo "<br >";       
    $result = mysql_query("SELECT * FROM `".DB::$pref."nav` 
                           ORDER BY nprog");
if (mysql_num_rows($result))
{
    while($row = mysql_fetch_array($result))
  { include('fields_nav.php');
  echo "&nbsp;";
  $f1 = new fieldi($nid,'nid',2);            $f1->field_ck();  
  $st = new fieldi($nstat,'nstat',2);        $st->field_st();   
  $f2 = new fieldi($nprog,'nprog',2);        $f2->field_r();  
  $f3 = new fieldi($nmenu,'nmenu',10);       $f3->field_r();
  $f4 = new fieldi($nli,'nli',20);           $f4->field_r();
  $f6 = new fieldi($ndesc,'ndesc',20);       $f6->field_r();  
  $f5 = new fieldi($ntesto,'ntesto',25);     $f5->field_r();
  $f9 = new fieldi($ntipo,'ntipo',2);        $f9->field_r();
  $fx = new fieldi($nsotvo,'nsotvo',30);     $fx->field_r();
//  $f7 = new fieldi($ntarget,'ntarget',10);   $f7->field_r();
  $f8 = new fieldi($nselect,'nselect',1);    $f8->field_r();
  $ff = new fieldi($ntitle,'ntitle',1);      $ff->field_r();  
  $fe = new fieldi($nhead,'nhead',1);        $fe->field_r(); 
  $f0 = new fieldi($npag,'npag',1);          $f0->field_r();
  $ff = new fieldi($naccesso,'naccesso',1);  $ff->field_r();
  
echo "<br >";  
  }
}
echo "</form></fieldset></div>";
?> 
