<?php session_start();      ob_start();   
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
 * gestione tabella 'ind' per indirizzi vari
 * ============================================================================= */
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>"; 
include_once('post_ind.php');
$azione   = $_POST['submit'];

// mostra stringa bottoni 
    switch ($azione)
     {
     case 'nuovo': 
          {
          $param = array('nuovo','ritorno');
          $btx   = new bottoni_str_par('Inserimento','ind','write_ind.php',$param);     
               $btx->btn(); 
          break; 
          }
     case 'mostra' : 
          {
          $param = array('ritorno');
          $btx   = new bottoni_str_par('Visualizzazione','ind','write_ind.php',$param);     
               $btx->btn();
          break; 
          } 
     case 'modifica':  
          {
          $param = array('modifica','ritorno');
          $btx   = new bottoni_str_par('<strong>INDIRIZZI</strong> - modifica','ind','write_ind.php',$param);     
               $btx->btn();                  
          break;  
          }
     case 'cancella' : 
          {
          $param = array('cancella','ritorno');
          $btx   = new bottoni_str_par('Conferma cancellaz.','ind','write_ind.php',$param);     
               $btx->btn();          
          break;  
          }
     case 'chiudi' :
          { 
          $loc = "location:index.php?urla=widget.php&pag=";
          header($loc);                                   
          break;      
          } 
     }

switch ($azione)
{ // controllo
    case 'uscita':
    {
    header('location:gest_ind.php');
    break; }
// inserimento 
    case 'nuovo':
    {
     echo "<div class='crea'>";
     echo  "<fieldset><legend> Anagrafica INDIRIZZI </legend>";
     $fz = new input(array(NULL,'id',11,'','','h'));                            
          $fz->field();
     $ins = new DB_ins('ind','numero');                             
     $fa = new input(array($ins->insert1(),'numero',5,'Numero esterno','','rb'));          
          $fa->field();
     $ts = new DB_tip_i('stato','stato','','Stato record','');         
          $ts->select();
     $tb = new DB_tip_i('tit','titolo',' ','Titolo','');               
          $tb->select();
     $tc = new DB_tip_i('tit+','titolo_plus',' ','Segue titolo','');   
          $tc->select();
     $fd = new input(array(' ','RagioneSociale',40,'R.Sociale/Cognome','','ir'));   
          $fd->field();
     $fe = new input(array('','referente',40,'Referente','','i'));                
          $fe->field();
     $ff = new input(array('','indirizzo',40,'Indirizzo','','i'));                
          $ff->field();
     $fg = new input(array('','cap',25,'Cap','','i'));                            
          $fg->field();
     $fh = new input(array('','localita',25,'Localit&agrave;','','i'));           
          $fh->field();
     $ft = new input(array('','provincia',25,'Provincia','','i'));                
          $ft->field();
     $fj = new input(array('','telefono',25,'Telefono','','i'));                  
          $fj->field();
     $fq = new input(array('','data_inserimento',12,'Data inserimento','','d1'));  
          $fq->field();                    
     $tv = new DB_tip_i('ind','stampa',' ','Categoria');            
          $tv->select();
     $fr = new input(array('','note',12,'Note','','i'));  
          $fr->field();                    
     echo  "</fieldset></div>";                                                                 
     echo    "</form>";
      break;
     }
// modifica     
    case 'modifica':
    {
// transazione
     $sql = "SELECT * FROM `".DB::$pref."ind` 
             WHERE `id` = $id "; 
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
     foreach($PDO->query($sql) as $row)
     {
     include('fields_ind.php');    
     echo "<div class='crea'>";
     echo  "<fieldset><legend> Anagrafica INDIRIZZI </legend>";
     $fz = new input(array($id,'id',11,'','','h'));                            
          $fz->field();
     $fa = new input(array($numero,'numero',5,'Numero esterno','','rb'));        
          $fa->field();
     $ts = new DB_tip_i('stato','stato',$stato,'Stato record','');        
          $ts->select();
     $tb = new DB_tip_i('tit','titolo',$titolo,'Titolo','');               
          $tb->select();
     $tc = new DB_tip_i('tit+','titolo_plus',$titolo_plus,'Segue titolo','');   
          $tc->select();
     $fd = new input(array($RagioneSociale,'RagioneSociale',40,'R.Sociale/Cognome','','ir'));  
          $fd->field();
     $fe = new input(array($referente,'referente',40,'Referente','','i'));  
          $fe->field();
     $ff = new input(array($indirizzo,'indirizzo',40,'Indirizzo','','i'));                
          $ff->field();
     $fg = new input(array($cap,'cap',25,'Cap','','i'));                            
          $fg->field();
     $fh = new input(array($localita,'localita',25,'Localit&agrave;','','i'));           
          $fh->field();
     $ft = new input(array($provincia,'provincia',25,'Provincia','','i'));                
          $ft->field();
     $fj = new input(array($telefono,'telefono',25,'Telefono','','i'));                  
          $fj->field();
     $fq = new input(array($data_inserimento,'data_inserimento',12,'Data inserimento','','d1'));  
          $fq->field();
     $tv = new DB_tip_i('ind','stampa',$stampa,'Categoria','');           
          $tv->select();
     $f1 = new input(array($note,'note',40,'Note','','i'));                  
          $f1->field();
     }         
     echo  "</fieldset>";                                                                 
     echo "</div>"; 
     echo    "</form>";
     break;
    }
// cancellazione - visualizzazione   
    case 'cancella' :
    case 'mostra' :
    { 
     $sql = "SELECT * FROM `".DB::$pref."ind` 
             WHERE `id` = $id "; 
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
     foreach($PDO->query($sql) as $row)
     {
     include('fields_ind.php');    
     echo "<div class='crea'>";
     echo  "<fieldset><legend> Anagrafica INDIRIZZI </legend>";
     $fz = new input(array($id,'id',11,'','','h'));                             
          $fz->field();
     $fa = new input(array($numero,'numero',5,'Numero indirizzo','','rb'));          
          $fa->field();
     $ts = new input(array($stato,'stato',15,'Stato record','','r'));             
          $ts->field();
     $tb = new input(array($titolo,'titolo',15,'Titolo','','r'));                 
          $tb->field();
     $tc = new input(array($titolo_plus,'titolo_plus',15,'Segue titolo','','r')); 
          $tc->field();
     $fd = new input(array($RagioneSociale,'RagioneSociale',40,'R.Sociale/Cognome','','r'));  
          $fd->field();
     $fe = new input(array($referente,'referente',40,'Referente','','r'));          
          $fe->field();
     $ff = new input(array($indirizzo,'indirizzo',40,'Indirizzo','','r'));        
          $ff->field();
     $fg = new input(array($cap,'cap',25,'Cap','','r'));                          
          $fg->field();
     $fh = new input(array($localita,'localita',25,'Localit&agrave;','','r'));    
          $fh->field();
     $ft = new input(array($provincia,'provincia',25,'Provincia','','r'));        
          $ft->field();
     $fj = new input(array($telefono,'telefono',25,'Telefono','','r'));           
          $fj->field();
     $fq = new input(array($data_inserimento,'data_inserimento',12,'Data inserimento','','r'));  
          $fq->field();
     $ft = new input(array($stampa,'stampa',2,'Categoria','','r'));                  
          $ft->field();
     $fv = new input(array($note,'note',33,'Note','','r'));                  
          $fv->field();
     }
     echo  "</fieldset>";                                                                 
     echo "</div>"; 

     echo    "</form>";
     break;
      } 
    default:
     echo "Operazione invalida".$azione;    
}                                               
ob_end_flush();
?>
