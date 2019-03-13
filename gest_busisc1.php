<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa busta singola - ISCRITTI (scelta iscritto)
=============================================================================  */
$tipo         = $_SESSION['pag']; 
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
     // contenitore
     echo     "<div class='container form-horizontal'>"; 
     echo     "<div class='row container'>";
     echo     "<div class='col-md-12'>";
     
 //   bottoni gestione
$param  = array('stampa','ritorno');    
$btx    = new bottoni_str_par_new('Buste iscritti','isc','prt_busisc1.php',$param);  
     $btx->btn();
     
// zona messaggi
include_once('msg.php'); 
 
// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];
// autocomplete
     echo     "<div class='row container'>";
if ($tipo == 'I') 
          { 
echo  "<fieldset><legend> Scelta dell'iscritto</legend>";
          }
elseif ($tipo == 'A') 
          { 
echo  "<fieldset><legend> Scelta dell'iscritto ARCHIVIATO</legend>";          
          } 
          
echo "<div class='col-md-6'>" ;          
$f1 = new input(array(NULL,'alfa',30,'Per Cognome:','Ordine alfabetico per cognome','ia'));     
     $f1->field();
     echo "</div>";           // col 

echo "<div class='col-md-6'>" ;
$f2 = new input(array(NULL,'nume',30,'Per Numero:','Ordine numerico','i'));     
     $f2->field();     
echo "</div>";              // col

echo "<div id='elenco'></div>"; 

$f3 = new input(array(NULL,'id',5,' ',' ','h'));     
     $f3->field();
echo "</fieldset >"; 
echo "</div>";           // row
echo "</form>";
echo "</div>";           // container
                   
?>