<?php
/** adeguamento delle date
 * NB. Vale solo per stampa (NON per visualizzazione)
 * corregge il problema delle vocali accentate.
--------------------------------------------- */
$id            =$row['id'];
$stato         =$row['stato'];
$numero_iscrizione    =$row['numero_iscrizione'];                        
$titolo        =$row['titolo'];
$titolo_plus   =$row['titolo_plus'];          
$cognome       =$row['cognome'];
     $cognome  = utf8_decode($cognome);
$nome          =$row['nome'];
     $nome     = utf8_decode($nome);
$indirizzo     =$row['indirizzo'];
     $indirizzo= utf8_decode($indirizzo);
$cap           =$row['cap']; 
$localita      =strtoupper($row['localita']);
     $localita = utf8_decode($localita);
$prov          =$row['prov'];            
$telefono      =$row['telefono'];
$cellulare     =$row['cellulare'];
$cod_fisc      =$row['cod_fisc'];
     $nascita_luogo     = utf8_decode($nascita_luogo);
$nascita_luogo =strtoupper($row['nascita_luogo']);      
$prov_na       =$row['prov_na'];                  
$nascita_nazione    =$row['nascita_nazione'];
$dat = new data($row['nascita_data']);
$nascita_data = $dat->flipdata();
$dat = new data($row['data_iscrizione']);
$data_iscrizione = $dat->flipdata();
$tipologia     =$row['tipologia'];
$icons_ese     =$row['icons_ese'];
$icons_dir     =$row['icons_dir'];
$icons_garan   =$row['icons_garan'];
$stampa        =$row['stampa'];
$archiviare    =$row['archiviare'];
$email         =$row['email'];
$note          =$row['note'];               
?>
