<?php    session_start();      ob_start();   
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * Visualizza versamenti iscritti 
============================================================================= */
if (!function_exists('getBootHead')) 
{
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>"; 
}  
// uscita
include_once('post_ver.php');
$azione=$_POST['submit'];
switch ($azione)
{ 
case 'ritorno':
          $loc = "location:index.php?urla=widget.php&pag=";
          header($loc);                          
          break;
default :      
}
     // contenitore
     echo "<div class='container form-horizontal'>"; 
     echo "<div class='row container'>";

 //   bottoni gestione
$param = array('ritorno');
$btx   = new bottoni_str_par('Visualizza versamenti','ver','vid_ver.php',$param);     
     $btx->btn();

// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];    
     // contenitore

// zona messaggi
     include_once('msg.php');

// anagrafica    
          $sql="SELECT numero_iscrizione,cognome,nome FROM `".DB::$pref."isc` 
                WHERE stato = 'I'";
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
     foreach($PDO->query($sql) as $row)          
     {
     echo "<div class='col-md-8'>";
     echo  "<fieldset>";
        
     include('fields_isc.php'); 
     echo "<strong>N° ".$numero_iscrizione." : ".$cognome." ".$nome."</strong>";  
     echo "<hr class='slim'/>";   

// versamenti 
     $sqlv = "SELECT vdata,vimporto,vanno FROM `".DB::$pref."ver` 
              WHERE $numero_iscrizione = `vnume` ";
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
     foreach($PDO->query($sqlv) as $row)     
     {
     include 'fields_ver.php';
     $f3 = new fieldi($vdata,'vdata',10);        $f3->field_r();
     $n  = number_format($vimporto,2,',','');    // edit decimale
     $f4 = new fieldi($n,'vimporto',10);         $f4->field_r();
     $f6 = new fieldi($vanno,'vanno',6);         $f6->field_r();
     echo "<br />";
     }
     echo  "</fieldset>";                                                                 
     echo "</div>";   // col
  }
     echo "</div>";   // row
     echo "</div>";   // container
ob_end_flush();
?>
