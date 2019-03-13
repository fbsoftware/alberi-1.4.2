<?php session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * aggiornamento tabella 'ela'      
============================================================================= */
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione elargitori');
     $head->getBootHead(); 
     echo "</head>";   
include('post_ela.php'); 
// transazione
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
//print_r($_POST);   //debug
 
$azione  =$_POST['submit'];
$stato   =$_SESSION['pag'];
switch ($azione)
{
case 'ritorno':
          if (DB::$debuga == '0')    // debug
          {           
          $loc = "location:index.php?urla=widget.php&pag=";
          header($loc); 
          }                         
     	break;

case 'nuovo':
            $sql = "INSERT INTO `".DB::$pref."ela` 
                                (id,stato,numero,titolo,titolo_plus,RagioneSociale,
                               indirizzo,cap,localita,provincia,telefono,
                               data_inserimento,stampa,note,referente,categoria,tipo)
                         VALUES (NULL,'$stato','$numero','$titolo','$titolo_plus','$RagioneSociale',
                               '$indirizzo','$cap','$localita','$provincia','$telefono',
                               '$data_inserimento','$stampa','$note','$referente','$categoria','$tipo')";
                      $PDO->exec($sql);    
                      $PDO->commit();
                      $_SESSION['esito'] = 54;                      
                      break;

case 'modifica':
           $sql = "UPDATE `".DB::$pref."ela` 
                        SET   numero='$numero',stato='$stato',titolo='$titolo',
                              titolo_plus='$titolo_plus',RagioneSociale='$RagioneSociale',
                              indirizzo='$indirizzo',cap='$cap',localita='$localita',
                              provincia='$provincia',telefono='$telefono',
                              data_inserimento='$data_inserimento',stampa='$stampa',
                              note='$note',referente='$referente',categoria='$categoria',
                              tipo='$tipo'
                        WHERE id= '$id' ";
                  $PDO->exec($sql);    
                  $PDO->commit();
                  $_SESSION['esito'] = 55;
                  break;
case 'cancella':
            $sql = "DELETE from `".DB::$pref."ela` 
                    WHERE id= '$id' ";
                    $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
                    $PDO = new PDO($con,DB::$user,DB::$pw);
                    $PDO->beginTransaction(); 
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