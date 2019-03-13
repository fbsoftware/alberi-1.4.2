<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Gestione versamenti soci
=============================================================================  */
echo "<!DOCTYPE <html>";
echo "<link rel='stylesheet' type='text/css' href='css/style.css'>";

include_once('classi/DB.php');
include_once('classi/bottoni.php');
include_once('classi/field.php');

$db1 = new DB('sito');  $db1->openDB();  DB::config();
            
$tipo         = $_SESSION['pag'];
$ses_elenco   = $_SESSION['ses_elenco']; 
$ses_start    = $_SESSION['ses_start']; 

 //  filtro il tipo di visualizzazione
include_once('classi/filtro.php');
$filt = new filtro($sel_elenco,$sel_start,'gest_ver');
$filt->filtra();

 //   bottoni gestione
$btx = new bottoni_str('Gestione versamenti iscritti','ver');     
$btx->bt_ins_cerca();    //$btx->bt_gest();

// zona messaggi
include_once('msg.php');

// mostra anno di default
$anno = date('Y');  // anno di default
$fd = new field($anno,'vanno',4,'Anno di riferimento');     $fd->field_ir();

// visualizzazione filtrata
include_once('elenco.php');
                      
echo "</html>";                 
?> 