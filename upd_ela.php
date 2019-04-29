<?php session_start();      ob_start();   
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
 * gestione tabella 'ela' per ELARGITORI
 * fissato elargitori nella select
 * ============================================================================= */
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>";    

include_once('post_ela.php');
$tipo     = $_SESSION['pag'];
$azione   = $_POST['submit'];

// test scelta id (Escluso 'nuovo')
if (
     (($id <= 0 )  ||  ($id == '')  || ($id == NULL ))
     && ($azione <> 'nuovo')
     )
     { 
     $_SESSION['esito'] = 4;
     $loc = "location:index.php?".$_SESSION['location']."";
     header($loc);                          
     }

switch ($azione)
{ // controllo
    case 'chiudi':
    {
     $loc = "location:index.php?urla=widget.php&pag=";
     header($loc);                          
    break; }
// inserimento 
    case 'nuovo':
    {
     echo "<div class='container form-horizontal'>"; 
     echo "<div class='row container'>";
     $param = array('nuovo','ritorno');
          $btx   = new bottoni_str_par('Inserimento elargitori','ela','write_ela.php',$param);     
     $btx->btn();     
     echo "</div>";   // row  

     echo "<div class='row container'>";     
     echo "<div class='col-md-6'>";
     echo "<fieldset><legend>&nbsp;Anagrafica&nbsp;</legend>";
     $fz = new input(array(NULL,'id',11,' ',' ','h'));                            
          $fz->field();
     $ins = new DB_ins('ela','numero');                             
     $fa = new input(array($ins->insert1(),'numero',5,'Numero elargitore',' ','rb'));          
          $fa->field();
     $ts = new DB_tip_i('ana2','stato','L','Stato record','');         
          $ts->select();
     $tb = new DB_tip_i('tit','titolo',' ','Titolo','');               
          $tb->select();
     $tc = new DB_tip_i('tit+','titolo_plus',' ','Segue titolo','');   
          $tc->select();
     $fd = new input(array(' ','RagioneSociale',40,'R.Sociale/Cognome',' ','ir'));  
          $fd->field();
     $fe = new input(array('','referente',40,'Referente',' ','i'));                
          $fe->field();
     $ff = new input(array('','indirizzo',40,'Indirizzo',' ','i'));                
          $ff->field();
     $fg = new input(array('','cap',25,'Cap',' ','i'));                            
          $fg->field();
     $fh = new input(array('','localita',25,'Localit&agrave;',' ','i'));           
          $fh->field();
     $ft = new input(array('','provincia',25,'Provincia',' ','i'));                
          $ft->field();
     $fj = new input(array('','telefono',25,'Telefono',' ','i'));                  
          $fj->field();
     $fq = new input(array(date ("d-m-Y"),'data_inserimento',12,'Data inserimento',' ','d1'));  
          $fq->field();                    
     $ft = new input(array(0,'stampa',2,'Stampa',' ','i'));                       
          $ft->field();
     $tv = new DB_tip_i('cat','categoria',' ','Categoria');           
          $tv->select();
     $a1 = new input(array(1,'tipo',1,'Tipo','','r'));
          $a1->field();
     $a1 = new input(array(' ','note',33,'Note',' ','i'));
          $a1->field();
     echo "</fieldset>"; 
     echo "</div>";  // col 
     echo "</div>";  // row                                                             
     echo "</form>";
      break;
     }
// modifica     
    case 'modifica':
    {
     $param = array('modifica','ritorno');
          $btx   = new bottoni_str_par('ELARGITORI modifica','ela','write_ela.php',$param);     
     $btx->btn();

     echo "<div class='row container'>";
     echo "<div class='col-md-6'>";
     echo  "<fieldset><legend> Anagrafica </legend>";
     
// transazione 
     $sql = "SELECT * FROM `".DB::$pref."ela` 
             WHERE `id` = $id "; 
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sql) as $row)
     {
     include('fields_ela.php');     
     $fz = new input(array($id,'id',11,'','','h'));                            
          $fz->field();
     $fa = new input(array($numero,'numero',5,'Numero esterno',' ','rb'));        
          $fa->field();
     $ts = new DB_tip_i('ana2','stato',$stato,'Stato record','');        
          $ts->select();
     $tb = new DB_tip_i('tit','titolo',$titolo,'Titolo','');               
          $tb->select();
     $tc = new DB_tip_i('tit+','titolo_plus',$titolo_plus,'Segue titolo','');   
          $tc->select();
     $fd = new input(array($RagioneSociale,'RagioneSociale',40,'R.Sociale/Cognome',' ','ir'));  
          $fd->field();
     $fe = new input(array($referente,'referente',40,'Referente',' ','i'));  
          $fe->field();
     $ff = new input(array($indirizzo,'indirizzo',40,'Indirizzo',' ','i'));                
          $ff->field();
     $fg = new input(array($cap,'cap',25,'Cap',' ','i'));                            
          $fg->field();
     $fh = new input(array($localita,'localita',25,'Localit&agrave;',' ','i'));           
          $fh->field();
     $ft = new input(array($provincia,'provincia',25,'Provincia',' ','i'));                
          $ft->field();
     $fj = new input(array($telefono,'telefono',25,'Telefono',' ','i'));                  
          $fj->field();
     $fq = new input(array($data_inserimento,'data_inserimento',12,'Data inserimento',' ','d1'));  
          $fq->field();
     $ft = new input(array($stampa,'stampa',2,'Stampa',' ','i'));                    
          $ft->field();
     $tv = new DB_tip_i('cat','categoria',$categoria,'Categoria');           
          $tv->select();
     $a1 = new input(array($tipo,'tipo',1,'Tipo','','r'));
          $a1->field();
     $x1 = new input(array($note,'note',33,'Note',' ','i'));
          $x1->field();
     }
     echo  "</fieldset>";                                                                 
     echo "</div>";    // col

