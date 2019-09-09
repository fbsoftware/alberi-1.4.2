<?php  session_start();   ob_start();
/** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 3.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= 
   * Aggiunto "nhead" per gestire header per ogni voce menu (Max.9).
   * Gestito livello di accesso    
=============================================================================*/
echo  "<link rel='stylesheet' type='text/css' href='CSS/style.css'>";  
include_once('classi/DB.php');
$db2 = new DB('sito');  $db2->openDB(); 

include_once('post_nav.php');
$azione=$_POST['submit'];
//print_r($_POST);//debug
switch ($azione)
{ 
case 'nuovo':
echo               $sql = "INSERT INTO `".DB::$pref."nav` 
                      (nid,nprog,nstat,nmenu,nli,ntesto,
                       ndesc,nselect,ntarget,ntipo,npag,nsotvo,nhead,ntitle,naccesso) 
                      VALUES (NULL,'$nprog','$nstat', '$nmenu','$nli','$ntesto', 
                        '$ndesc', '$nselect', '$ntarget', '$ntipo', '$npag',
                         '$nsotvo','$nhead','$ntitle','$naccesso')";
                       mysql_query($sql); 
                         $_SESSION['esito'] = 54;
                         break;
   
case 'modifica':
     mysql_query("UPDATE `".DB::$pref."nav` 
                  SET nprog='$nprog',nstat='$nstat',nmenu='$nmenu',
                      nli='$nli',ntesto='$ntesto' ,ntarget='$ntarget',ndesc='$ndesc' ,
                      nselect='$nselect',npag='$npag',ntipo='$ntipo',nsotvo='$nsotvo',
                      nhead='$nhead',ntitle='$ntitle',naccesso='$naccesso' 
                  WHERE nid='$nid'");
                  $_SESSION['esito'] = 55;
                  break;
  
case 'cancella':
     mysql_query("DELETE from `".DB::$pref."nav` 
                  WHERE nid='$nid'");
                  $_SESSION['esito'] = 54;
                  break;

case 'ritorno':
               $_SESSION['esito'] = 2;
               header('location:gest_nav.php');
               break;
default :      $_SESSION['esito'] = 1;
}
header('location:gest_nav.php');
ob_end_flush();
?> 
