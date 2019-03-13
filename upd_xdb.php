<?php session_start();      ob_start();  
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.3    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= */
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
     echo "</head>";   
     
// variabili di configurazione 
$pref          = DB::$pref;               // prefisso tabelle
$site          = DB::$site;               // descrizione sito
$page_title    = DB::$page_title;         // titolo della pagina

include_once('post_xdb.php');
$azione  =$_POST['submit'];  

// test scelta effettuata sul pgm chiamante
if (($azione == 'modifica' || $azione == 'cancella') && $xid == '') 
     {
     $_SESSION['esito'] = 4;
$loc = "location:index.php?".$_SESSION['location']."";
     header($loc);
     }

//  chiude
switch ($azione)
{   
    case 'chiudi' :
     $loc = "location:index.php?urla=widget.php&pag=";
     header($loc);                           
    break;     
}

switch ($azione)
{ // controllo
    case '':
    {
    header('location:gest_xdb.php');
    break; }
// inserimento 
    case 'nuovo':
    {
    $param = array('nuovo','ritorno');
    $btx   = new bottoni_str_par('Tipologie - inserimento','xdb','write_xdb.php',$param);     
         $btx->btn();
         
     echo  "<fieldset class='gest'>";  
      $xdb = new DB_ins('xdb','xprog');                      
      $f1 = new input(array($xdb->insert(),'xprog',3,'Progressivo',' ','i'));     
          $f1->field();
      $ts = new DB_tip_i('stato','xstat','','Stato record'); 
          $ts->select();
      $f2 = new input(array('','xtipo',5,'Tipo',' ','ia'));                  
          $f2->field(); 
      $f3 = new input(array('','xcod',20,'Codice',' ','ir'));                
          $f3->field(); 
      $f4 = new input(array('','xdes',30,'Descrizione',' ','ir'));           
          $f4->field();  
     echo  "</fieldset></form>";
      break;
     }
// modifica     
    case 'modifica':
    { 
     $param = array('modifica','ritorno');
     $btx   = new bottoni_str_par('Tipologie - modifica','xdb','write_xdb.php',$param);     
          $btx->btn();

// transazione 
     $sql = "SELECT * FROM `".DB::$pref."xdb` where `xid` = $xid ";   
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
     foreach($PDO->query($sql) as $row)
     {
     echo  "<fieldset class='gest'>";
     include('fields_xdb.php');
      $f0 = new input(array($xid,'xid',0,'','','h'));                        
          $f0->field(); 
      $f1 = new input(array($xprog,'xprog',3,'Progressivo','','i'));         
          $f1->field();       
      $ts = new DB_tip_i('stato','xstat',$xstat,'Stato record'); 
          $ts->select();
      $f2 = new input(array($xtipo,'xtipo',5,'Tipo','','ir'));                
          $f2->field(); 
      $f3 = new input(array($xcod,'xcod',20,'Codice','','ir'));               
          $f3->field();  
      $f4 = new input(array($xdes,'xdes',30,'Descrizione','','ir'));          
          $f4->field(); 

     }
     echo    "</fieldset></form>";     
     break;
    }
// cancellazione    
    case 'cancella' :
     $param = array('cancella','ritorno');
     $btx   = new bottoni_str_par('Tipologie - cancellazione','xdb','write_xdb.php',$param);     
          $btx->btn(); 
      $sql = "SELECT * FROM `".DB::$pref."xdb` 
                           WHERE `xid` = $xid  "; 
echo  "<fieldset class='gest'>";					     
// transazione    
$con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
$PDO = new PDO($con,DB::$user,DB::$pw);
$PDO->beginTransaction(); 
foreach($PDO->query($sql) as $row)
	{
include('fields_xdb.php');

      $f0 = new input(array($xid,'xid',0,'','','h'));                        
	 	$f0->field(); 
      $f1 = new input(array($xprog,'xprog',3,'Progressivo','','r'));         
	 	$f1->field();       
      $ts = new input(array($xstat,'xstat',1,'Stato record','','r'));        
	 	$ts->field();
      $f2 = new input(array($xtipo,'xtipo',5,'Tipo','','r'));                
	 	$f2->field(); 
      $f3 = new input(array($xcod,'xcod',20,'Codice','','r'));               
	 	$f3->field();  
      $f4 = new input(array($xdes,'xdes',30,'Descrizione','','r'));          
	 	$f4->field(); 
	}
echo    "</fieldset></form>";
      break;   
 
    default:
  echo "Operazione invalida";    
     }
ob_end_flush();
?>
