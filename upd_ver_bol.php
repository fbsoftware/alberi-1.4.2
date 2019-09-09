<?php session_start();      ob_start();   
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * Ricerca ricevuta di versamento
============================================================================= */
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>";   
$azione   = $_POST['submit']; 
$bolletta = $_POST['bolletta'];    //print_r($_POST);//debug
   
// verifica effettuata scelta 
if ((($bolletta <= 0) || ($bolletta <= ' ') || ($bolletta == NULL)) && ($azione == 'cerca'))
     { 
     $_SESSION['esito'] = 4;
     $loc = "location:index.php?".$_SESSION['location']."";
     header($loc);
     break;
     }
  
// analisi scelte
switch ($azione)
{ 
// ricerca 
    case 'cerca':
 //   bottoni gestione
$param = array('ritorno');
$btx   = new bottoni_str_par('Ricerca versamenti','ver','',$param);     
     $btx->btn();
     
// zona messaggi
include_once('msg.php');

// ricerca del'iscritto della bolletta  
     $sql = "SELECT * FROM `".DB::$pref."ver`
              WHERE `vprog` = $bolletta  LIMIT 1";
  try
    {
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sql) as $row)
          {   $id = $row['vnume'];     }
    }
  catch(exception $e)
    { echo 'Nessuna ricevuta ',$e->getMessage();
          exit();
          $_SESSION['esito'] = 4;
          header('location:gest_ver_bol.php'); 
    }
 
// lato sinistro comune    
     echo "<div class='crea'>";
     echo  "<fieldset><legend> Anagrafica </legend>";
   
          $sql="SELECT * FROM `".DB::$pref."isc` 
                WHERE numero_iscrizione = $id ";
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sql) as $row)
          {
          include('fields_isc.php'); 
          $fa = new input(array($numero_iscrizione,'numero_iscrizione',5,'Iscritto N.',' ','rb'));   
          $fa->field();     
          $fd = new input(array($cognome,'cognome',25,'Cognome',' ','r'));                          
          $fd->field(); 
          $fe = new input(array($nome,'nome',25,'Nome',' ','r'));                          
          $fe->field(); 
          }
     echo  "</fieldset>";                                                                 
     echo "</div>"; 


// versamenti
     echo "<div class='crea_dx'>"; 
     echo  "<fieldset><legend> Versamenti </legend>";
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction();
     $sqlv = "SELECT * FROM `".DB::$pref."ver`
              WHERE `vnume` = $numero_iscrizione
              ORDER BY `vdata` ";
foreach($PDO->query($sqlv) as $row)
     {
     include 'fields_ver.php';
    $f1 = new fieldi($vid,'vid',2);             
          $f1->field_ck();
    $f5 = new fieldi($vprog,'vprog',5);         
          $f5->field_r();
    $f3 = new fieldi($vdata,'vdata',10);        
          $f3->field_r();
    $f4 = new fieldi(number_format($vimporto,2,',',''),'vimporto',10);         
          $f4->field_r();
    $f6 = new fieldi($vanno,'vanno',6);         
          $f6->field_r();
    echo "<br />";
    }     
     echo  "</fieldset></div>";
     echo  "</form>";
     break;

     case 'chiudi' :
          { 
          $loc = "location:index.php?urla=widget.php&pag=";
          header($loc);                                   
          break;      
          } 

     case 'ritorno' :
          { 
$loc = "location:index.php?".$_SESSION['location']."";
     header($loc);                                   
          break;      
          } 

    default:        echo "Operazione invalida";    
}
ob_end_flush();
echo "</html>";
?>
