<?php  session_start();     ob_start();  
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 3.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================
   * Aggiunto "nhead" per gestire header per ogni voce menu (Max.9).
   * Gestito livello di accesso     
============================================================================*/ 
echo  "<link rel='stylesheet' type='text/css' href='css/style.css'>";	
require_once('loadLibraries.php');
require_once('loadTemplateSito.php');
require_once('lingua.php');
require_once('connectDB.php');  
include('post_nav.php');
$azione=$_POST['submit'];
      
// test scelta effettuata sul pgm chiamante
if (($azione == 'modifica' || $azione == 'cancella') && $nid == '') 
          {
          $_SESSION['esito'] = 4;
          header('location:gest_nav.php');
          }

// mostra stringa bottoni
switch ($azione)
{      case 'nuovo': 
       break; 
       
       case 'modifica':  
        $param  = array('Voci di menu - modifica','nav','write_nav.php','salva|modifica','ritorno');  
        $btx    = new bt_param($param);     $btx->show_bottoni($param);
       break; 
       
       case 'cancella' :
        $param  = array('Voci di menu - conferma cancellazione','nav','write_nav.php','cancella','ritorno');  
        $btx    = new bt_param($param);     $btx->show_bottoni($param);
       break;
       
       case 'chiudi' :
	  		$loc = "location:index.php?urla=widget.php&pag=";
          header($loc);                          
			  break;              
}
switch ($azione)
{
case '':
    header('location:gest_nav.php');
      break;
case 'nuovo':    // scelta tipo voce, prosegue su: upd2_nav.php
    { 
	$param  = array('salva|nuovo','ritorno');  
	$btx    = new bottoni_str_par('Tipo voce di menu','nav','upd2_nav.php',$param);     
		$btx->btn($param);
	echo  "<fieldset >";
	$tmod = new DB_tip_i('voce','ntipo','','Tipo voce','');     
		$tmod->select();
	echo  "</fieldset></form>";  
	break;
     }
     
case 'modifica':
{ 
    $sql = "SELECT * 
			 FROM `".DB::$pref."nav` 
			 WHERE `nid` = $nid ";
foreach($PDO->query($sql) as $row)
	{
      include('fields_nav.php');          
      echo  "<div class='crea'><fieldset >";
      $f0  = new field($nid,'nid',1,'ID record');                   
		$f0->field_h();
      $f1  = new field($nprog,'nprog',3,'Progressivo');             
		$f1->field_i();
      $ts  = new DB_tip_i('stato','nstat',$nstat,'Stato record','');   
		$ts->select();
      $mnu = new DB_sel_l('mnu','bprog',$nmenu,'bmenu',
                          'nmenu','bstat','bmenu','Menu','');  
		$mnu->select_label();
      $f2 = new field($nli,'nli',20,'Voce');                        
		$f2->field_i();
      $f4 = new field($ndesc,'ndesc',20,'Sottovoce');               
		$f4->field_i();      
      $f3 = new field($ntesto,'ntesto',25,'Descrizione');           
		$f3->field_i();
      $tv = new field($ntipo,'ntipo',10,'Tipo voce');               
		$tv->field_r();
switch ($ntipo)
{      
case 'arg':
       {$t = new DB_sel_l('arg','rdesc',$nsotvo,'rcod','nsotvo','rstat','rdesc','Argomento','');
       echo $t->select_label()."<br >"; break;
       } 
case 'cap':
       {$t = new DB_sel_l('cap','cdesc',$nsotvo,'ccod','nsotvo','cstat','cdesc','Capitolo','');
       echo $t->select_label()."<br >"; break;
       } 
case 'art':
       {$t = new DB_sel_l('art','atit',$nsotvo,'atit','nsotvo','astat','atit','Articolo','');
       echo $t->select_label()."<br >"; break;
       } 
case 'lnk':
       {$ty = new field($nsotvo,'nsotvo',30,'Link interno');    echo $ty->field_i(); break;
       } 
case 'ifr':
       {
       $tw = new select_root($nsotvo,'nsotvo','Html/php pers.');
       $tw->select_dir(); 
       echo    "<br />";      break;        
       } 
case 'htm':
       {$tx = new field($nsotvo,'nsotvo',30,'Pagina HTML custom');    echo $tx->field_i(); break;
       } 
case 'url':
       {$tz = new field($nsotvo,'nsotvo',30,'Link esterno');    echo $tz->field_i(); break;
       } 

}
      $tg = new DB_tip_i('trg','ntarget',$ntarget,'Target','');        $tg->select(); 
      $f6 = new field($nselect,'nselect',1,'Voce corrente (*)');    $f6->field_i(); 
      $f7 = new field($ntitle,'ntitle',1,'(1)Titoli, (0)dettaglio');$f7->field_i();
      $f8 = new field($nhead,'nhead',1,'(1)Header specifico');      $f8->field_i();
      $fa = new field($npag,'npag',1,'Parametro');                  $fa->field_i();
      $tz = new field($naccesso,'naccesso',1,'Livello accesso');    $tz->field_i();
	}
 
 echo  "</fieldset></div>"; 
      
      echo  "<div class='crea_dx'><fieldset >";
      echo  "<label for=ntitle>Titolo pagina</label>";
      echo  "<textarea name='ntitle' cols=33 rows=3>$ntitle</textarea>";
      echo  "</fieldset></div></form>";          
      break;
}    
       
case 'cancella':
    {
    $_nav = mysql_query("SELECT * 
                         FROM `".DB::$pref."nav` 
                         WHERE `nid` = $nid ");
    $row = mysql_fetch_array($_nav);
    include('fields_nav.php');         
      echo  "<div class='crea'><fieldset >";
      
$f0 = new field($nid,'nid',1,'ID record');                     $f0->field_h();
$f1 = new field($nprog,'nprog',3,'Progressivo');               $f1->field_r();
$ts = new field($nstat,'nstat',1,'Stato record');              $ts->field_r();
$tm = new field($nmenu,'nmenut',20,'Menu');                    $tm->field_r();
$f2 = new field($nli,'nli',20,'Voce');                         $f2->field_r();
$f4 = new field($ndesc,'ndesc',20,'Sottovoce');                $f4->field_r();
$f3 = new field($ntesto,'ntesto',25,'Descrizione');            $f3->field_r();
$tv = new field($ntipo,'ntipo',10,'Tipo voce');                $tv->field_r();
$f8 = new field($nsotvo,'nsotvo',10,'Comando');                $f8->field_r();
$f5 = new field($ntarget,'ntarget',20,'Target');               $f5->field_r();
$f6 = new field($nselect,'nselect',1,'Voce corrente (*)');     $f6->field_r();
$f7 = new field($ntitle,'ntitle',1,'(1)Titoli, (0)dettaglio'); $f7->field_r();
$f9 = new field($nhead,'nhead',1,'(1)Header specifico');       $f9->field_r();
$fk = new field($npag,'npag',1,'Parametro');                   $fk->field_r();
$tz = new field($naccesso,'naccesso',1,'Livello accesso');     $tz->field_r();
      echo  "</fieldset></div>";
       
      echo  "<div class='crea_dx'><fieldset >";
      echo  "<label for=ntitle>Titolo pagina</label>";
      echo  "<textarea name='ntitle' cols=33 rows=3 readonly>$ntitle</textarea>";
      echo  "</fieldset></div></form>";          
      break;
  
     }
} 
ob_end_flush();  
?> 
