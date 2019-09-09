<?php session_start();    ob_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 3.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
   * ------------------------------------------------------------------------
   * Inserimento in base al tipo voce  
============================================================================= */ 
echo  "<link rel='stylesheet' type='text/css' href='css/style.css'>";

include_once 'classiFB.php';
$dbase = new DB('sito');  $dbase->openDB();
include('post_nav.php');

$azione=$_POST['submit'];
  
// mostra stringa bottoni
switch ($azione)
{    
case 'uscita':
     {
     header('location:gest_nav.php');   break;     
     } 
      
case 'ins': 
     {
       $bti = new bottoni_str('Voci di menu - inserimento','nav');     
       $bti->bt_upd_ins();  

echo  "<div class='crea'><fieldset >";
      $nav = new DB_ins('nav','nprog');   $num = $nav->insert();
      $f1 = new field($num,'nprog',3,'Progressivo');       $f1->field_i();
      $ts    = new DB_tip_i('stato','nstat','','Stato record'); $ts->select();
      $men = new DB_sel_l('mnu','bprog','','bmenu','nmenu','bstat','bmenu','Menu');
             $men->select_label();
      $f2 = new field('','nli',20,'Voce');                      $f2->field_ir();
      $f4 = new field('','ndesc',20,'Sottovoce');             $f4->field_i();
      $f3 = new field('','ntesto',25,'Descrizione');                  $f3->field_i();      
      $tv = new field($ntipo,'ntipo',20,'Tipo voce');           $tv->field_r(); 
switch ($ntipo)
{      
case 'arg':
       {$t = new DB_sel_l('arg','rdesc','','rcod','nsotvo','rstat','rdesc','Argomento');
       echo $t->select_label()  ; break;
       } 
case 'cap':
       {$t = new DB_sel_l('cap','cdesc','','ccod','nsotvo','cstat','cdesc','Capitolo');
       echo $t->select_label()  ; break;
       } 
case 'art':
       {$t = new DB_sel_l('art','atit','','atit','nsotvo','astat','atit','Articolo');
       echo $t->select_label()  ; break;
       } 
case 'lnk':
       {$ty = new field($nsotvo,'nsotvo',30,'Link interno');    echo $ty->field_i(); break;
       } 
case 'ifr':
       {
       $tw = new select_root($nsotvo,'nsotvo','Html/php pers.');
       echo $tw->select_dir();
       break;
       } 
}       
      $f5 = new field('','ntarget',20,'Target');                    $f5->field_i();
      $f6 = new field('','nselect',1,'Voce corrente (1)');          $f6->field_i();
      $f7 = new field('','ntitle',1,'(1)Titoli, (0)dettaglio');     $f7->field_i();
      $f9 = new field('','nhead',1,'(1)Header specifico');          $f9->field_i();
      $fa = new field('','npag',1,'Parametro');                     $fa->field_i();           
     echo  "</fieldset></div>";

      echo  "<div class='crea_dx'><fieldset >";
      echo  "<label for=ntitle>Titolo pagina</label>";
      echo  "<textarea name='ntitle' cols=33 rows=3 >$ntitle</textarea>";
      echo  "</fieldset></div></form>";          
      break;
}
} 
ob_end_flush();
?> 
