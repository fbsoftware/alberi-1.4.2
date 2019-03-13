<?php session_start();      ob_start();   
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * gestione tabella 'isc' per archiviati
   * 17.04.2013 - Datepicker 
============================================================================= */
echo "<!DOCTYPE html lang='it'>
     <html> ";   
?>
     <head>
  <link rel='stylesheet' href='http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css' />
      <script src='http://code.jquery.com/jquery-1.9.1.js'></script>
      <script src='http://code.jquery.com/ui/1.10.2/jquery-ui.js'></script>
     <script src='js/date_picker_it.js'></script>  
     <link rel='stylesheet'  type='text/css'  href='css/style.css'>
     <link rel="stylesheet"  type="text/css"  href="css/jquery-ui-1.8.20.custom.css" />
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.20.custom.min.js"></script> 
        <script type="text/javascript">
            $(function()
            {
                $( 'button.big[value=ins]' ).click(
                      {
                      $('input.req').attr('required');
                      });
            });
         </script>

 </head>
 
<?php
echo "<script src='js/FBbase.js'></script> ";
include_once('classi/DB.php');
include_once('classi/bottoni.php');
include_once('classi/field.php');

include_once('post_isc.php');

$db2      = new DB('sito');   $db2->openDB();
$tipo     = $_SESSION['pag'];
$azione   = $_POST['submit'];   //print_r($_POST);//debug

// test scelta id (Escluso 'nuovo')
if (
     (($id <= 0 )  ||  ($id == '')  || ($id == NULL ))
     && ($azione <> 'nuovo' && $azione <> 'aiuto')
     )
   { 
   $_SESSION['esito'] = 4;
 header('location:gest_isc.php');                           
   }

// mostra stringa bottoni o chiude
if ($tipo == 'I') 
{ switch ($azione)
     {
     case 'nuovo':    { $param = array('NUOVO Iscritto','isc','write_isc.php','salva|nuovo','ritorno');  
                         $btx = new bt_param($param);     $btx->show_bottoni($param);
                         break;  }
     case 'mostra': { $param = array('Iscritti - visualizza','isc','write_isc.php','ritorno');  
                         $btx = new bt_param($param);     $btx->show_bottoni($param);
                         break;  }
     case 'modifica': { $param = array('Iscritti - modifica','isc','write_isc.php','salva|modifica','ritorno');  
                         $btx = new bt_param($param);     $btx->show_bottoni($param);
                         break;  }
    case 'archivia' : { $param = array('Iscritti - conferma archiviazione','isc','write_isc.php','archivia','ritorno'); 
                         $btx = new bt_param($param);     $btx->show_bottoni($param);
                         break;  }
     case 'cancella' : { $param = array('Iscritti - conferma cancellazione','isc','write_isc.php','cancella','ritorno'); 
                         $btx = new bt_param($param);     $btx->show_bottoni($param);
                         break;  }
     case 'aiuto' : {    $param = array('Gestione Iscritti - aiuto','isc','upd_isc.php','ritorno'); 
                         $btx = new bt_param($param);     $btx->show_bottoni($param);
                         break;  }
     case 'chiudi' :     {header('location:widget.php');         
                         break;      } 
     }
}

// idem per ARCHIVIATI
if ($tipo == 'A') 
{ switch ($azione)
     {
     case 'mostra': { $param = array('Iscritti <strong>ARCHIVIATI</strong>- visualizza','isc','write_isc.php','ritorno');  
                      $btx = new bt_param($param);     $btx->show_bottoni($param);
                      break;  }
    case 'ripristina' : { $param = array('Iscritti - RIPRISTINO','isc','write_isc.php','ripristina','ritorno'); 
                         $btx = new bt_param($param);     $btx->show_bottoni($param);
                         break;  }

     case 'chiudi' :{ header('location:widget.php');         
                  break;      } 
     }
}

