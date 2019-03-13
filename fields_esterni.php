<?php
// adeguamento delle date
include_once('classi/data.php'); 
// ---------------------------------------------

$numero             =$row['ID'];                        
$titolo             =$row['titolo'];
$titolo_plus        =$row['titolo_plus'];          
$RagioneSociale     =$row['RagioneSociale'];
$indirizzo          =$row['indirizzo'];   $indirizzo = stripcslashes ($indirizzo);  
$cap                =$row['cap']; 
$localita           =$row['localita'];
$provincia          =$row['provincia'];            
$telefono           =$row['telefono'];
$dat = new data($row['data_inserimento']);
$data_inserimento   = $dat->flipdata();
$stampa             =$row['stampa'];
$note               =$row['note'];
?>
