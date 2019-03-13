<?php  session_start(); 
/** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 2.0       
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
   * ------------------------------------------------------------------------
   * Scrittura sul DB      
============================================================================= */ 
  
$azione   =$_POST['submit'];

include('classi/DB.php');
$dbase = new DB('sito');
$dbase->openDB();

include('post_tmp.php');
switch ($azione)
{
case 'nuovo':
   mysql_query("INSERT INTO `".DB::$pref."tmp` (tprog,tstat,tsel,ttipo,ttdesc,tfolder,
                       tdesc,tcol1,tcol2,tcol3,tmenu,tcolscu,tcolchi)  
                VALUES ('$tprog','$tstat','$tsel','$ttipo','$ttdesc','$tfolder', 
                        '$tdesc','$tcol1','$tcol2','$tcol3','$tmenu','$tcolscu','$tcolchi')");
                        $_SESSION['esito'] = 54;
                        break;

case 'modifica':
  mysql_query("UPDATE `".DB::$pref."tmp` 
               SET tprog='$tprog',tstat='$tstat',tsel='$tsel',ttipo='$ttipo',
                   ttdesc='$ttdesc',tfolder='$tfolder',tdesc='$tdesc',
                   tcol1='$tcol1',tcol2='$tcol2',tcol3='$tcol3',tmenu='$tmenu',
                   tcolscu='$tcolscu',tcolchi='$tcolchi'      
               WHERE `tid`='$tid' ");
               $_SESSION['esito'] = 55;
                        break;

case 'cancella':
     mysql_query("DELETE from `".DB::$pref."tmp` where tid= '$tid' ");
     mysql_close($con);
     $_SESSION['esito'] = 53;
     break;


case 'ritorno':
     {}
}
header('location:gest_tmp.php') ;
?> 
