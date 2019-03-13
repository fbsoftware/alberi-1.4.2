﻿<?php session_start();   ob_start();  
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.3.4
   * copyright	Copyright (C) 2011 - 2012 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= */
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
     echo "</head>";   

include('post_art.php');
if (isset($_POST['submit']))    $azione   =$_POST['submit'];  
$content  ='--- Inserire qui il testo ---';

 switch ($azione)
{
    case 'nuovo':
    { 
     $param = array('nuovo','ritorno');
     $btx   = new bottoni_str_par('Inserimento articoli','art','write_art.php',$param);     
          $btx->btn();
          // contenitore
     echo "<div class='col-md-7'>";        
     echo  "<fieldset>"; 
      $art = new DB_ins('art','aprog');     
      $f3 = new input(array($art->insert(),'aprog',3,'Progressivo','','ia'));  
          $f3->field();
      $ts = new DB_tip_i('stato','rstat','','Stato record');  
          $ts->select();
      $arg = new DB_sel_l('arg','rprog','','rcod','aarg','rstat','rdesc','Argomento');
          $arg->select_label();
      $cap = new DB_sel_l('cap','cprog','','ccod','acap','cstat','cdesc','Capitolo');
          $cap->select_label();
      $f4 = new input(array('','atit',30,'Titolo','','i'));     
          $f4->field(); 
      $f4 = new input(array('','amostra',1,'Mostra il titolo','','i'));    
          $f4->field();  
      $f9 = new input(array($content,'atext',30,'Testo','','tx'));  
          $f9->field();       
echo "</fieldset>";
echo "</div>";
echo "</form>";
        break;
     }
     
    case 'modifica':
{   // record in modifica 
$param = array('modifica','ritorno');
$btx   = new bottoni_str_par('Articoli - modifica','art','write_art.php',$param);     
     $btx->btn();
     // contenitore
     echo "<div class='col-md-7'>";     
// lettura database  
$sql =  "SELECT * FROM `".DB::$pref."art` 
                     WHERE `aid` ='".$aid."' ";
    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
     foreach($PDO->query($sql) as $row)
     {
     include_once('fields_art.php');
     echo  "<fieldset>";
      $f2 = new input(array($aid,'aid',03,'','','h'));          
          $f2->field();
      $f3 = new input(array($aprog,'aprog',03,'Progressivo','','i'));    
          $f3->field(); 
      $ts    = new DB_tip_i('stato','astat',$astat,'Stato record');  
          $ts->select();
      $arg2 = new DB_sel_l('arg','rprog',$aarg,'rcod','aarg','rstat','rdesc','Argomento');
          $arg2->select_label();
      $cap2 = new DB_sel_l('cap','cprog',$acap,'ccod','acap','cstat','cdesc','Capitolo');
          $cap2->select_label();
      $f4 = new input(array($atit,'atit',30,'Titolo articolo','','i'));    
          $f4->field(); 
      $f4 = new input(array($amostra,'amostra',1,'Mostra il titolo','','i'));    
          $f4->field(); 
     echo "<br />";
      $f9 = new input(array($atext,'atext',30,'Testo','','tx'));  
          $f9->field();
     }
echo "</div>";           // col
break;
    }
    
    case 'cancella' :
    {
     $param = array('cancella','ritorno');
     $btx   = new bottoni_str_par('Conferma cancellazione','art','write_art.php',$param);     
          $btx->btn();                 
     $sql = "SELECT * 
               FROM `".DB::$pref."art` 
               WHERE `aid` = $aid ";
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
     foreach($PDO->query($sql) as $row)
     {
     include_once('fields_art.php');
     echo  "<fieldset>";
      $f2 = new input(array($aid,'aid',03,'','','h'));             
          $f2->field();
      $f3 = new input(array($aprog,'aprog',03,'Progressivo','','r'));       
          $f3->field(); 
      $f4 = new input(array($astat,'astat',01,'Stato record','','r'));      
          $f4->field(); 
      $f5 = new input(array($aarg,'aarg',20,'Argomento','','r'));           
          $f5->field(); 
      $f6 = new input(array($acap,'acap',20,'Capitolo','','r'));            
          $f6->field(); 
      $f7 = new input(array($atit,'atit',30,'Titolo articolo','','r'));     
          $f7->field(); 
      $f8 = new input(array($amostra,'amostra',1,'Mostra titolo','','r'));  
          $f8->field(); 
      $f9 = new input(array($atext,'atext',33,'Testo','','r'));  
          $f9->field(); 
     }          
echo    "</form>";
    break;
    }

case 'chiudi' :   
          $loc = "location:index.php?urla=widget.php&pag=";
          header($loc);                                   
          break;     
                  
default:          
          echo "<br />art-upd=".$azione;   
}
ob_end_flush();
?>

</body>
</html>
