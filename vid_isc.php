<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 3.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
   * ------------------------------------------------------------------------
   * visualizzazione sintetica iscritti
============================================================================= */
     // contenitore
     echo "<div class='container form-horizontal'>"; 
     echo "<div class='row'>";

//   bottoni gestione
$param = array('ritorno');
$btx   = new bottoni_str_par('Visualizza iscritti','isc','index.php?urla=widget.php&pag=',$param);     
     $btx->btn();
// zona messaggi
include_once 'msg.php';

// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];

// mostra la tabella
echo "<table><thead>";
echo "<th>"; $fa = new fieldt('Num',3);             $fa->field();  echo "</th>";
echo "<th>"; $fc = new fieldt('Cognome',15);        $fc->field();  echo "</th>";
echo "<th>"; $fd = new fieldt('Nome',15);           $fd->field();  echo "</th>";
echo "<th>"; $fe = new fieldt('Indirizzo',20);      $fe->field();  echo "</th>";
echo "<th>"; $fg = new fieldt('CAP',5);             $fg->field();  echo "</th>";
echo "<th>"; $ff = new fieldt('Localit&agrave;',20);$ff->field();  echo "</th>";
echo "<th>"; $fj = new fieldt('Telefono',10);       $fj->field();  echo "</th>";
echo "<th>"; $fk = new fieldt('Cellulare',10);      $fk->field();  echo "</th>";

// lettura dati
           $sql="SELECT * FROM `".DB::$pref."isc` 
                 WHERE stato = 'I'
                 ORDER BY cognome,nome ";
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sql) as $row)
{ 
     include('fields_isc.php');  
echo "<tr>";
echo "<td>"; $f1 = new fieldi($numero_iscrizione,'',3);   $f1->field_r(); echo "</td>";
echo "<td>"; $f3 = new fieldi($cognome,'',20);            $f3->field_r(); echo "</td>";
echo "<td>"; $f4 = new fieldi($nome,'',20);               $f4->field_r(); echo "</td>";
echo "<td>"; $f5 = new fieldi($indirizzo,'',20);          $f5->field_r(); echo "</td>";
echo "<td>"; $f6 = new fieldi($cap,'',5);                 $f6->field_r(); echo "</td>";
echo "<td>"; $f7 = new fieldi($localita,'',20);           $f7->field_r(); echo "</td>";
echo "<td>"; $f8 = new fieldi($telefono,'',10);           $f8->field_r(); echo "</td>";
echo "<td>"; $f9 = new fieldi($cellulare,'',10);          $f9->field_r(); echo "</td>";
} 
     echo "</table>";     
     echo "</div>";   // row
     echo "</div>";   // container

?> 