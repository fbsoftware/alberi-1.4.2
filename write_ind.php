<?php session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * aggiornamento tabella 'ind'      
============================================================================= */
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>"; 
include('post_ind.php'); 
//print_r($_POST);   //debug       
$azione  =$_POST['submit'];

switch ($azione)
{
 case 'ritorno':   
          $_SESSION['esito'] = 2;        
          $loc = "location:index.php?".$_SESSION['location']."";
          header($loc);
     	break;


case 'nuovo':
echo            $sql = "INSERT INTO `".DB::$pref."ind` 
                                (id,stato,numero,titolo,titolo_plus,RagioneSociale,
                               indirizzo,cap,localita,provincia,telefono,
                               data_inserimento,stampa,note,referente)
                         VALUES (NULL,'$stato','$numero','$titolo','$titolo_plus','$RagioneSociale',
                               '$indirizzo','$cap','$localita','$provincia','$telefono',
                               '$data_inserimento','$stampa','$note','$referente')";
               $PDO->exec($sql);    
               $PDO->commit();
               $_SESSION['esito'] = 54;
               break;

case 'modifica':
           $sql = "UPDATE `".DB::$pref."ind` 
                        SET   numero='$numero',stato='$stato',titolo='$titolo',
                              titolo_plus='$titolo_plus',RagioneSociale='$RagioneSociale',
                              indirizzo='$indirizzo',cap='$cap',localita='$localita',
                              provincia='$provincia',telefono='$telefono',
                              data_inserimento='$data_inserimento',stampa='$stampa',
                              note='$note',referente='$referente'
                        WHERE id= '$id' ";
          $PDO->exec($sql);    
          $PDO->commit();
          $_SESSION['esito'] = 55;
          break;
case 'cancella':
            $sql = "DELETE from `".DB::$pref."ind` 
                    WHERE id= '$id' ";
            $PDO->exec($sql);    
            $PDO->commit();
            $_SESSION['esito'] = 53;
            break;
default:
} 
$loc = "location:index.php?".$_SESSION['location']."";
     header($loc);
?> 
