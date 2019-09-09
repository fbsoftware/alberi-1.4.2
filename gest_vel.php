<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Gestione versamenti elargitori
=============================================================================  */
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>";   
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
<?php
 //   bottoni gestione
$param  = array('nuovo','cerca','chiudi');    
$btx    = new bottoni_str_par('Versamenti elargitori','vel','upd_vel.php',$param);  
     $btx->btn();


// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];

// zona messaggi
include_once('msg.php');

 // autocomplete elargitori
//echo "<div class='container well'>";
 
echo "<div class='row col-md-10'>"; 
echo "<fieldset>";
echo "<div class='col-md-5'>" ;
$f1 = new input(array(NULL,'alfa',20,'Elargitore:','Ordine alfabetico per Rag.Sociale / cognome','ia'));     
     $f1->field(); 
echo "</div>"; 
     
echo "<div class='col-md-5'>" ;
$f2 = new input(array(NULL,'nume',20,'Numero elargitore:','Ordine numerico','i'));     
     $f2->field();     
echo "</div>"; 

echo "<div id='elenco'></div>";
//$f3 = new input(array(NULL,'id',5,' ',' ','h'));     
 //    $f3->field();
echo "<input type='hidden' name='id' id='id'>"; 
echo "</form>";
echo "</fieldset>";
echo "</div>";       // row  
        
//echo "</div>";       // container  
?>