// versamenti per elargizioni
     echo "<div class='col-md-6'>"; 
     echo "<fieldset><legend> Elargizioni </legend>";
      $fa = new fieldt('Data',10);           
          $fa->field();
      $fb = new fieldt('Importo',10);        
          $fb->field();
      $fc = new fieldt('Nota',40);           
          $fc->field();
     echo "<br />";
          
// transazione 
     $sql = "SELECT * FROM `".DB::$pref."vel` 
              WHERE `enume` = $numero 
              ORDER BY edata"; 
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sql) as $row)     
     {
     include 'fields_vel.php';
     $f3 = new fieldi($edata,'edata',10);            
          $f3->field_r();
     $f3 = new fieldi(number_format($eimporto,2,',','.'),'eimporto',10);             
          $f3->field_r();
     $f3 = new fieldi($enota,'enota',40);            
          $f3->field_r(); 
     echo "<br />";
     }     
     echo "</fieldset>";
     echo "</div>";        // col
     echo "</div>";        // row
     echo "</form>";
     break;
    }
// cancellazione    
    case 'cancella' :
    { 
     $param = array('cancella','ritorno');
          $btx = new bottoni_str_par('Cancellazione','ela','write_ela.php',$param);     
     $btx->btn();
     echo "<div class='row container'>";
     echo "<div class='col-md-6'>";
     echo "<fieldset><legend>&nbsp;Anagrafica&nbsp;</legend>";
// transazione
     $sql = "SELECT * FROM `".DB::$pref."ela` 
             WHERE `id` = $id "; 
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sql) as $row)
     {
     include('fields_ela.php');    
     $fz = new input(array($id,'id',11,'','','h'));                             
          $fz->field();
     $fa = new input(array($numero,'numero',5,'Numero esterno','','rb'));          
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
     $ft = new input(array($stampa,'stampa',2,'Stampa','','r'));                  
          $ft->field();
     $fv = new input(array($categoria,'categoria',2,'Categoria','','r'));         
          $fv->field();
     $a1 = new input(array(1,'tipo',1,'Tipo','','r'));
          $a1->field();
     $a1 = new input(array($note,'note',33,'Note',' ','ir'));
          $a1->field();
     }
     echo "</fieldset>";                                                                 
     echo "</div>";    // col


// versamenti per elargizioni
     echo "<div class='col-md-6'>"; 
     echo "<fieldset><legend> Elargizioni </legend>";
      $fa = new fieldt('Data',10);           $fa->field();
      $fb = new fieldt('Importo',10);        $fb->field();
      $fc = new fieldt('Nota',40);           $fc->field();
     echo "<br />";
          
// transazione 
     $sqlc = "SELECT * FROM `".DB::$pref."vel` 
              WHERE `enume` = $numero 
              ORDER BY edata"; 
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sqlc) as $row)
     {
     include 'fields_vel.php';
     $f3 = new fieldi($edata,'edata',10);        
          $f3->field_r();
     $f4 = new fieldi(number_format($eimporto,2,',','.'),'eimporto',10);         
          $f4->field_r();
     $f5 = new fieldi($enota,'enota',40);        
          $f5->field_r(); 
     echo "<br />";
     } 
     echo "</fieldset>";
     echo "</div>";        // col
     echo "</div>";        // row
     echo "</form>";
     break;
      } 
