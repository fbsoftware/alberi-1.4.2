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
echo "<!DOCTYPE html lang='en'>
     <html>
     <head>
     <link rel='stylesheet' type='text/css' href='css/style.css'>
     <link rel='stylesheet' href='http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css' />
     <script src='http://code.jquery.com/jquery-1.9.1.js'></script>
     <script src='http://code.jquery.com/ui/1.10.2/jquery-ui.js'></script>
     <script src='js/date_picker_it.js'></script>";

echo "<link rel='stylesheet' href='jquery/themes/base/jquery.ui.all.css'>
	<script src='jquery/jquery-1.9.1.js'></script>
	<script src='jquery/ui/jquery.ui.core.js'></script>
	<script src='jquery/ui/jquery.ui.widget.js'></script>
	<script src='jquery/ui/jquery.ui.accordion.js'></script>
	<script src='jquery/ui/jquery.ui.button.js'></script>
	<link rel='stylesheet' href='jquery/css/demos.css'> ";
 ?>
	<script>
	$(function() {
		var icons = {
			header: "ui-icon-circle-arrow-e",
			activeHeader: "ui-icon-circle-arrow-s"
		};
		$( "#accordion" ).accordion({
			icons: icons
		});
	});
	</script>
</head>"
<?php
include_once 'jquery_link.php';
include_once 'classiFB.php';
include_once('post_isc.php');

$db2      = new DB('sito');   DB::config();   $db2->openDB();
$tipo     = $_SESSION['pag'];
$azione   = $_POST['submit']; 

