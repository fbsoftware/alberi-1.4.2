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
   * 1.4.1 uso di PDO
=============================================================================  */
include_once('classi/DB.php');
include_once('classi/bottoni.php');
include_once('classi/field.php');

$db1      = new DB('sito');  $db1->openDB();              
$tipo           = $_SESSION['pag']; 
$tipo= $_SESSION['pag'];
?>
<!DOCTYPE html>
<head>
     <link rel='stylesheet'  type='text/css'  href='css/style.css'>
     <link rel="stylesheet"  type="text/css"  href="css/jquery-ui-1.8.20.custom.css" />
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.20.custom.min.js"></script>
        <script type="text/javascript">
            $(function()
            {
                $( "#alfa" ).autocomplete(
                    {
                    source: "alfa.php",
                    select: function(event, ui)
                         {
                         $('#id').val(ui.item.id);
                         }
                    });
               $( "#nume" ).autocomplete(
                    {
                    source: "nume.php",
                    select: function(event, ui)
                         {
                         $('#id').val(ui.item.id);
                         }
                    });

          });
        </script>

</head>

<?php

 //   bottoni gestione
if ($tipo == 'I') 
          { $param    = array( 'Gestione iscritti','isc','upd_isc.php','mostra','nuovo','modifica','cancella','archivia','aiuto','chiudi');  
           $btx = new bt_param($param);     $btx->show_bottoni($param);
          }
elseif ($tipo == 'A') 
          { $param    = array( 'Gestione ARCHIVIATI','isc','upd_isc.php','mostra','ripristina','aiuto','chiudi');  
           $bty = new bt_param($param);     $bty->show_bottoni($param);
          }
// zona messaggi
     include_once('msg.php');

// autocomplete
?>
        <p>Per Cognome:
        <input type="text" id="alfa" autofocus>
         &nbsp; Per Numero:
        <input type="text" id="nume">
        <input type="hidden" name="id" id="id" />
        </p>

     <div id='elenco'>  </div>
    </div></form>