/** ---------------------------------------------------
 * inserimento iscritto da elargitore (15/05/2017)
 * riporto i campi dell'elargitore.
--------------------------------------------------------*/
    case 'a-iscritti':
    {
     $param = array('a-iscritti','ritorno');
     $btx   = new bottoni_str_par('Passaggio a iscritti','isc','write_isc.php',$param);     
          $btx->btn();
     echo "<div class='row container'>";
     echo "<div class='col-md-6'>";
     echo "<fieldset><legend>&nbsp;Anagrafica&nbsp;</legend>";     
// transazione  
     $sql = "SELECT * FROM `".DB::$pref."ela` 
             WHERE `id` = $id "; 
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sql) as $row)
     {
     include('fields_ela.php');  
// lato sinistro     
     $fz = new input(array(NULL,'id',11,'','','h'));                       
          $fz->field();
     $ins = new DB_ins('isc','numero_iscrizione'); 
     $fa = new input(array($ins->insert1(),'numero_iscrizione',5,'Numero iscrizione',' ','rb'));
          $fa->field();
// dati dall'elargitore
     $tb = new DB_tip_i('tit','titolo',$titolo,'Titolo');          
          $tb->select();
     $tc = new DB_tip_i('tit+','titolo_plus',$titolo_plus,'Segue titolo');   
          $tc->select();
     $fd = new input(array($RagioneSociale,'cognome',25,'Cognome',' ','ir'));               
          $fd->field();
     $fe = new input(array($referente,'nome',25,'Nome',' ','i'));                     
          $fe->field();
     $ff = new input(array($indirizzo,'indirizzo',40,'Indirizzo',' ','i'));           
          $ff->field();
     $fg = new input(array($cap,'cap',25,'Cap',' ','i'));                       
          $fg->field();
     $fh = new input(array($localita,'localita',25,'Localit&agrave;',' ','i'));      
          $fh->field();
     $ft = new DB_tip_i('pr','prov',$provincia,'Provincia','');          
          $ft->select();
     }
     echo  "</fieldset>"; 
// Incarichi e cariche
     echo "<fieldset><legend> Incarichi e cariche </legend>"; 
     $t1 = new DB_tip_i('tipo','tipologia','1','Socio','');               
          $t1->select();      
     $t2 = new DB_tip_i('car','icons_dir','','Consiglio direttivo','');  
          $t2->select();     
     $t3 = new DB_tip_i('car','icons_ese','','Comitato esecutivo','');     
          $t3->select();     
     echo  "</fieldset>";
 
     echo "</div>";   // col
// lato destro                                                           
     echo "<div class='col-md-6'>";
     echo  "<fieldset><legend> Altri dati </legend>"; 
     $fl = new input(array('','cod_fisc',25,'Codice fiscale',' ','i'));         
          $fl->field();
     $fm = new input(array('','nascita_luogo',25,'Luogo di nascita',' ','i'));  
          $fm->field();
     $fu = new input(array('','prov_na',25,'Provincia di nascita',' ','i'));    
          $fu->field(); 
     $fo = new input(array('','nascita_data',12,'Data di nascita',' ','d1'));    
          $fo->field();
     $fq = new input(array('','data_iscrizione',12,'Data iscrizione',' ','d2')); 
          $fq->field();
     $fj = new input(array($telefono,'telefono',25,'Telefono',' ','i'));               
          $fj->field();     
     $fk = new input(array('','cellulare',25,'Cellulare',' ','i'));             
          $fk->field();     
     $fv = new input(array('','email',40,'E-mail',' ','i'));                    
          $fv->field();
     $fs = new input(array('','archiviare',2,'Coniuge',' ','i'));               
          $fs->field(); 
     $fty = new DB_tip_i('prt','stampa',$stampa,'Stampa','');          
          $fty->select();
     $fx = new input(array($note,'note',33,'Note',' ','i'));                  
          $fx->field();
     echo  "</fieldset>";
     echo  "</div>";  // col
     echo  "</div>";  // row   
    echo  "</div>";   // container
     echo  "</form>";
      break;
     }
    default:
     echo "Operazione invalida";    
}
ob_end_flush();
?>
