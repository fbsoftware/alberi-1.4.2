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
echo "<!DOCTYPE html>";
echo "<link rel='stylesheet' type='text/css' href='css/style.css'>";
echo "<link rel='stylesheet' href='http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css' />
     <script src='http://code.jquery.com/jquery-1.9.1.js'></script>
     <script src='http://code.jquery.com/ui/1.10.2/jquery-ui.js'></script>
<script src='js/date_picker_it.js'></script>"; 
include_once('classi/DB.php');
include_once('classi/bottoni.php');
include_once('classi/field.php');

include_once('post_ind.php');

$db2      = new DB('sito');   $db2->config();   $db2->openDB(); 
$azione   = $_POST['submit'];

// mostra stringa bottoni o chiude
    switch ($azione)
     {
     case 'ins':   {$bti = new bottoni_str('<strong>INDIRIZZI</strong> - inserimento','ind');     
                  $bti->bt_upd_ins();
                  break; }
     case 'mod':   { $btm = new bottoni_str('<strong>INDIRIZZI</strong> - modifica','ind');     
                  $btm->bt_upd_mod();
                  break;  }
     case 'canc' : { $btc = new bottoni_str('<strong>INDIRIZZI</strong> - conferma cancellazione','ind'); 
                  $btc->bt_upd_canc();
                  break;  }
     case 'show' : { $btc = new bottoni_str('<strong>INDIRIZZI</strong> - visualizzazione','ind'); 
                  $btc->bt_vid();
                  break;  }
     case 'chiudi' :{ header('location:widget.php');         
                  break;      } 
     }

switch ($azione)
{ // controllo
    case '':
    {
    header('location:gest_ind.php');
    break; }
// inserimento 
    case 'ins':
    {
     echo "<div class='crea'>";
     echo  "<fieldset><legend> Anagrafica INDIRIZZI </legend>";
     $fz = new field(NULL,'id',11,'ID');                            $fz->field_h();
     $ins = new DB_ins('ind','numero');                             
     $insmax = $ins->insert1();
     $fa = new field($insmax,'numero',5,'Numero esterno');          $fa->field_rb();
     $ts = new DB_tip_i('stato','stato','','Stato record');         $ts->select_a();
     $tb = new DB_tip_i('tit','titolo',' ','Titolo');               $tb->select();
     $tc = new DB_tip_i('tit+','titolo_plus',' ','Segue titolo');   $tc->select();
     $fd = new field('','RagioneSociale',40,'R.Sociale/Cognome');   $fd->field_ir();
     $fe = new field('','referente',40,'Referente');                $fe->field_i();
     $ff = new field('','indirizzo',40,'Indirizzo');                $ff->field_i();
     $fg = new field('','cap',25,'Cap');                            $fg->field_i();
     $fh = new field('','localita',25,'Localit&agrave;');           $fh->field_i();
     $ft = new field('','provincia',25,'Provincia');                $ft->field_i();
     $fj = new field('','telefono',25,'Telefono');                  $fj->field_i();
     $fq = new field('','data_inserimento',12,'Data inserimento');  $fq->field_d1();                    
     $tv = new DB_tip_i('ind','stampa',' ','Categoria');            $tv->select();     
     echo  "<div><label for=note>Note</label>";
     echo  "<textarea name='note' cols=33 rows=3></textarea></div>";
     echo  "</fieldset></div>";                                                                 
     echo    "</form>";
      break;
     }
// modifica     
    case 'mod':
    {
     $sql = "SELECT * FROM `".DB::$pref."ind` 
             WHERE `id` = $id "; 
     $_mod = mysql_query($sql);
     $row = mysql_fetch_array($_mod);
     include('fields_ind.php');    
     echo "<div class='crea'>";
     echo  "<fieldset><legend> Anagrafica INDIRIZZI </legend>";
     $fz = new field($id,'id',11,'ID');                            $fz->field_h();
     $fa = new field($numero,'numero',5,'Numero esterno');        $fa->field_rb();
     $ts = new DB_tip_i('stato','stato',$stato,'Stato record');        $ts->select_a();
     $tb = new DB_tip_i('tit','titolo',$titolo,'Titolo');               $tb->select();
     $tc = new DB_tip_i('tit+','titolo_plus',$titolo_plus,'Segue titolo');   $tc->select();
     $fd = new field($RagioneSociale,'RagioneSociale',40,'R.Sociale/Cognome');  $fd->field_ir();
     $fe = new field($referente,'referente',40,'Referente');  $fe->field_i();
     $ff = new field($indirizzo,'indirizzo',40,'Indirizzo');                $ff->field_i();
     $fg = new field($cap,'cap',25,'Cap');                            $fg->field_i();
     $fh = new field($localita,'localita',25,'Localit&agrave;');           $fh->field_i();
     $ft = new field($provincia,'provincia',25,'Provincia');                $ft->field_i();
     $fj = new field($telefono,'telefono',25,'Telefono');                  $fj->field_i();
     $fq = new field($data_inserimento,'data_inserimento',12,'Data inserimento');  $fq->field_d1();
     $tv = new DB_tip_i('ind','stampa',$stampa,'Categoria');           $tv->select();
     echo  "<div><label for=ntitle>Note</label>";
     echo  "<textarea name='note' cols=33 rows=3>$note</textarea></div>";
     echo  "</fieldset>";                                                                 
     echo "</div>"; 


     echo  "</fieldset></div>";
     echo    "</form>";
     break;
    }
// cancellazione    
    case 'canc' :
    case 'show' :
    { 
     $sql = "SELECT * FROM `".DB::$pref."ind` 
             WHERE `id` = $id "; 
     $_mod = mysql_query($sql);
     $row = mysql_fetch_array($_mod);
     include('fields_ela.php');    
     echo "<div class='crea'>";
     echo  "<fieldset><legend> Anagrafica INDIRIZZI </legend>";
     $fz = new field($id,'id',11,'ID');                             $fz->field_h();
     $fa = new field($numero,'numero',5,'Numero esterno');          $fa->field_rb();
     $ts = new field($stato,'stato',15,'Stato record');             $ts->field_r();
     $tb = new field($titolo,'titolo',15,'Titolo');                 $tb->field_r();
     $tc = new field($titolo_plus,'titolo_plus',15,'Segue titolo'); $tc->field_r();
     $fd = new field($RagioneSociale,'RagioneSociale',40,'R.Sociale/Cognome');  $fd->field_r();
     $fe = new field($referente,'referente',40,'Referente');          $fe->field_r();
     $ff = new field($indirizzo,'indirizzo',40,'Indirizzo');        $ff->field_r();
     $fg = new field($cap,'cap',25,'Cap');                          $fg->field_r();
     $fh = new field($localita,'localita',25,'Localit&agrave;');    $fh->field_r();
     $ft = new field($provincia,'provincia',25,'Provincia');        $ft->field_r();
     $fj = new field($telefono,'telefono',25,'Telefono');           $fj->field_r();
     $fq = new field($data_inserimento,'data_inserimento',12,'Data inserimento');  $fq->field_r();
     $ft = new field($stampa,'stampa',2,'Categoria');                  $ft->field_r();
     echo  "<div><label for=ntitle>Note</label>";
     echo  "<textarea name='note' cols=33 rows=3 readonly>$note</textarea></div>";
     echo  "</fieldset>";                                                                 
     echo "</div>"; 


     echo    "</form>";
     break;
      } 
    default:
     echo "Operazione invalida";    
}
ob_end_flush();
?>
