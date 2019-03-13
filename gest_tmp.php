<?php  session_start(); 
/** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.4    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
   * -------------------------------------------------------------------------
   * Gestione dei templates      
============================================================================= */
echo  "<link rel='stylesheet' type='text/css' href='css/style.css'>";
include_once('classi/DB.php');
$dbase = new DB('sito');  $dbase->openDB(); 
include_once('classi/bottoni.php');  
include_once('classi/field.php');

 //   bottoni gestione
$param  = array('Templates','tmp','upd_tmp.php','nuovo','modifica','cancella','chiudi');  
$btx    = new bt_param($param);     $btx->show_bottoni($param);

// zona messaggi
include_once('msg.php');

//  testata di tabella        
echo "<div class='tabella'><fieldset >";
      $fa = new fieldt('Sc',1);             $fa->field();
      $fb = new fieldt('St',1);             $fb->field();
      $fc = new fieldt('Prg',3);            $fc->field();
      $fd = new fieldt('*',1);              $fd->field();
      $fe = new fieldt('Tp',1);             $fe->field();
      $ff = new fieldt('Menu',5);           $ff->field();
      $fg = new fieldt('Path',30);          $fg->field();
      $fh = new fieldt('Descrizione',30);   $fh->field();
      $fi = new fieldt('Colonna 1',8);      $fi->field();
      $fj = new fieldt('Colonna 2',8);      $fj->field();
      $fk = new fieldt('Colonna 3',8);      $fk->field();
      $fl = new fieldt('Posizione',8);      $fl->field();
      $fn = new fieldt('Col.scu.',6);       $fn->field();
      $fp = new fieldt('Col.chi.',6);       $fp->field();

// mostra la tabella  --------------------------------------------------
$result = mysql_query("SELECT * 
                       FROM `".DB::$pref."tmp` 
                       ORDER BY `tprog` ");
if (mysql_num_rows($result))
{
      while($row = mysql_fetch_array($result))
{
           echo "<br >&nbsp;"; 
           include('fields_tmp.php');
           $f0 = new fieldi($tid,'tid',2);            $f0->field_ck();
           $f2 = new fieldi($tstat,'tstat',2);        $f2->field_st();
           $f3 = new fieldi($tprog,'tprog',3);        $f3->field_r();
           $f4 = new fieldi($tsel,'tsel',1);          $f4->field_r();
           $f5 = new fieldi($ttipo,'ttipo',1);        $f5->field_r();
           $f6 = new fieldi($ttdesc,'ttdesc',5);      $f6->field_r(); 
           $f7 = new fieldi($tfolder,'tfolder',30);   $f7->field_r();
           $f8 = new fieldi($tdesc,'tdesc',30);       $f8->field_r();
           $f9 = new fieldi($tcol1,'tcol1',8);        $f9->field_r();
           $f0 = new fieldi($tcol2,'tcol2',8);        $f0->field_r();
           $f1 = new fieldi($tcol3,'tcol3',8);        $f1->field_r();
           $fa = new fieldi($tmenu,'tmenu',8);        $fa->field_r(); 
           $fr = new fieldi($tcolscu,'tcolscu',6);    $fr->field_r();           
           $fs = new fieldi($tcolchi,'tcolchi',6);    $fs->field_r();
}
}
   echo  "</form></fieldset></div>" ;
?> 
