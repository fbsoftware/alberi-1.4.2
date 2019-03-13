<?php
include_once 'funzioni/utility.php';
$id                 =$row['id'];
$stato              =$row['stato'];
$numero             =$row['numero'];                        
$titolo             =$row['titolo'];
$titolo_plus        =$row['titolo_plus'];          
$RagioneSociale     =htmlspecialchars($row['RagioneSociale'],ENT_QUOTES);
$referente          =htmlspecialchars($row['referente'],ENT_QUOTES);
$indirizzo          =htmlspecialchars($row['indirizzo'],ENT_QUOTES);   
$cap                =$row['cap']; 
$localita           =htmlspecialchars($row['localita'],ENT_QUOTES);
$provincia          =$row['provincia'];            
$telefono           =$row['telefono'];
$data_inserimento   = flipData($row['data_inserimento']);
$stampa             =$row['stampa'];
$note               =htmlspecialchars($row['note'],ENT_QUOTES);
?>
