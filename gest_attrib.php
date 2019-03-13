<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa attestato
=============================================================================  */
?>
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
$param = array('stampa','ritorno');
$btx   = new bottoni_str_par_new('Attribuzione nuovo iscritto','isc','prt_attrib.php',$param);     
     $btx->btn();

// zona messaggi
include_once('msg.php');
// autocomplete
echo "<fieldset class='well col-md-8'>";
echo "<div class='row'>";
echo "<div class='col-md-4'>" ;
?>
Per Cognome:
<input type="text" id="alfa" autofocus >
</div>        
<?php        
echo "<div class='col-md-4'>" ;
?>      
Per Numero:  
<input type="text" id="nume" >
<div id='elenco'></div>
      
<?php
echo "</div>";   // col 
echo "</div>";   // row
echo "</fieldset>";   
?>   
     <input type="hidden" name="id" id="id" />
    	</form>

