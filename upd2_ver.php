<?php session_start();      ob_start();   
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * Gestione versamenti iscritti - modifica e cancella
============================================================================= */
include_once 'include_gest.php';
//$_REQUEST['err'] = NULL;
$tipo     = $_SESSION['pag']; 
// DOCTYPE & head
$head = new getBootHead('Versamenti iscritti');
     $head->getBootHead(); 
echo "<script src='js/FBbase.js'></script> ";
include_once('post_ver.php');           
$azione   =$_POST['submit'];   //print_r($_POST);//debug

// test se effettuata scelta
if (!isset($vid)  &&  $azione != 'ritorno') 
{  
         $_SESSION['esito'] = 4;
          $loc = "location:index.php?".$_SESSION['location']."";
          header($loc);
}

switch ($azione)          
{
// modifica =====================================================================================
    case 'modifica':
 //   bottoni gestione
$param  = array('modifica','ritorno');    
$btx    = new bottoni_str_par('Modifica versamenti','ver','write_ver.php',$param);  
     $btx->btn();
{
// lato sinistro comune    
     echo     "<div class='container form-horizontal'>"; 
     echo     "<div class='row container'>";
     echo     "<div class='col-md-6'>";  
     echo  "<fieldset><legend> Anagrafica </legend>";
     include('post_isc.php');    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction();  
          $sql="SELECT * FROM `".DB::$pref."isc` 
                WHERE numero_iscrizione = $numero_iscrizione";
          foreach($PDO->query($sql) as $row)   
          {                                         
          include('fields_isc.php'); 
          $fa = new input(array($numero_iscrizione,'numero_iscrizione',5,'Iscritto N.','','rb'));   
          $fa->field();     
          $fd = new input(array($cognome,'cognome',25,'Cognome','','r'));                          
          $fd->field(); 
          $fe = new input(array($nome,'nome',25,'Nome','','r'));                          
          $fe->field(); 

          }
     echo  "</fieldset>";                                                                 
     echo "</div>"; 

// lato destro 
     echo     "<div class='col-md-6'>";  
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction();  
     $sqlv = "SELECT * FROM `".DB::$pref."ver` 
              WHERE `vid` = $vid "; 
     foreach($PDO->query($sqlv) as $row)  
     {
     echo  "<fieldset><legend> Versamenti </legend>";
     include 'fields_ver.php';
     $f2 = new input(array($vid,'vid',11,'ID','','h'));                       
          $f2->field();
     $f3 = new input(array($numero_iscrizione,'vnume',10,'Numero Iscritto','','h'));   
          $f3->field();
     $f4 = new input(array($vdata,'vdata',12,'Data','','d1'));                 
          $f4->field();     
     $f5 = new input(array(number_format($vimporto,2,',',''),'vimporto',10,'Importo','','ir'));               
          $f5->field();
     $tb = new DB_tip_i('pag','vmezzo',$vmezzo,'A mezzo');      
          $tb->select(); 
     $f9 = new input(array($vrife,'vrife',30,'Riferimento','','i'));          
          $f9->field();
     $f0 = new input(array($vassnum,'vassnum',30,'N.ro assegno','','i'));     
          $f0->field();
     $f8 = new input(array($vprog,'vprog',7,'Ricevuta ISC /','','r'));        
          $f8->field();    
     $f6 = new input(array($vanno,'vanno',6,'Anno','','i'));                  
          $f6->field();
     echo  "</fieldset></div></div></div>";
     echo  "</form>";
     } 
      break;          
} 
// cancella =====================================================================================
    case 'cancella':
     $param  = array('cancella','ritorno');    
     $btx    = new bottoni_str_par('Conferma cancell.','ver','write_ver.php',$param);  
          $btx->btn();
    {
// lato sinistro comune    
     echo     "<div class='container form-horizontal'>"; 
     echo     "<div class='row container'>";
     echo     "<div class='col-md-6'>"; 
     echo  "<fieldset><legend> Anagrafica </legend>";
     include('post_isc.php');
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction();      
          $sql="SELECT * FROM `".DB::$pref."isc` 
                WHERE numero_iscrizione = $numero_iscrizione";
          foreach($PDO->query($sql) as $row)   
          {
          include('fields_isc.php'); 
          $fa = new input(array($numero_iscrizione,'numero_iscrizione',5,'Iscritto N.','','rb'));   
          $fa->field();     
          $fd = new input(array($cognome,'cognome',25,'Cognome','','r'));                          
          $fd->field(); 
          $fe = new input(array($nome,'nome',25,'Nome','','r'));                          
          $fe->field(); 
          }
     echo  "</fieldset>";                                                                 
     echo "</div>"; 

// lato destro 
     $sqlv = "SELECT * FROM `".DB::$pref."ver` 
              WHERE `vid` = $vid "; 
     foreach($PDO->query($sqlv) as $row)  
     {
     echo     "<div class='col-md-6'>"; 
     echo  "<fieldset><legend> Versamenti </legend>";
     include 'fields_ver.php';
      $f2 = new input(array($vid,'vid',11,'ID','','h'));                       
          $f2->field();
     $f3 = new input(array($numero_iscrizione,'vnume',10,'Numero Iscritto','','h'));   
          $f3->field();
     $f4 = new input(array($vdata,'vdata',12,'Data','','r'));                 
          $f4->field();     
     $f5 = new input(array(number_format($vimporto,2,',',''),'vimporto',10,'Importo','','r'));               
          $f5->field();
     $f7 = new input(array($vmezzo,'vmezzo',10,'A mezzo','','r'));          
          $f7->field();
     $f9 = new input(array($vrife,'vrife',30,'Riferimento','','r'));          
          $f9->field();
     $f0 = new input(array($vassnum,'vassnum',30,'N.ro assegno','','r'));     
          $f0->field();
     $f8 = new input(array($vprog,'vprog',7,'Ricevuta ISC /','','r'));        
          $f8->field();    
     $f6 = new input(array($vanno,'vanno',6,'Anno','','r'));                  
          $f6->field();    
     
     
     echo  "</fieldset></div></div></div>";
     echo  "</form>";
     } 
      break;          
} 

     case 'ritorno' :
     { 
     $loc = "location:index.php?".$_SESSION['location']."";
     header($loc);                              
     break;      
     } 

    default:        echo $azione."=Operazione invalida";    
}
ob_end_flush();
echo "</html>";
?>
