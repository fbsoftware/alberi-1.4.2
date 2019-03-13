<?php session_start();      ob_start();   
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * Gestione versamenti iscritti - inserimento e ricerca
============================================================================= */
echo "<!DOCTYPE <html></head>";
echo "<link rel='stylesheet' type='text/css' href='css/style.css'>
     <link rel='stylesheet' href='http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css' />
     <script src='http://code.jquery.com/jquery-1.9.1.js'></script>
     <script src='http://code.jquery.com/ui/1.10.2/jquery-ui.js'></script> 
     <script src='js/date_picker_it.js'></script>";
echo "<head>";
include_once('classi/DB.php');
include_once('classi/bottoni.php');
include_once('classi/field.php');

$db2 = new DB('sito');   $db2->openDB(); 
// print_r($_POST);//debug
include_once('post_ver.php');
$azione   =$_POST['submit']; 
  
// verifica effettuata scelta 
if ($_POST['id'] <= 0)
   { 
   $_SESSION['esito'] = 4;
   header('location:gest_ver.php'); 
   }
   
// analisi scelte
switch ($azione)
{ 
// inserimento =====================================================================================
    case 'nuovo':
$param    = array( 'Versamenti <strong>ISCRITTI</strong> - inserimento','ver','write_ver.php','salva|nuovo','ritorno');  
$btx = new bt_param($param);     $btx->show_bottoni($param);

    {
// lato sinistro comune    
     echo "<div class='crea'>";
     echo  "<fieldset><legend> Anagrafica </legend>";
     include('post_isc.php');    
          $sql="SELECT * FROM `".DB::$pref."isc` 
                WHERE id = $id";
          $res2 = mysql_query($sql);
          if (!$res2) die('upd_ver/select:'.mysql_error());
          while($row = mysql_fetch_array($res2))  
          {
          include('fields_isc.php'); 
          $fa = new field($numero_iscrizione,'numero_iscrizione',5,'Elargitore N.');   
          $fa->field_rb();     
          $fd = new field($cognome,'cognome',33,'Cognome');                          
          $fd->field_r();
          $fe = new field($nome,'nome',33,'Nome');                          
          $fe->field_r(); 
          $ff = new field($note,'note',33,'Note');
          $ff->field_r();

          }
     echo  "</fieldset>";                                                                 
     echo "</div>"; 

// lato destro                                                           
     echo "<div class='crea_dx'>"; 
     echo  "<fieldset><legend> Versamenti </legend>";
     $f3 = new field($numero_iscrizione,'vnume',10,'Numero Iscritto');       $f3->field_h();
     $f4 = new field(date("d-m-Y"),'vdata',11,'Data');              $f4->field_d1();
//     $n  = number_format(20,2,',','');    // edit decimale
     $f5 = new field($n,'vimporto',10,'Importo');                   $f5->field_ir();
     $tb = new DB_tip_i('pag','vmezzo','','A mezzo');               $tb->select_r();
     $f9 = new field('','vrife',30,'Riferimento');                  $f9->field_i();
     $f2 = new field('','vassnum',30,'N.ro assegno');               $f2->field_i();
     $f6 = new field($vanno,'vanno',6,'Anno');                      $f6->field_r();
     echo  "</fieldset>";
     echo  "</div>";
     echo  "</form>";
      break;
     }      
// ricerca per: modifica-cancella  ================================================================   
    case 'cerca':

 //   bottoni gestione
$param  = array( 'Versamenti <strong>ISCRITTI</strong> - ricerca ','ver','upd2_ver.php','modifica','cancella','ritorno');  
$btx    = new bt_param($param);     $btx->show_bottoni($param);

// zona messaggi
include_once('msg.php');

    {
// lato sinistro comune    
     echo "<div class='crea'>";
     echo  "<fieldset><legend> Anagrafica </legend>";
     include('post_ela.php');    
          $sql="SELECT * FROM `".DB::$pref."isc` 
                WHERE id = $id";
          $res2 = mysql_query($sql);
          if (!$res2) {die('upd_ver/select:'.mysql_error());}
          while($row = mysql_fetch_array($res2))  
          {
          include('fields_isc.php'); 
          $fa = new field($numero_iscrizione,'numero_iscrizione',5,'Iscritto N.');   
          $fa->field_rb();     
          $fd = new field($cognome,'cognome',25,'Cognome');                          
          $fd->field_r(); 
          $fe = new field($nome,'nome',25,'Nome');                          
          $fe->field_r(); 

          }
     echo  "</fieldset>";                                                                 
     echo "</div>"; 


// versamenti
     echo "<div class='crea_dx'>"; 
     echo  "<fieldset><legend> Versamenti </legend>";
     $sqlv = "SELECT * FROM `".DB::$pref."ver`
              WHERE `vnume` = $numero_iscrizione
              ORDER BY `vdata` ";
     $modv = mysql_query($sqlv);
     while($row = mysql_fetch_array($modv))
     {
     include 'fields_ver.php';
    $f1 = new fieldi($vid,'vid',2);             $f1->field_ck();
    $f5 = new fieldi($vprog,'vprog',5);         $f5->field_r();
    $f3 = new fieldi($vdata,'vdata',10);        $f3->field_r();
    $n  = number_format($vimporto,2,',','');    // edit decimale
    $f4 = new fieldi($n,'vimporto',10);         $f4->field_r();
    $f6 = new fieldi($vanno,'vanno',6);         $f6->field_r();
    echo "<br />";
    }     
     echo  "</fieldset></div>";
     echo  "</form>";
     break;
    }

     case 'chiudi' :{ header('location:widget.php');         
                  break;      } 

    default:        echo "Operazione invalida";    
}
ob_end_flush();
echo "</html>";
?>
