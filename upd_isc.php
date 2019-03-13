<?php session_start();      ob_start();   
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * gestione tabella 'isc' anche per archiviati
   * 17.04.2013 - Datepicker   
   * 23-11-2017 - PDO e bootstrap
============================================================================= */
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
     echo "</head>";   
include_once('post_isc.php');
$tipo     = $_SESSION['pag'];
$id       = $_POST['id'];
$azione   = $_POST['submit'];           //print_r($_POST); echo "<br />ID=".$id;//debug
                                        
// test effettuata scelta id (Escluso 'nuovo')
if (
     (($id <= 0 )  ||  ($id == '')  || ($id == NULL ))
     && ($azione <> 'nuovo' && $azione <> 'aiuto')
     )
     { 
     $_SESSION['esito'] = 4;
     $loc = "location:index.php?".$_SESSION['location']."";
     header($loc);                          
     }

// mostra stringa bottoni o chiude
     // contenitore
     echo     "<div class='container form-horizontal'>"; 
     echo     "<div class='row container'>";

if ($tipo == 'I') 
{ switch ($azione)
     {
     case 'nuovo':    {  $param  = array('nuovo','ritorno');    
                         $btx    = new bottoni_str_par('NUOVO Iscritto','isc','write_isc.php',$param);  
                              $btx->btn();
                         break;  }
     case 'mostra':   { $param  = array('esci');    
                         $btx    = new bottoni_str_par('Iscritti - visualizza','isc','write_isc.php',$param);  
                              $btx->btn();
                         break;  }
     case 'modifica': { $param  = array('modifica','ritorno');    
                         $btx    = new bottoni_str_par('Iscritti - modifica','isc','write_isc.php',$param);  
                              $btx->btn();
                         break;  }
    case 'archivia' : { $param  = array('archivia','ritorno');    
                         $btx    = new bottoni_str_par('Archiviazione','isc','write_isc.php',$param);  
                              $btx->btn();                              
                         break;  }
     case 'cancella' : { $param  = array('cancella','ritorno');    
                         $btx    = new bottoni_str_par('Conferma cancellazione','isc','write_isc.php',$param);  
                              $btx->btn();
                         break;  }
     case 'aiuto' : {    $param  = array('ritorno');    
                         $btx    = new bottoni_str_par('Gestione Iscritti - aiuto','isc','upd_isc.php',$param);  
                              $btx->btn();
                         break;  }
     case 'chiudi' :     {
                         $loc = "location:index.php?urla=widget.php&pag=";
                         header($loc);
                         break;      } 
     }
}

// idem per ARCHIVIATI
if ($tipo == 'A') 
{ switch ($azione)
     {
     case 'mostra': { $param  = array('esci');    
                      $btx    = new bottoni_str_par('Iscritti <strong>ARCHIVIATI</strong>- visualizza','isc','write_isc.php',$param);  
                           $btx->btn();
                      break;  }
    case 'ripristina' : { $param  = array('ripristina','ritorno');    
                         $btx    = new bottoni_str_par('Iscritti - RIPRISTINO','isc','write_isc.php',$param);  
                              $btx->btn();
                         break;  }

     case 'chiudi' :
               { 
               $loc = "location:index.php?urla=widget.php&pag=";
               header($loc);      
               break;      
               } 
     }
}
echo "</div>";       // row 

