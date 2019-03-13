<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.3    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
   * ------------------------------------------------------------------------
   * gestione tabella 'xdb' sipologie codificate.      
============================================================================= */ 
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
     echo "</head>"; 
        
// variabili di configurazione 
$pref          = DB::$pref;               // prefisso tabelle
$site          = DB::$site;               // descrizione sito
$page_title    = DB::$page_title;         // titolo della pagina

     // contenitore
     echo     "<div class='container form-horizontal'>"; 
     echo     "<div class='row container'>";
 
 //   bottoni gestione
$param = array('nuovo','modifica','cancella','chiudi');
$btx   = new bottoni_str_par('Tipologie','xdb','upd_xdb.php',$param);     
     $btx->btn();

// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];
     
// zona messaggi
$msg = new msg($_SESSION['errore']);
     $msg->msg();
  
echo "<div class='col-md-6 fb-table-scroll'>";
echo "<table class='table table-hover table-striped table-bordered table-condensed'>"; 
echo "<thead class='well'>"; 
echo "<th>Sc</th>";
echo "<th>St</th>";
echo "<th>Prg</th>"; 
echo "<th>Tipo</th>"; 
echo "<th>Codice</th>"; 
echo "<th>Descrizione</th>";
echo "</thead>";
 // lettura database
     $sql = "SELECT * 
               FROM ".$pref."xdb     
               ORDER BY xtipo,xcod";
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
      foreach($PDO->query($sql) as $row)
          {   
          include('fields_xdb.php');
          echo "<tr>";
          echo "<td class='center'>";       
          $f0 = new fieldi($xid,'xid',2);           
               $f0->field_ck();  
          echo "</td>";
          echo "<td class='center'>";  
          $f1 = new fieldi($xstat,'xstat',2);       
               $f1->field_st();
          echo "</td>";
                    ?>
          <td><?php echo $xprog ?></td> 
          <td><?php echo $xtipo ?></td> 
          <td><?php echo $xcod ?></td> 
          <td><?php echo $xdes ?></td>      
          <?php
          echo "</tr>";
          }
          echo "</div>";
          echo "</table>";
          echo "</form>";
          echo "</div>";
          echo "</div>";
?> 
