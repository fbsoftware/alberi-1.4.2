<?php session_start();   ob_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= 
   * Scrittura versamenti iscritti
=============================================================================*/
include_once 'include_gest.php';
// DOCTYPE & head
$head = new getBootHead('Versamenti iscritti');
     $head->getBootHead(); 
//print_r($_POST);//debug
include_once('post_ver.php');
$azione=$_POST['submit'];

switch ($azione)
{ 
case 'nuovo':
               $pr= new DB_ins(ver,vprog);
               $vprog = $pr->insert1(); // n.ro ricevuta
               $sql = "INSERT INTO `".DB::$pref."ver` 
                         (vid,vstat,vnume,vdata,vimporto,vanno,vprog,vmezzo,
                          vrife,vassnum)
                      VALUES (NULL,'$vstat',$vnume,'$vdata',$vimporto,'$vanno',
                              '$vprog','$vmezzo','$vrife','$vassnum')";
                    $PDO->exec($sql);    
                    $PDO->commit();
                    $_SESSION['esito'] = 54;
                         
                         // stampa ricevuta
                         if ($vimporto > 20)
                          { 
                          $causale='per erogazione liberale anno '.$vanno.' socio sostenitore';
                          }
                          else 
                          {
                          $causale='per erogazione liberale anno '.$vanno.' socio ordinario';
                          }
                         include 'prt_ver.php';
                         break;
   
case 'modifica':

          $sql = "UPDATE `".DB::$pref."ver`
                  SET vstat='$vstat',vnume='$vnume',vdata='$vdata',vimporto=$vimporto,
                      vanno=$vanno,vprog='$vprog',vmezzo='$vmezzo',vrife='$vrife',
                      vassnum='$vassnum'
                  WHERE vid=$vid";
          $PDO->exec($sql);    
          $PDO->commit();
                  $_SESSION['esito'] = 55;

                  // stampa ricevuta
                  if ($vimporto > 20)
                  { 
                          $causale='per erogazione liberale anno '.$vanno.' socio sostenitore';
                  }
                  else 
                  {
                          $causale='per erogazione liberale anno '.$vanno.' socio ordinario';
                  }
                  include 'prt_ver.php';
                  break;

case 'cancella':
     $sql = "DELETE from `".DB::$pref."ver` 
                  WHERE vid=$vid";
                    $_SESSION['esito'] = 53;
                    $PDO->exec($sql);    
                    $PDO->commit();
                    break;

case 'uscita':
               $_SESSION['esito'] = 2;
               header('location:gest_ver.php');
               break;

case 'ritorno':
			$_SESSION['esito'] = 2;                       
               break;
               
               
default :      $_SESSION['esito'] = 1;
}

// aggiorna tipo socio
$tt = new DB_tipologia($vnume,$vimporto);
	$tt->upd_tipologia();
 ob_end_flush();
 
// memorizza location iniziale
$loc = "location:index.php?".$_SESSION['location']."";
     header($loc);
echo "</html>";
?> 
