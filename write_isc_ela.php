<?php session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * inserimento iscritto da elargitore     
============================================================================= */
echo "<!DOCTYPE html>";
include('classi/DB.php');

$dbase = new DB('sito');   $dbase->openDB();
include('post_ela.php'); 
$azione  =$_POST['submit'];
//print_r($_POST);   //debug

switch ($azione)
{
case 'nuovo':  $stato=$_SESSION['pag']; 
           mysql_query("INSERT INTO `".DB::$pref."isc` 
                                (id,numero_iscrizione,titolo,titolo_plus,cognome,
                               nome,indirizzo,cap,localita,telefono,
                               cellulare,cod_fisc,nascita_luogo,
                               nascita_nazione,nascita_data,data_iscrizione,
                               tipologia,stampa,archiviare,prov,prov_na,email,  
                               stato,note,icons_dir,icons_ese)
                               VALUES (NULL,'$numero_iscrizione','$titolo','$titolo_plus','$cognome',
                               '$nome','$indirizzo','$cap','$localita','$telefono',
                               '$cellulare','$cod_fisc','$nascita_luogo',
                               '$nascita_nazione','$nascita_data','$data_iscrizione',
                               '$tipologia','$stampa','$archiviare','$prov','$prov_na','$email',
                               'I','$note','$icons_dir','$icons_ese')");
                                $_SESSION['esito'] = 54;
                                break;


default:
                         $_SESSION['esito'] = 2;
} 
header('location:gest_isc.php'); 
?>
