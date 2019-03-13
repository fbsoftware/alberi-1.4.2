<?php session_start();      ob_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.4    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= */

?>
<!DOCTYPE html>
<html>
<head>
<title>update tmp</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="css/style.css" type="text/css" >
<script src="js/jscolor.js"></script>
</head>
  <body>
<?php   
include_once('classi/DB.php');
$db2 = new DB('sito');  $db2->openDB(); 
include_once('classi/bottoni.php');  
include_once('classi/field.php');
include('post_tmp.php');
$azione   =$_POST['submit'];  

// test scelta effettuata sul pgm chiamante
if ($azione != 'nuovo'  && $tid == '')
     {
     $_SESSION['esito'] = 4;
     header('location:gest_tmp.php');
     }

// mostra stringa bottoni o chiude
switch ($azione)
{
case 'nuovo':
    $param  = array('Templates - inserimento','tmp','write_tmp.php','salva|nuovo','ritorno');  
    $btx    = new bt_param($param);     $btx->show_bottoni($param);
      break;
case 'modifica':  
    $param  = array('Templates - modifica','tmp','write_tmp.php','salva|modifica','ritorno');  
    $btx    = new bt_param($param);     $btx->show_bottoni($param);
      break; 
case 'cancella' :
    $param  = array('Templates - conferma cancellazione','tmp','write_tmp.php','cancella','ritorno');  
    $btx    = new bt_param($param);     $btx->show_bottoni($param);
      break;  
case 'chiudi' :
      header('location:widget.php');   
     break;      
}

switch ($azione)
{
    case 'nuovo':
    { 
      $tmp = new DB_ins('tmp','tprog');  
      $num = $tmp->insert();    
    echo  "<fieldset class='gest'>";
$f1 = new field($num,'tprog',2,'Progressivo');   $f1->field_i();
$ts = new DB_tip_i('stato','tstat',1,'Stato record'); $ts->select();
$f2 = new field('','tsel',1,'*=Attivato');            $f2->field_i();
$f3 = new field('','ttipo',1,'Tipo menu');        $f3->field_ir();
$f4 = new field('','ttdesc',50,'Menu top');           $f4->field_ir();
$f5 = new field('','tfolder',50,'Percorso template'); $f5->field_ir();
$f6 = new field('','tdesc',50,'Descrizione');         $f6->field_ir();
$t1 = new DB_tip_i('pos','tcol1','','Posizione 1');   $t1->select();
$t2 = new DB_tip_i('pos','tcol2','','Posizione 2');   $t2->select();
$t3 = new DB_tip_i('pos','tcol3','','Posizione 3');   $t3->select();
$tm = new DB_tip_i('pos','tmenu','','Posizione Menu top');   $tm->select();
$fb = new field('ffffff','tcolscu',6,'Colore scuro bordo');  $fb->field_ic();
$fc = new field('000000','tcolchi',6,'Colore chiaro bordo'); $fc->field_ic();
echo    "</fieldset></form>";
        break;
     }
     
    case 'modifica':
{   // record in modifica 
$_mod = mysql_query("SELECT * FROM `".DB::$pref."tmp` where `tid` = $tid ");
$row = mysql_fetch_array($_mod);
include_once('fields_tmp.php');
echo  "<fieldset class='gest'>"; 
      $f0 = new field($tid,'tid',1,'');                 $f0->field_h(); 
      $f1 = new field($tprog,'tprog',2,'Progressivo');  $f1->field_i(); 
      $ts = new DB_tip_i('stato','tstat',$tstat,'Stato record');  $ts->select();
      $f2 = new field($tsel,'tsel',1,'*=selezionato');         $f2->field_i(); 
      $f3 = new field($ttipo,'ttipo',1,'Tipo menu');       $f3->field_ir();   
      $f4 = new field($ttdesc,'ttdesc',50,'Menu principale');    $f4->field_ir();  
      $f5 = new field($tfolder,'tfolder',50,'Percorso cartella template');  $f5->field_ir(); 
      $f6 = new field($tdesc,'tdesc',50,'Descrizione');      $f6->field_ir(); 
      $t1 = new DB_tip_i('pos','tcol1',$tcol1,'Colonna 1');  $t1->select(); 
      $t2 = new DB_tip_i('pos','tcol2',$tcol2,'Colonna 2');  $t2->select(); 
      $t3 = new DB_tip_i('pos','tcol3',$tcol3,'Colonna 3');  $t3->select();
      $tm = new DB_tip_i('pos','tmenu',$tmenu,'Posizione menu principale');  $tm->select();        
      $fb = new field($tcolscu,'tcolscu',6,'Colore scuro bordo');   $fb->field_ic();  
      $fc = new field($tcolchi,'tcolchi',6,'Colore chiaro bordo');  $fc->field_ic();  
echo    "</fieldset></form>";
break;
    }
    
    case 'cancella' :
    {
$_mod = mysql_query("SELECT * FROM `".DB::$pref."tmp` where `tid` = $tid ");
$row = mysql_fetch_array($_mod);
include_once('fields_tmp.php');
//echo "<br >"; 
echo  "<fieldset class='gest'>";
      $f0 = new field($tid,'tid',1,'');                 $f0->field_h();
      $f1 = new field($tprog,'tprog',2,'Progressivo');       $f1->field_r();  
      $fs = new field($tstat,'tstat',1,'Stato record');       $fs->field_r(); 
      $f2 = new field($tsel,'tsel',1,'*=selezionato');         $f2->field_r();  
      $f3 = new field($ttipo,'ttipo',1,'Tipo menu');       $f3->field_r();  
      $f4 = new field($ttdesc,'ttdesc',50,'Menu principale');    $f4->field_r();  
      $f5 = new field($tfolder,'tfolder',50,'Percorso cartella template');  $f5->field_r();  
      $f6 = new field($tdesc,'tdesc',50,'Descrizione');      $f6->field_r(); 
      $f7 = new field($tcol1,'tcol1',20,'Colonna 1');      $f7->field_r();  
      $f8 = new field($tcol2,'tcol2',20,'Colonna 2');      $f8->field_r();  
      $f9 = new field($tcol3,'tcol3',20,'Colonna 3');      $f9->field_r();  
      $f0 = new field($tmenu,'tmenu',20,'Posizione menu principale');      $f0->field_r();  
      $fb = new field($tcolscu,'tcolscu',6,'Colore scuro bordo');    $fb->field_r();  
      $fc = new field($tcolchi,'tcolchi',6,'Colore chiaro bordo');   $fc->field_r(); 
echo  "</fieldset></form>";
    break;
    } 
    
}
ob_end_flush();
?>

</body>
</html>
