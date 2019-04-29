<?php session_start();      ob_start();   
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * Gestione versamenti elargitori - modifica e cancella
   * 07/10/2017     gestione evento
============================================================================= */
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>";   

include_once('post_vel.php');           
$azione   =$_POST['submit']; 

// test se effettuata scelta
if (!isset($eid)) 
     {  
     $_SESSION['esito'] = 4;
     header('location:gest_vel.php');
     }

// test scelta effettuata sul pgm chiamante switch ($azione)
if (isset($eid) ) 
{
switch ($azione)          
{
// modifica =====================================================================================
    case 'modifica':
{    
 //   bottoni gestione
     $param = array('modifica','ritorno');
     $btx   = new bottoni_str_par('Modifica versamenti','vel','write_vel.php',$param);     
          $btx->btn();
// lato sinistro comune    
     echo "<div class='crea'>";
     echo  "<fieldset><legend> Anagrafica </legend>";
     include('post_ela.php');    
          $sql="SELECT * FROM `".DB::$pref."ela` 
                WHERE numero = $numero";
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
     foreach($PDO->query($sql) as $row)          
          {
          include('fields_ela.php'); 
          $fa = new input(array($numero,'numero',5,'Elargitore N.',' ','rb'));   
               $fa->field();     
          $fd = new input(array($RagioneSociale,'RagioneSociale',40,'Nome o R.Sociale',' ','r'));
               $fd->field();
         }
     echo  "</fieldset>";                                                                 
     echo "</div>"; 

// lato destro 
     $sqlv = "SELECT * FROM `".DB::$pref."vel` 
              WHERE `eid` = $eid "; 
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sqlv) as $row)     {
     echo "<div class='crea_dx'>"; 
     echo  "<fieldset><legend> Versamenti </legend>";
     include 'fields_vel.php';
     $f2 = new input(array($eid,'eid',11,'',' ','h'));                       
          $f2->field();
     $f3 = new input(array($numero,'enume',10,'Numero Elargitore',' ','h'));   
          $f3->field();
     $f4 = new input(array($edata,'edata',12,'Data',' ','d1'));                 
          $f4->field();     
     $f5 = new input(array(number_format($eimporto,2,',',''),'eimporto',10,'Importo',' ','ir'));               
          $f5->field();
     $tb = new DB_tip_i('pag','emezzo',$emezzo,'A mezzo','');      
          $tb->select(); 
     $f9 = new input(array($erife,'erife',30,'Riferimento','Nome della banca','i'));          
          $f9->field();     
     $f0 = new input(array($eassnum,'eassnum',30,'Numero','numero assegno o altri dati','i'));                
          $f0->field();
     $f8 = new input(array($eprog,'eprog',7,'Ricevuta ELA /',' ','r'));        
          $f8->field(); 
     $fw = new input(array($ecausale,'ecausale',40,'Causale speciale','Causale che si sostituisce a quella standard','i'));                     
          $fw->field();
     $f6 = new input(array($enota,'enota',40,'Nota','Altri eventuali dati','i'));                 
          $f6->field(); 
     $tc = new DB_tip_i('eve','evento',$evento,'Evento','Se si tratta di uno degli eventi previsti');       
          $tc->select();
     echo  "</fieldset></div>";
     echo  "</form>";
     } 
      break;          
} 
// cancella =====================================================================================
    case 'cancella':
 //   bottoni gestione
$param = array('cancella','ritorno');
$btx   = new bottoni_str_par('Versamenti <strong>ELARGITORI</strong> - cancellazione','vel','write_vel.php',$param);     
     $btx->btn();
    {
// lato sinistro comune    
     echo "<div class='crea'>";
     echo  "<fieldset><legend> Anagrafica </legend>";
     include('post_ela.php');    
          $sql="SELECT * FROM `".DB::$pref."ela` 
                WHERE numero = $numero";
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
     foreach($PDO->query($sql) as $row)          
          {
          include('fields_ela.php'); 
          $fa = new input(array($numero,'numero',5,'Elargitore N.',' ','rb'));   
               $fa->field();     
          $fd = new input(array($RagioneSociale,'RagioneSociale',40,'Nome o R.Sociale',' ','r'));
               $fd->field(); 
          }
     echo  "</fieldset>";                                                                 
     echo "</div>"; 

// lato destro 
     $sqlv = "SELECT * FROM `".DB::$pref."vel` 
              WHERE `eid` = $eid "; 
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
     foreach($PDO->query($sqlv) as $row)     
     {
     echo "<div class='crea_dx'>"; 
     echo  "<fieldset><legend> Versamenti </legend>";
     include 'fields_vel.php';
     $f2 = new input(array($eid,'eid',11,' ',' ','h'));                      
          $f2->field();
     $f3 = new input(array($numero,'enume',10,'Numero Elargitore',' ','h'));  
          $f3->field();
     $f4 = new input(array($edata,'edata',10,'Data',' ','r'));                
          $f4->field();
     $f5 = new input(array(number_format($eimporto,2,',',''),'eimporto',10,'Importo',' ','r'));              
          $f5->field();
     $f7 = new input(array($emezzo,'emezzo',10,'A mezzo',' ','r'));           
          $f7->field();
     $f9 = new input(array($erife,'erife',30,'Riferimento',' ','r'));         
          $f9->field();     
     $f0 = new input(array($eassnum,'eassnum',30,'Numero',' ','r'));          
          $f0->field();
     $f8 = new input(array($eprog,'eprog',7,'Ricevuta ELA /',' ','r'));       
          $f8->field();
     $fw = new input(array($ecausale,'ecausale',40,'Causale speciale','Causale che si sostituisce a quella standard','r'));                     
          $fw->field();
     $f6 = new input(array($enota,'enota',40,'Nota',' ','r'));                
          $f6->field(); 
     $f6 = new input(array($evento,'evento',3,'Evento',' ','r'));             
          $f6->field();
     echo  "</fieldset></div>";
     echo  "</form>";
     } 
      break;          
} 
    default:        echo "Operazione invalida";    
}
}
ob_end_flush();
echo "</html>";
?>
