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
   * Uso di DB_PDO e bootstrap
   * anno di default da tabella xdb-anno elemento ver
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
<?php
if (!function_exists('getBootHead')) 
{
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>"; 
}  
 //   bottoni gestione
$param  = array('nuovo','cerca','chiudi');    
$btx    = new bottoni_str_par('Versamenti iscritti','ver','upd_ver.php',$param);  
     $btx->btn();

// zona messaggi
include_once('msg.php');

// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];

 // autocomplete
echo  "<fieldset class='well'>"; 
echo "<div class='col-md-4'>" ;
$x1 = new DB_decod('xdb','anno','xstat','xcod','ver','xdes');
    $anno = $x1->decod(); 
$fd = new input(array($anno,'vanno',4,'Anno','Anno di riferimento','i'));     
     $fd->field(); 
echo "</div>"; 
          
echo "<div class='col-md-4'>" ;
$f1 = new input(array(NULL,'alfa',30,'Per Cognome:','Ordine alfabetico per cognome','ia'));     
     $f1->field(); 
echo "</div>"; 
     
echo "<div class='col-md-4'>" ;
$f2 = new input(array(NULL,'nume',30,'Per Numero:','Ordine numerico','i'));     
     $f2->field();     
echo "</div>"; 
     
echo "</fieldset >"; 

echo "<div id='elenco'></div>";
$f3 = new input(array(NULL,'id',5,' ',' ','h'));     
     $f3->field();
echo "</div>";       // row
echo "</form>";
?>