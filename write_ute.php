﻿<?php   session_start();       ob_start();
/** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.1    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= */
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
  
     
include_once('post_ute.php');
$azione=$_POST['submit'];
//print_r($_POST);//debug  
// cripto la password
$pwmd5=md5($upassword);    

switch ($azione)
{

case 'nuovo':
               $sql = "INSERT INTO `".DB::$pref."ute` 
                         (uid,ustat,uprog,username,upassword,uaccesso,uiscritto) 
                      VALUES ('$uid','$ustat','$uprog','$username','$pwmd5','$uaccesso','$uiscritto')" ;
                    $PDO->exec($sql);    
                    $PDO->commit();
                    $_SESSION['esito'] = 54;
                    break;

case 'modifica':
          $sql = "UPDATE `".DB::$pref."ute` 
                      SET `ustat`='$ustat',`uprog`='$uprog',
                          `username`='$username',`upassword`='$pwmd5' ,`uaccesso`='$uaccesso' ,
                          `uiscritto`='$uiscritto' 
                      WHERE `uid`= '$uid' ";
                      $PDO->exec($sql);    
                      $PDO->commit();
                      $_SESSION['esito'] = 55;
                        break;
  
case 'cancella':
          $sql = "DELETE from `".DB::$pref."ute` 
                      WHERE `uid`= '$uid' ";
                      $PDO->exec($sql);    
                      $PDO->commit();
                      $_SESSION['esito'] = 53;
                        break;

  
case 'ritorno':
          $_SESSION['esito'] = 2;
          $loc = "location:index.php?".$_SESSION['location']."";
          header($loc);
}
     $loc = "location:index.php?".$_SESSION['location']."";
          header($loc);
ob_end_flush();
?>  
