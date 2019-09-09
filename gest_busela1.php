<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa busta singola - ELARGITORI (scelta elargitore)
=============================================================================  */
?>
       <script type="text/javascript">
            $(function()
            {
                $( "#alfa" ).autocomplete(
                    {
                    source: "e_alfa.php",
                    select: function(event, ui)
                         {
                         $('#id').val(ui.item.id);
                         }
                    });
               $( "#nume" ).autocomplete(
                    {
                    source: "e_nume.php",
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
$param = array('stampa','ritorno');
$btx   = new bottoni_str_par_new('Busta singola','ela','prt_busela1.php',$param);     
     $btx->btn();

// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];
     
// zona messaggi
include_once('msg.php');  
?>

        <p>Per Cognome/Rag.Soc.:
        <input type="text" id="alfa" autofocus >
         &nbsp; Per Numero:
        <input type="text" id="nume" >
        <input type="hidden" name="id" id="id" />
        </p>


     <div id='elenco'>  </div>
    </div></form>
