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
   * 1.4.1 uso di PDO e bootstrap
=============================================================================  */
$tipo   = $_REQUEST['pag']; 
?>        
        <script type="text/javascript">
            $(function()
            {
                $( "#alfa" ).autocomplete(
                    {
                    source: "alfa.php",
                    scroll: true,
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
 //   bottoni gestione
if ($tipo == 'I') 
          { 
          $param  = array('mostra','nuovo','modifica','cancella','archivia','aiuto','chiudi');    
          $btx    = new bottoni_str_par('Gestione iscritti','isc','upd_isc.php',$param);  
               $btx->btn();
          }
elseif ($tipo == 'A') 
          { 
          $param  = array('mostra','ripristina','aiuto','chiudi');    
          $btx    = new bottoni_str_par('Gestione archiviati','isc','upd_isc.php',$param);  
               $btx->btn();
          }
          
// zona messaggi
$msg = new msg($_SESSION['errore']);
     $msg->msg();
          
// memorizza location iniziale
$_SESSION['location'] = $_SERVER['QUERY_STRING'];    

// autocomplete  =========================================================================
echo  "<fieldset class='col-md-8'>";
echo "<div class='row'>";
echo "<div class='col-md-4'>" ;
$f1 = new input(array(NULL,'alfa',30,'Per Cognome:','Ordine alfabetico per cognome','ia'));     
     $f1->field();
     echo "</div>";           // col 

echo "<div class='col-md-4'>" ;
$f2 = new input(array(NULL,'nume',30,'Per Numero:','Ordine numerico','i'));     
     $f2->field();  
echo "<div id='elenco'></div>";     // div per elenco
echo "</div>";              // col
 
echo "</div>";           // row     
echo "</fieldset >"; 
?>      
        <input type="hidden" name="id" id="id" />
<?php
echo "</form>";    
?>