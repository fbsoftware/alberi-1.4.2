<!DOCTYPE html> 
<?php	session_start();
require_once("include_gest.php");
$a = new Head("Prova Jquery");  
	$a->openHead();
$b = new Jquery();  
	$b->getJquery();
$b = new bootstrap();  
	$b->getBootstrap();	
$c = new Editor();  
	$c->getEditor();
	$a->closeHead();
	

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
                    scroll: true,					
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
$msg = new msg($_SESSION['esito']);
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