// mostra stringa bottoni o chiude
if ($tipo == 'I') 
{ switch ($azione)
     {
     case 'ins':   {$bti = new bottoni_str('Iscritti - inserimento','isc');     
                  $bti->bt_upd_ins();
                  break; }
     case 'mod':   { $btm = new bottoni_str('Iscritti - modifica','isc');     
                  $btm->bt_upd_mod();
                  break;  }
     case 'show' : { $bte = new bottoni_str('Iscritti - visualizzazione','isc');
                  $bte->bt_upd_show();
                  break;  }
     case 'arch' : { $btd = new bottoni_str('Iscritti - conferma archiviazione','isc');
                  $btd->bt_upd_arch();
                  break;  }
     case 'canc' : { $bte = new bottoni_str('Iscritti - conferma cancellazione','isc'); 
                  $bte->bt_upd_canc();
                  break;  }

     case 'chiudi' :{ header('location:widget.php');
                  break;      } 
     }
}
// idem per ARCHIVIATI
if ($tipo == 'A') 
{ switch ($azione)
     {
     case 'ins':   {$bti = new bottoni_str('Iscritti <strong>ARCHIVIATI</strong> - inserimento','isc');     
                  $bti->bt_upd_ins();
                  break; }
     case 'mod':   { $btm = new bottoni_str('Iscritti <strong>ARCHIVIATI</strong> - modifica','isc');     
                  $btm->bt_upd_mod();
                  break;  }
     case 'ripr' : { $btb = new bottoni_str('Iscritti - conferma ripristino','isc'); 
                  $btb->bt_upd_ripr();
                  break;  }
     case 'canc' : { $btc = new bottoni_str('Iscritti <strong>ARCHIVIATI</strong> - conferma cancellazione','isc'); 
                  $btc->bt_upd_canc();
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
    case 'ins':
    {
echo "<div id='accordion'> ";
// nagrafica
echo "<h3> Anagrafica </h3>";
     echo "<div>";
     echo  "<fieldset>";
     $fz = new field(NULL,'id',11,'ID');                       $fz->field_h();
     $ins = new DB_ins('isc','numero_iscrizione'); 
     $insmax = $ins->insert1();
     $fa = new field($insmax,'numero_iscrizione',5,'Numero iscrizione');$fa->field_rb();
// tipo iscritto non mostrato in quanto gestito dalle voci di menu specifiche
     $tb = new DB_tip_i('tit','titolo','A','Titolo');          $tb->select();
     $tc = new DB_tip_i('tit+','titolo_plus',' ','Segue titolo');   $tc->select();
     $fd = new field('','cognome',25,'Cognome');               $fd->field_ir();
     $fe = new field('','nome',25,'Nome');                     $fe->field_i();
     $ff = new field('','indirizzo',40,'Indirizzo');           $ff->field_i();
     $fg = new field('','cap',25,'Cap');                       $fg->field_i();
     $fh = new field('','localita',25,'Localit&agrave;');      $fh->field_i();
     $ft = new DB_tip_i('pr','prov',' ','Provincia');          $ft->select();
     echo  "</fieldset>";
     echo "</div>";
// Altri dati
echo "<h3> Altri dati </h3><div>";
    echo "<div class='crea'>";
     echo  "<fieldset>";
     $fl = new field('','cod_fisc',25,'Codice fiscale');         $fl->field_i();
     $fm = new field('','nascita_luogo',25,'Luogo di nascita');  $fm->field_i();
     $fu = new field('','prov_na',25,'Provincia di nascita');    $fu->field_i(); 
     $fo = new field('','nascita_data',12,'Data di nascita');    $fo->field_d1();
     $fq = new field('','data_iscrizione',12,'Data iscrizione'); $fq->field_d2();
     $fj = new field('','telefono',25,'Telefono');               $fj->field_i();     
     $fk = new field('','cellulare',25,'Cellulare');             $fk->field_i();     
     $fv = new field('','email',40,'E-mail');                    $fv->field_i();
     $fs = new field('','archiviare',2,'Da archiviare');         $fs->field_i(); 
     $ftx = new field('','stampa',2,'Stampa');                    $ftx->field_i();
     $fx = new fieldx($note,'note',33,3,'Note');                  $fx->fieldx();
//     echo  "<div><label for=note>Note</label>";
//     echo  "<textarea name='note' cols=33 rows=3>$note</textarea></div>";
     echo  "</fieldset></div></div>";

// Incarichi e cariche
     echo "<h3> Incarichi e cariche  </h3>";
     echo "<div class='crea'><fieldset>";
     DB::config();
     $t1 = new DB_tip_i('tipo','tipologia','1','Socio');               $t1->select();      
     $t2 = new DB_tip_i('car','icons_dir','','Consiglio direttivo');  $t2->select();     
     $t3 = new DB_tip_i('car','icons_ese','','Comitato esecutivo');     $t3->select();     
     echo  "</fieldset>";
     echo  "</div></div>";
     echo  "</form>";
     break;
     }
// modifica     
    case 'mod':
    {
    echo "<div id='accordion'> ";
     $sql = "SELECT * FROM `".DB::$pref."isc` 
             WHERE `id` = $id "; 
     $_mod = mysql_query($sql);
     $row = mysql_fetch_array($_mod);
     include('fields_isc.php');    
// Anagrafica
     echo "<h3> Anagrafica </h3>";
     echo "<div><fieldset>";
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
     $fx = new field($prov,'prov',25,'Provincia');               $fx->field_i();
     echo  "</fieldset></div>";
// versamenti
     echo "<h3> Versamenti </h3>";
     echo "<div><fieldset>";
      $fa = new fieldt('Data',10);           $fa->field(); 
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
    $f3 = new fieldi($vdata,'vdata',10);          $f3->field_r();
    $n  = number_format($vimporto,2,',','.');    // edit numerico 0.000,00
    $f3 = new fieldi($n,'vimporto',10);           $f3->field_r();
    $f3 = new fieldi($vanno,'vanno',4);           $f3->field_r(); 
    echo "<br />";
    }     
     echo  "</fieldset></div>";
// lato destro: Altri dati
     echo "<h3> Altri dati </h3>";
     echo "<div><fieldset>";
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
     $fs = new field($archiviare,'archiviare',2,'Da archiviare');   $fs->field_i();  
     $ft = new field($stampa,'stampa',2,'Stampa');                  $ft->field_i(); 
     $fx = new fieldx($note,'note',33,3,'Note');                    $fx->fieldx();    
     echo  "</fieldset></div>";
// Incarichi e cariche
     echo "<h3> Incarichi e cariche </h3>";
     echo "<div><fieldset>";
     $t1 = new DB_tip_i('tipo','tipologia',$tipologia,'Socio');               $t1->select();      
     $t2 = new DB_tip_i('car','icons_dir',$icons_dir,'Consiglio direttivo');  $t2->select();     
     $t3 = new DB_tip_i('car','icons_ese',$icons_ese,'Comitato esecutivo');     $t3->select();     
     echo  "</fieldset></div>";
     echo    "</div></form>";
     break;
    }

// cancellazione    
    case 'canc' :
// archiviazione    
    case 'arch' :
// ripristino    
    case 'ripr' :
// visualizzazione
    case 'show' :
    { 
     $sql = "SELECT * FROM `".DB::$pref."isc` 
             WHERE `id` = $id "; 
     $_can = mysql_query($sql);             
      $row = mysql_fetch_array($_can);
include('fields_isc.php');                           
// lato sinistro: Anagrafica     
     echo "<div class='crea'><fieldset><legend> Anagrafica </legend>";
     $fz = new field($id,'id',11,'ID');                          $fz->field_h();
     $fa = new field($numero_iscrizione,'numero_iscrizione',5,'Numero iscrizione');
                                                                      $fa->field_r(); 
     $fb = new field($titolo,'titolo',25,'Titolo');            $fb->field_r();
     $fc = new field($titolo_plus,'titolo_plus',25,'Titolo +');             $fc->field_r();
     $fd = new field($cognome,'cognome',25,'Cognome');           $fd->field_r();
     $fe = new field($nome,'nome',25,'Nome');                    $fe->field_r();
     $ff = new field($indirizzo,'indirizzo',40,'Indirizzo');     $ff->field_r();
     $fg = new field($cap,'cap',25,'Cap');                       $fg->field_r();
     $fh = new field($localita,'localita',25,'Localit&agrave;'); $fh->field_r();
     $ft = new field($prov,'prov',25,'Provincia');               $ft->field_r();
     echo  "</fieldset>";
//  Incarichi e cariche
     echo "<fieldset><legend> Incarichi e cariche </legend>"; 
     $f1 = new field($tipologia,'tipologia',25,'Socio');                   $f1->field_r(); 
     $f2 = new field($icons_dir,'icons_dir',25,'Consiglio direttivo');     $f2->field_r();
     $f3 = new field($icons_ese,'icons_ese',25,'Comitato esecutivo');        $f3->field_r();
     echo  "</fieldset></div>";
// lato destro: Altri dati                                                           
     echo "<div class='crea_dx'><fieldset><legend> Altri dati </legend>"; 
     $fl = new field($cod_fisc,'cod_fisc',25,'Codice fiscale');  $fl->field_r();
     $fm = new field($nascita_luogo,'nascita_luogo',25,'Luogo di nascita');  
                                                                 $fm->field_r();
     $fu = new field($prov_na,'prov_na',25,'Provincia di nascita');
                                                                 $fu->field_r(); 
     $fq = new field($nascita_data,'nascita_data',12,'Data di nascita');    
                                                                 $fq->field_r();
    
     $fq = new field($data_iscrizione,'data_iscrizione',12,'Data iscrizione');    
                                                                 $fq->field_r();
     $fj = new field($telefono,'telefono',25,'Telefono');        $fj->field_r();
     $fk = new field($cellulare,'cellulare',25,'Cellulare');     $fk->field_r();
     $fv = new field($email,'email',40,'E-mail');                $fv->field_r();
     $fs = new field($archiviare,'archiviare',2,'Da archiviare');         
     $ft = new field($stampa,'stampa',2,'Stampa');               $ft->field_r();
     $fu = new fieldx($note,'note',33,3,'Note');                   $fu->fieldx_r();
     echo  "</fieldset></div>";
     echo  "</form>";
      break;   
      } 


    default:
     echo "Operazione invalida";    
}
ob_end_flush();
?>