switch ($azione)
{ // controllo
    case '':
    {
    header('location:gest_isc.php');
    break; }
// inserimento 
    case 'nuovo':
    {
// lato sinistro     
     echo "<div class='crea'>";
     echo  "<fieldset><legend> Anagrafica </legend>";
     $fz = new field(NULL,'id',11,'ID');                       $fz->field_h();
     $ins = new DB_ins('isc','numero_iscrizione'); 
     $insmax = $ins->insert1();
     $fa = new field($insmax,'numero_iscrizione',5,'Numero iscrizione');$fa->field_rb();
// tipo iscritto non mostrato in quanto gestito dalle voci di menu specifiche
     $tb = new DB_tip_i('tit','titolo','A','Titolo');          $tb->select();
     $tc = new DB_tip_i('tit+','titolo_plus',' ','Segue titolo');   $tc->select();
     $fd = new field(' ','cognome',25,'Cognome');               $fd->field_ir();
     $fe = new field('','nome',25,'Nome');                     $fe->field_i();
     $ff = new field('','indirizzo',40,'Indirizzo');           $ff->field_i();
     $fg = new field('','cap',25,'Cap');                       $fg->field_i();
     $fh = new field('','localita',25,'Localit&agrave;');      $fh->field_i();
     $ft = new DB_tip_i('pr','prov',' ','Provincia');          $ft->select();

     echo  "</fieldset>"; 
     echo "</div>"; 
// lato destro                                                           
     echo "<div class='crea_dx'>"; 
     echo  "<fieldset><legend> Altri dati </legend>"; 
     $fl = new field('','cod_fisc',25,'Codice fiscale');         $fl->field_i();
     $fm = new field('','nascita_luogo',25,'Luogo di nascita');  $fm->field_i();
     $fu = new field('','prov_na',25,'Provincia di nascita');    $fu->field_i(); 
     $fy = new field('Italia','nascita_nazione',25,'Nazione di nascita');
          $fy->field_i();
     $fo = new field('','nascita_data',12,'Data di nascita');    $fo->field_d1();
     $fq = new field('','data_iscrizione',12,'Data iscrizione'); $fq->field_d2();
     $fj = new field('','telefono',25,'Telefono');               $fj->field_i();     
     $fk = new field('','cellulare',25,'Cellulare');             $fk->field_i();     
     $fv = new field('','email',40,'E-mail');                    $fv->field_i();
     $fs = new field('','archiviare',2,'Coniuge');               $fs->field_i(); 
//     $ftx = new field('','stampa',2,'Stampa');                    $ftx->field_i();
$db2      = new DB('sito');   $db2->openDB();
     $fty = new DB_tip_i('prt','stampa',0,'Stampa');          $fty->select();
     $fx = new fieldx($note,'note',33,3,'Note');                  $fx->fieldx();
//     echo  "<div><label for=note>Note</label>";
//     echo  "<textarea name='note' cols=33 rows=3>$note</textarea></div>";
     echo  "</fieldset>";
// Incarichi e cariche
     echo "<fieldset><legend> Incarichi e cariche </legend>"; 
     DB::config();
     $t1 = new DB_tip_i('tipo','tipologia','1','Socio');               $t1->select();      
     $t2 = new DB_tip_i('car','icons_dir','','Consiglio direttivo');  $t2->select();     
     $t3 = new DB_tip_i('car','icons_ese','','Comitato esecutivo');     $t3->select();     
     echo  "</fieldset>";
     echo  "</div>";
     echo  "</form>";
      break;
     }
// modifica     
    case 'modifica':
    {
     $sql = "SELECT * FROM `".DB::$pref."isc` 
             WHERE `id` = $id "; 
     $_mod = mysql_query($sql);
     $row = mysql_fetch_array($_mod);
     include('fields_isc.php');    
// lato sinistro: Anagrafica     
     echo "<div class='crea'><fieldset><legend> Anagrafica </legend>";
     $fz = new field($id,'id',11,'ID');                          $fz->field_h();
     $fa = new field($numero_iscrizione,'numero_iscrizione',5,'Numero iscrizione');
                                                                      $fa->field_rb(); 
     $tb = new DB_tip_i('tit','titolo',$titolo,'Titolo');      $tb->select();
     $tc = new DB_tip_i('tit+','titolo_plus',$titolo_plus,'Segue titolo');  $tc->select();
     $fd = new field($cognome,'cognome',25,'Cognome');           $fd->field_ir();
     $fe = new field($nome,'nome',25,'Nome');                    $fe->field_i();
     $ff = new field($indirizzo,'indirizzo',40,'Indirizzo');     $ff->field_i();
     $fg = new field($cap,'cap',25,'Cap');                       $fg->field_i();
     $fh = new field($localita,'localita',25,'Localit&agrave;'); $fh->field_i();
  //   $fx = new field($prov,'prov',25,'Provincia');               $fx->field_i();
     $ft = new DB_tip_i('pr','prov',$prov,'Provincia');          $ft->select();
     echo  "</fieldset>"; 
// versamenti
     echo "<fieldset><legend> Versamenti </legend>"; 
      $fa = new fieldt('Data',12);           $fa->field();
      $fb = new fieldt('Importo',10);        $fb->field();
      $fc = new fieldt('anno',4);            $fc->field();
     echo "<br />";
          
     $sqlv = "SELECT * FROM `".DB::$pref."ver` 
              WHERE `vnume` = $numero_iscrizione 
              ORDER BY vanno,vdata"; 
     $modv = mysql_query($sqlv);
while($row = mysql_fetch_array($modv))
     {
    include 'fields_ver.php';
    $f3 = new fieldi($vdata,'vdata',12);          $f3->field_r();
    $n  = number_format($vimporto,2,',','.');    // edit numerico 0.000,00
    $f3 = new fieldi($n,'vimporto',10);           $f3->field_r();
    $f3 = new fieldi($vanno,'vanno',4);           $f3->field_r(); 
    echo "<br />";
    }     
     echo  "</fieldset></div>";
// lato destro: Altri dati                                                           
     echo "<div class='crea_dx'><fieldset><legend> Altri dati </legend>"; 
     $fl = new field($cod_fisc,'cod_fisc',25,'Codice fiscale');  $fl->field_i();
     $fm = new field($nascita_luogo,'nascita_luogo',25,'Luogo di nascita');  
                                                                 $fm->field_i();
     $fu = new field($prov_na,'prov_na',25,'Provincia di nascita');
                                                                 $fu->field_i(); 
     $fy = new field($nascita_nazione,'nascita_nazione',25,'Nazione di nascita');
                                                                 $fy->field_i();
     $fo = new field($nascita_data,'nascita_data',12,'Data di nascita'); 
                                                                 $fo->field_d1();
     $fq = new field($data_iscrizione,'data_iscrizione',12,'Data iscrizione');    
                                                                 $fq->field_d2();
     $fj = new field($telefono,'telefono',25,'Telefono');           $fj->field_i();
     $fk = new field($cellulare,'cellulare',25,'Cellulare');        $fk->field_i();
     $fv = new field($email,'email',40,'E-mail');                   $fv->field_i();
     $fs = new field($archiviare,'archiviare',2,'Coniuge');   $fs->field_i();  
//     $ft = new field($stampa,'stampa',2,'Stampa');                  $ft->field_i(); 
     $fty = new DB_tip_i('prt','stampa',$stampa,'Stampa');          $fty->select();
     $fx = new fieldx($note,'note',33,3,'Note');                    $fx->fieldx();    
//     echo  "<div><label for=note>Note</label>";
//     echo  "<textarea name='note' cols=33 rows=3>$note</textarea></div>";
     echo  "</fieldset>";
// Incarichi e cariche
     echo "<fieldset><legend> Incarichi e cariche </legend>"; 
$db3      = new DB('sito');   $db3->openDB();
     $t1 = new DB_tip_i('tipo','tipologia',$tipologia,'Socio');                 $t1->select();      
     $t2 = new DB_tip_i('car','icons_dir',$icons_dir,'Consiglio direttivo');    $t2->select();     
     $t3 = new DB_tip_i('car','icons_ese',$icons_ese,'Comitato esecutivo');     $t3->select();     
     echo  "</fieldset></div>";
     echo    "</form>";
     break;
    }
// cancellazione    
    case 'cancella' :
// archiviazione    
    case 'archivia' :
// ripristino    
    case 'ripristina' :
// ripristino    
    case 'mostra' :
    { 
     $sql = "SELECT * FROM `".DB::$pref."isc` 
             WHERE `id` = $id "; 
     $_can = mysql_query($sql);             
      $row = mysql_fetch_array($_can);
include('fields_isc.php');                           
// lato sinistro: Anagrafica     
     echo "<div class='crea'><fieldset><legend> Anagrafica </legend>";
     $fz = new field($id,'id',11,'ID');                          
          $fz->field_h();
     $fa = new field($numero_iscrizione,'numero_iscrizione',5,'Numero iscrizione');
          $fa->field_r(); 
          
     $f1 = new DB_decod2('xdb','xstat','xtipo','xcod','tit',$titolo,'xdes');
          $tit = $f1->decod2();          
     $fb = new field($tit,'titolo',25,'Titolo');            
          $fb->field_r();
          
     $f1 = new DB_decod2('xdb','xstat','xtipo','xcod','tit+',$titolo_plus,'xdes');
          $titplus = $f1->decod2();          
     $fc = new field($titplus,'titolo_plus',25,'Titolo +');             
          $fc->field_r();
          
     $fd = new field($cognome,'cognome',25,'Cognome');           
          $fd->field_r();
     $fe = new field($nome,'nome',25,'Nome');                    
          $fe->field_r();
     $ff = new field($indirizzo,'indirizzo',40,'Indirizzo');     
          $ff->field_r();
     $fg = new field($cap,'cap',25,'Cap');                       
          $fg->field_r();
     $fh = new field($localita,'localita',25,'Localit&agrave;'); 
          $fh->field_r();
     $ft = new field($prov,'prov',25,'Provincia');               
          $ft->field_r();
     echo  "</fieldset>";
//  Incarichi e cariche
     echo "<fieldset><legend> Incarichi e cariche </legend>"; 
     $f1 = new DB_decod2('xdb','xstat','xtipo','xcod','tipo',$tipologia,'xdes');
          $tplg = $f1->decod2();          
     $f1 = new field($tplg,'tipologia',25,'Socio');                   
          $f1->field_r();
     $f1 = new DB_decod2('xdb','xstat','xtipo','xcod','car',$icons_dir,'xdes');
          $cdir = $f1->decod2();          
     $f2 = new field($cdir,'icons_dir',25,'Consiglio direttivo');     
          $f2->field_r();
     $f1 = new DB_decod2('xdb','xstat','xtipo','xcod','car',$icons_ese,'xdes');
          $cese = $f1->decod2();          
     $f3 = new field($cese,'icons_ese',25,'Comitato esecutivo');        
          $f3->field_r();
     echo  "</fieldset></div>";
// lato destro: Altri dati                                                           
     echo "<div class='crea_dx'><fieldset><legend> Altri dati </legend>"; 
     $fl = new field($cod_fisc,'cod_fisc',25,'Codice fiscale');  $fl->field_r();
     $fm = new field($nascita_luogo,'nascita_luogo',25,'Luogo di nascita');  
                                                                 $fm->field_r();
     $fu = new field($prov_na,'prov_na',25,'Provincia di nascita');
                                                                 $fu->field_r(); 
     $fy = new field($nascita_nazione,'nascita_nazione',25,'Nazione di nascita');
                                                                 $fy->field_r();
     $fq = new field($nascita_data,'nascita_data',12,'Data di nascita');    
                                                                 $fq->field_r();
    
     $fq = new field($data_iscrizione,'data_iscrizione',12,'Data iscrizione');    
                                                                 $fq->field_r();
     $fj = new field($telefono,'telefono',25,'Telefono');        $fj->field_r();
     $fk = new field($cellulare,'cellulare',25,'Cellulare');     $fk->field_r();
     $fv = new field($email,'email',40,'E-mail');                $fv->field_r();
     $fs = new field($archiviare,'archiviare',2,'Coniuge');      $fs->field_r(); 
     $f1 = new DB_decod2('xdb','xstat','xtipo','xcod','prt',$stampa,'xdes');
          $dec = $f1->decod2();          
     $ft = new field($dec,'stampa',25,'Stampa');               
          $ft->field_r();
     $fu = new fieldx($note,'note',33,3,'Note');                   $fu->fieldx_r();
 //    echo  "<div><label for=note>Note</label>";
 //    echo  "<textarea name='note' cols=33 rows=3 readonly>$note</textarea></div>";
     echo  "</fieldset></div>";
     echo  "</form>";
     }
      break; 
           
      case 'aiuto':
      {
      include_once('classi/FB.class.php');
                     $sql2 = "SELECT * 
               FROM `".DB::$pref."art` 
               WHERE atit='gest_isc' and astat <> 'A'
               ORDER BY aprog";
      $result = mysql_query($sql2);
      if (mysql_num_rows($result))
          {
          while($row = mysql_fetch_array($result))
               { 
               $text   = $row['atext'];    
               $mostra = $row['amostra'];   
               $tit    = $row['atit'];      
        
               if ($mostra == 1)  {echo "<h3>".$tit."</h3>"; }
               $a = new txt($text);
               $a->ingloba();              // elementi inglobati nel testo

          //     echo $text;
               }
          } 
     }    
                  break;
        
    default:
     echo "Operazione invalida";    
}
ob_end_flush();
?>