switch ($azione)
{ // controllo
    case '':
    {
    header('location:gest_isc.php');
    break; }
    
// inserimento  ==========================================================================
    case 'nuovo':
    {
// lato sinistro     
     echo     "<div class='row container well'>";
     echo     "<div class='col-md-6'>";  
     echo  "<fieldset><legend> Anagrafica </legend>";
     $fz = new input(array(NULL,'id',11,'','','h'));                       
          $fz->field();
     $ins = new DB_ins('isc','numero_iscrizione'); 
     $fa = new input(array($ins->insert1(),'numero_iscrizione',5,'Numero iscrizione','','rb'));
          $fa->field();
     $tb = new DB_tip_i('tit','titolo','A','Titolo');          
          $tb->select();
     $tc = new DB_tip_i('tit+','titolo_plus',' ','Segue titolo');   
          $tc->select();
     $fd = new input(array(' ','cognome',25,'Cognome','','ir'));               
          $fd->field();
     $fe = new input(array('','nome',25,'Nome','','i'));                     
          $fe->field();
     $ff = new input(array('','indirizzo',40,'Indirizzo','','i'));           
          $ff->field();
     $fg = new input(array('','cap',25,'Cap','','i'));                       
          $fg->field();
     $fh = new input(array('','localita',25,'Localit&agrave;','','i'));      
          $fh->field();
     $ft = new DB_tip_i('pr','prov',' ','Provincia');          
          $ft->select();
     echo  "</fieldset>"; 
     echo "</div>";   // col
     
// lato destro                                                           
     echo     "<div class='col-md-6'>"; 
     echo  "<fieldset><legend> Altri dati </legend>"; 
     $fl = new input(array('','cod_fisc',25,'Codice fiscale','','i'));         
          $fl->field();
     $fm = new input(array('','nascita_luogo',25,'Luogo di nascita','','i'));  
          $fm->field();
     $ft = new DB_tip_i('pr','prov_na','','Provincia di nascita');          
          $ft->select();
     $fy = new input(array('Italia','nascita_nazione',25,'Nazione di nascita','','i'));
          $fy->field();
     $fo = new input(array(date('d-m-Y'),'nascita_data',12,'Data di nascita','','d1'));    
          $fo->field();
     $fq = new input(array(date('d-m-Y'),'data_iscrizione',12,'Data iscrizione','','d2')); 
          $fq->field();
     $fj = new input(array('','telefono',25,'Telefono','','i'));               
          $fj->field();     
     $fk = new input(array('','cellulare',25,'Cellulare','','i'));             
          $fk->field();     
     $fv = new input(array('','email',40,'E-mail','','i'));                    
          $fv->field();
//     $fs = new input(array(0,'archiviare',2,'Coniuge','C=coniuge di altro iscritto','i'));               
 //         $fs->field();
     $ftz = new DB_tip_i('con','archiviare','','Coniuge');          
          $ftz->select();		  
     $fty = new DB_tip_i('prt','stampa',0,'Stampa');          
          $fty->select();
     $fx = new input(array($note,'note',33,'Note','','i'));                  
          $fx->field();
     echo  "</fieldset>";
     echo "</div>";   // col
     echo "</div>";   // row
      
// Incarichi e cariche
     echo     "<div class='row '>";
     echo     "<div class='col-md-6'>";
     echo "<fieldset><legend> Incarichi e cariche </legend>"; 
     $t1 = new DB_tip_i('tipo','tipologia','1','Socio');               
          $t1->select();      
     $t2 = new DB_tip_i('car','icons_dir','','Consiglio direttivo');  
          $t2->select();     
     $t3 = new DB_tip_i('car','icons_ese','','Comitato esecutivo');     
          $t3->select();     
     echo  "</fieldset>";
     echo  "</div>";   //col
     echo  "</div>";   // row   
     echo  "</div>";   // container
     echo  "</form>";
      break;
     }
     
// modifica ==============================================================================    
    case 'modifica':
    {
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction();  
     $sql = "SELECT * FROM `".DB::$pref."isc` 
             WHERE `id` = $id "; 
foreach($PDO->query($sql) as $row)               
{     include('fields_isc.php');    
// lato sinistro: Anagrafica 
     echo "<div class='row container well'>";
     echo "<div class='col-md-6'>";      
     echo "<fieldset><legend> Anagrafica </legend>";
     $fz = new input(array($id,'id',11,' ',' ','h'));                          
          $fz->field();
     $fa = new input(array($numero_iscrizione,'numero_iscrizione',5,'Numero iscrizione','Numero iscrizione','rb'));
          $fa->field(); 
     $tb = new DB_tip_i('tit','titolo',$titolo,'Titolo');      
          $tb->select();
     $tc = new DB_tip_i('tit+','titolo_plus',$titolo_plus,'Segue titolo');  
          $tc->select();
     $fd = new input(array($cognome,'cognome',25,'Cognome','','ir'));           
          $fd->field();
     $fe = new input(array($nome,'nome',25,'Nome','','i'));                    
          $fe->field();
     $ff = new input(array($indirizzo,'indirizzo',40,'Indirizzo','','i'));     
          $ff->field();
     $fg = new input(array($cap,'cap',25,'Cap','','i'));                       
          $fg->field();
     $fh = new input(array($localita,'localita',25,'Localit&agrave;','','i')); 
          $fh->field();
     $ft = new DB_tip_i('pr','prov',$prov,'Provincia');          
          $ft->select();
     $fj = new input(array($telefono,'telefono',25,'Telefono','','i'));           
          $fj->field();
     $fk = new input(array($cellulare,'cellulare',25,'Cellulare','','i'));        
          $fk->field();
     $fv = new input(array($email,'email',40,'E-mail','','i'));                   
          $fv->field();

     echo  "</fieldset>"; 
     echo "</div>";   // col

// lato destro: Altri dati     
     echo "<div class='col-md-6'>";      
     echo "<fieldset><legend> Altri dati </legend>"; 
     $fl = new input(array($cod_fisc,'cod_fisc',25,'Codice fiscale','','i'));  
          $fl->field();
     $fm = new input(array($nascita_luogo,'nascita_luogo',25,'Luogo di nascita','','i'));  
          $fm->field();
     $ft = new DB_tip_i('pr','prov_na',$prov_na,'Provincia di nascita');          
          $ft->select();
     $fy = new input(array($nascita_nazione,'nascita_nazione',25,'Nazione di nascita','','i'));
          $fy->field();
     $fo = new input(array($nascita_data,'nascita_data',12,'Data di nascita','','d1')); 
          $fo->field();
     $fq = new input(array($data_iscrizione,'data_iscrizione',12,'Data iscrizione','','d2'));    
          $fq->field();
//     $fs = new input(array($archiviare,'archiviare',2,'Coniuge','','i'));   
//          $fs->field(); 
     $ftz = new DB_tip_i('con','archiviare',$archiviare,'Coniuge');          
          $ftz->select();		  
		  
     $fty = new DB_tip_i('prt','stampa',$stampa,'Stampa');          
          $fty->select();
     $fx = new input(array($note,'note',33,'Note','','i'));                   
          $fx->field();    
     echo  "</fieldset>";
     echo  "</div>";   //col
     echo  "</div>";   // row   
     
// versamenti
     echo "<div class='row container well'>";
     echo "<div class='col-md-6'>";   
     echo "<fieldset><legend> Versamenti </legend>"; 
      $fa = new fieldt('Data',12);           
          $fa->field();
      $fb = new fieldt('Importo',10);        
          $fb->field();
      $fc = new fieldt('anno',4);            
          $fc->field();
    echo "<br />";          
     $sqlv = "SELECT * FROM `".DB::$pref."ver` 
              WHERE `vnume` = $numero_iscrizione 
              ORDER BY vanno,vdata"; 
$con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
$PDO = new PDO($con,DB::$user,DB::$pw);
$PDO->beginTransaction();  
foreach($PDO->query($sqlv) as $row)                
     {
    include 'fields_ver.php';
    $f3 = new fieldi($vdata,'vdata',12);          
     $f3->field_r();
    $f3 = new fieldi(number_format($vimporto,2,',','.'),'vimporto',10);           
     $f3->field_r();
    $f3 = new fieldi($vanno,'vanno',4);           
     $f3->field_r(); 
    echo "<br />";
    }     
     echo  "</fieldset>";
     echo  "</div>";   //col
          
// Incarichi e cariche
     echo "<fieldset><legend> Incarichi e cariche </legend>"; 
     $t1 = new DB_tip_i('tipo','tipologia',$tipologia,'Socio');                 
          $t1->select();      
     $t2 = new DB_tip_i('car','icons_dir',$icons_dir,'Consiglio direttivo');    
          $t2->select();     
     $t3 = new DB_tip_i('car','icons_ese',$icons_ese,'Comitato esecutivo');     
          $t3->select();     
     echo  "</fieldset>";
     echo  "</div>";   //col
     echo  "</div>";   //row
     }
     echo    "</form>";
     break;
    }
// cancellazione  archiviazione  ripristino mostra =======================================   
    case 'cancella' :
    case 'archivia' :
    case 'ripristina' :
    case 'mostra' :
    { $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
      $PDO = new PDO($con,DB::$user,DB::$pw);
      $PDO->beginTransaction();  
     $sql = "SELECT * FROM `".DB::$pref."isc` 
             WHERE `id` = $id "; 
     foreach($PDO->query($sql) as $row)
     { 
     include('fields_isc.php');  
                              
// lato sinistro: Anagrafica 
    
     echo     "<div class='container form-horizontal'>";
     echo     "<div class='row '>";
     echo     "<div class='col-md-6'>";
     echo "<fieldset><legend> Anagrafica </legend>";
     $fz = new input(array($id,'id',11,'','','h'));                          
          $fz->field();
     $fa = new input(array($numero_iscrizione,'numero_iscrizione',5,'Numero iscrizione','','rb'));
          $fa->field(); 
     $f1 = new DB_decxdb('tit',$titolo);
          $tit = $f1->decxdb();          
     $fb = new input(array($tit,'titolo',25,'Titolo','','r'));            
          $fb->field();
     $f1 = new DB_decxdb('tit+',$titolo_plus);
          $titplus = $f1->decxdb();          
     $fc = new input(array($titplus,'titolo_plus',25,'Titolo +','','r'));             
          $fc->field();
     $fd = new input(array($cognome,'cognome',25,'Cognome','','r'));           
          $fd->field();
     $fe = new input(array($nome,'nome',25,'Nome','','r'));                    
          $fe->field();
     $ff = new input(array($indirizzo,'indirizzo',40,'Indirizzo','','r'));     
          $ff->field();
     $fg = new input(array($cap,'cap',25,'Cap','','r'));                       
          $fg->field();
     $fh = new input(array($localita,'localita',25,'Localit&agrave;','','r')); 
          $fh->field();
     $ft = new input(array($prov,'prov',25,'Provincia','','r'));               
          $ft->field();
     $fj = new input(array($telefono,'telefono',25,'Telefono','','r'));        
          $fj->field();
     $fk = new input(array($cellulare,'cellulare',25,'Cellulare','','r'));     
          $fk->field();
     $fv = new input(array($email,'email',40,'E-mail','','r'));                
          $fv->field();


     echo  "</fieldset>";
     echo "</div>";   // col     
 
// lato destro: Altri dati                                                           
     echo "<div class='col-md-6'>";
     echo "<fieldset><legend> Altri dati </legend>"; 
     $fl = new input(array($cod_fisc,'cod_fisc',25,'Codice fiscale','','r'));  
          $fl->field();
     $fm = new input(array($nascita_luogo,'nascita_luogo',25,'Luogo di nascita','','r'));  
          $fm->field();
     $fu = new input(array($prov_na,'prov_na',25,'Provincia di nascita','','r'));
          $fu->field(); 
     $fy = new input(array($nascita_nazione,'nascita_nazione',25,'Nazione di nascita','','r'));
          $fy->field();
     $fq = new input(array($nascita_data,'nascita_data',12,'Data di nascita','','r'));    
          $fq->field();
     $fq = new input(array($data_iscrizione,'data_iscrizione',12,'Data iscrizione','','r'));    
          $fq->field();
     $fs = new input(array($archiviare,'archiviare',2,'Coniuge','',r,));      
          $fs->field(); 
     $f1 = new DB_decxdb('prt',$stampa);
          $dec = $f1->decxdb();          
     $ft = new input(array($dec,'stampa',25,'Stampa','','r'));               
          $ft->field();
     $fu = new input(array($note,'note',33,'Note','','r'));                   
          $fu->field();

     echo  "</fieldset>";
     echo "</div>";   // col;
     echo "</div>";  // row; 
         
//  Incarichi e cariche
     echo     "<div class='row '>";
     echo     "<div class='col-md-6'>";
     echo "<fieldset><legend> Incarichi e cariche </legend>"; 
     $f1 = new DB_decxdb('tipo',$tipologia);
          $tplg = $f1->decxdb();          
     $f1 = new input(array($tplg,'tipologia',25,'Socio','','r'));                   
          $f1->field();
     $f1 = new DB_decxdb('car',$icons_dir);
          $cdir = $f1->decxdb();          
     $f2 = new input(array($cdir,'icons_dir',25,'Consiglio direttivo','','r'));     
          $f2->field();
     $f1 = new DB_decxdb('car',$icons_ese);
          $cese = $f1->decxdb();          
     $f3 = new input(array($cese,'icons_ese',25,'Comitato esecutivo','','r'));        
          $f3->field();
     echo  "</fieldset>";
     echo "</div>";   // col
     echo "</div>";  // row 
     echo "</div>"; // container
}
     echo  "</form>";
     }
      break; 
// aiuto =================================================================================           
      case 'aiuto':
          {
          $sql2 = "SELECT * 
                    FROM `".DB::$pref."art` 
                    WHERE atit='gest_isc' and astat <> 'A'
                    ORDER BY aprog";
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sql2) as $row)
               { 
               $text   = $row['atext'];    
               $mostra = $row['amostra'];   
               $tit    = $row['atit'];      
        
               if ($mostra == 1)  {echo "<h3>".$tit."</h3>"; }
               $a = new txt($text);
               $a->ingloba();              // elementi inglobati nel testo
              }
          }    
          break;
        
    default:
     echo "Operazione invalida";    
}
ob_end_flush();
?>
