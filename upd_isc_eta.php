<?php session_start();      ob_start();   
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
     * stampa-visualizza età iscritti
============================================================================= */
echo "<!DOCTYPE html lang='it'>
     <html> ";   
 ?>
     <head>
 </head>
 
<?php

include_once('classi/DB.php');
include_once('classi/bottoni.php');
include_once('classi/field.php');

$azione   = $_POST['submit']; 
$gio      = $_POST['gio'];
$anz      = $_POST['anz'];

// mostra stringa bottoni o chiude
 switch ($azione)
     {
     case 'show':   { include'vid_isc_eta.php';
                  break; }
     case 'prt':   {  include'prt_isc_eta.php';
                  break;  }
     case 'uscita' :{ header('location:widget.php');         
                  break;      } 
     }

ob_end_flush();
?>
