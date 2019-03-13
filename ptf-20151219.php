<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.2    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template. 
   * ------------------------------------------------------------------------
   * Indicizzazione tabelle database      
============================================================================= */  
include_once('classi/DB.php');
$db1      = new DB('sito');  $db1->openDB();  DB::config();
$tipo     = $_SESSION['pag'];
// cancello le viste prima di crearle
$query = "DROP INDEX  `".DB::$pref."isc_stato` ON `".DB::$pref."isc`";
$res = mysql_query($query) ;
$query = "DROP INDEX  `".DB::$pref."isc_cognome_nome` ON `".DB::$pref."isc`";
$res = mysql_query($query) ;
$query = "DROP INDEX  `".DB::$pref."isc_numero_iscrizione` ON `".DB::$pref."isc`";
$res = mysql_query($query) ;
// creazione
$query = "ALTER TABLE `".DB::$pref."isc` ADD INDEX `".DB::$pref."isc_stato` (stato)" ;
$res = mysql_query($query) or die(mysql_error());
$query = "ALTER TABLE `".DB::$pref."isc` ADD INDEX `".DB::$pref."isc_cognome_nome` (cognome,nome) ";
$res = mysql_query($query) or die(mysql_error());
$query = "ALTER TABLE `".DB::$pref."isc` ADD INDEX `".DB::$pref."isc_numero_iscrizione` (numero_iscrizione)" ;
$res = mysql_query($query) or die(mysql_error());
echo  "Costruite viste per ".DB::$pref."isc";
?>
