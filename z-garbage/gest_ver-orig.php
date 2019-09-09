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
include_once('classi/DB.php');
include_once('classi/bottoni.php');
include_once('classi/field.php');
include_once('classi/FB.class.php');

$db1 = new DB('sito');  $db1->openDB(); 
$tipo         = $_SESSION['pag'];            
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
$param  = array( 'Gestione versamenti iscritti','ver','upd_ver.php','nuovo','cerca','chiudi');  
$btx    = new bt_param($param);     $btx->show_bottoni($param);

// zona messaggi
include_once('msg.php');

// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];

// mostra anno di default
$anno = date('Y');  // anno di default
$fd = new field($anno,'vanno',4,'Anno di riferimento');     
     $fd->field_ir();

 // autocomplete
?>
        <p>Per Cognome:
        <input type="text" id="alfa" autofocus >
         &nbsp; Per Numero:
        <input type="text" id="nume" >

       </p>
     <div id='elenco'>  </div>
    
     <input type="hidden" name="id" id="id" />    
     </div></form>
 
