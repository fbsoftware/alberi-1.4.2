<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * gestione - INDIRIZZI
=============================================================================  */

?>
        <script type="text/javascript">
            $(function()
            {
                $( "#alfa" ).autocomplete(
                    {
                    source: "i_alfa.php",
                    select: function(event, ui)
                         {
                         $('#id').val(ui.item.id);
                         }
                    });
               $( "#nume" ).autocomplete(
                    {
                    source: "i_nume.php",
                    select: function(event, ui)
                         {
                         $('#id').val(ui.item.id);
                         }
                    });
          });
        </script>

<?php

 //   bottoni gestione
$param = array('mostra','nuovo','modifica','cancella','chiudi');
$btx   = new bottoni_str_par('Gestione indirizzi','ind','upd_ind.php',$param);     
     $btx->btn(); 
// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];     
//zona messaggi
     include_once('msg.php');

// autocomplete
?>
        <p>Per Cognome:
        <input type="text" id="alfa"  autofocus style="width:400px;">
         &nbsp; Per Numero:
        <input type="text" id="nume" style="width:400px;">
        <input type="hidden" name="id" id="id" />
        </p>


     <div id='elenco'>  </div>
    </div></form>
