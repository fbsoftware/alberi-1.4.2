<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 3.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= */ 
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once("connectDB.php");

 //   toolbar
	$param  = array('nuovo','modifica','cancella','chiudi');    
	$btx    = new bottoni_str_par('Menu','mnu','upd_mnu.php',$param);  
		$btx->btn();
// zona messaggi
include_once('msg.php');
 
//   testata
echo "<div class='container fb-table-scroll'>";     
echo "<table class='table table-hover table-striped table-bordered table-condensed'>"; 
echo "<thead class='well'>"; 
echo "<th>Scelta</th>";
echo "<th>Stato</th>"; 
echo "<th>Prog</th>"; 
echo "<th>Nome</th>";
echo "<th>Tipo</th>";
echo "<th>Descrizione</th>";
echo "<th>SEL</th>";
echo "</thead>";   

      $sql = "SELECT * FROM ".DB::$pref."mnu ORDER BY bprog";
	foreach($PDO->query($sql) as $row)

      {       
      include('fields_mnu.php');
     echo "<tr>";
  $f1 = new fieldi(bnid,'nid',2);            
  echo "<td>"; $f1->field_ck(); echo "</td>";
  $st = new fieldi($bstat,'nstat',2);        
  echo "<td>"; $st->field_st(); echo "</td>";
  ?>
	<td><?php echo $bprog ?></td>
	<td><?php echo $bmenu ?></td>
	<td><?php echo $btipo ?></td>
	<td><?php echo $btesto ?></td>
	<td><?php echo $bselect ?></td>
<?php
     }
  echo "</form></fieldset></div>";
?> 
