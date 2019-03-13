<?php session_start();      ob_start();   
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * Visualizza versamenti elargitori 
============================================================================= */
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
     echo "</head>";   
     
// titolo 
$param = array('ritorno');
$btx   = new bottoni_str_par('Visualizza versamenti','vel','index.php?urla=widget.php&pag=',$param);     
     $btx->btn();
     
// anagrafica    
          $sql="SELECT numero,RagioneSociale FROM `".DB::$pref."ela` 
                WHERE stato = 'L'";
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
     foreach($PDO->query($sql) as $row)
          {
          // contenitore
     echo     "<div class='container form-horizontal'>"; 
     echo     "<div class='row container'>";
     echo     "<div class='col-md-8'>";
          echo  "<fieldset>";
          include('fields_ela.php'); 
          echo "<strong>N° ".$numero." : ".$RagioneSociale."</strong>"; 
          echo "<hr class='slim' />";
// versamenti 
          $sqlv = "SELECT edata,eimporto,enota FROM `".DB::$pref."vel` 
              WHERE $numero = `enume` ";
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
     foreach($PDO->query($sqlv) as $row)     
     {
     include 'fields_vel.php';
     $f3 = new fieldi($edata,'edata',10);        
          $f3->field_r();
     $f4 = new fieldi(number_format($eimporto,2,',',''),'eimporto',10);         
          $f4->field_r();
     $f5 = new fieldi($enota,'enota',50);        
          $f5->field_r();
     echo "<br />";
     }
     echo  "</fieldset>";                                                                 
echo "</div>";           // col
echo "</div>";           // row
echo "</div>";           // container
  }
ob_end_flush();
echo "</html>";
?>
