<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * gestione - ISCRITTI ed ARCHIVIATI
   * 1.3  scelta sul cognome anche parziale   
=============================================================================  */
echo "<!DOCTYPE html>";
echo  "<link rel='stylesheet' type='text/css' href='css/style.css'>";
include_once 'classiFB.php';

$db1          = new DB('sito');  $db1->openDB();  DB::config();
$tipo         = $_SESSION['pag'];
$ses_elenco   = $_SESSION['ses_elenco'];
$ses_start    = $_SESSION['ses_start'];

 //  filtro il tipo di visualizzazione
$filt = new filtro($ses_elenco,$ses_start,'gest_isc');
$filt->filtra();

 //   bottoni gestione
if ($tipo == 'I') 
          {$btx = new bottoni_str('Gestione iscritti','isc');
               $btx->bt_gest_aj();}
if ($tipo == 'A') 
          {$btx = new bottoni_str('Gestione iscritti <strong>ARCHIVIATI</strong>','isc'); 
               $btx->bt_gest_r();}
// zona messaggi
include_once('msg.php');  

// visualizzazione filtrata
include_once('elenco.php');
?>