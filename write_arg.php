<?php session_start();
/** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 3.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * aggiornamento tabella 'arg'      
============================================================================= */
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>"; 

include_once('post_arg.php'); 
$azione  =$_POST['submit'];
//print_r($_POST);//debug
switch ($azione)
     {
     case 'ritorno':           
          $_SESSION['esito'] = 2;
          $loc = "location:index.php?".$_SESSION['location']."";
          header($loc);
     	break;

     case 'nuovo':
           $sql = "INSERT INTO `".DB::$pref."arg` 
                               (rid,rprog,rstat,rcod,rdesc,rtext,rmostra) 
                        VALUES (NULL,'$rprog','$rstat','$rcod','$rdesc',
                                '$rtext','$rmostra')";
               $PDO->exec($sql);    
               $PDO->commit();
               $_SESSION['esito'] = 54;
               break;

     case 'modifica':
               $sql = "UPDATE `".DB::$pref."arg` 
                        SET rprog='$rprog',rstat='$rstat',rcod='$rcod',
                            rdesc='$rdesc',rtext='$rtext',rmostra='$rmostra'
                        WHERE rid= '$rid' ";
               $PDO->exec($sql);    
               $PDO->commit(); 
               $_SESSION['esito'] = 55;
               break;
               
     case 'cancella':
            $sql = "DELETE from `".DB::$pref."arg` 
                         WHERE rid= '$rid' ";
               $PDO->exec($sql);    
               $PDO->commit();
               $_SESSION['esito'] = 53;
               break;
               
     default:
               $_SESSION['esito'] = 2;

     }
$loc = "location:index.php?".$_SESSION['location']."";
header($loc);
?> 
