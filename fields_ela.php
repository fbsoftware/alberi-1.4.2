<?php
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
$dat = new data($row['data_inserimento']);
$data_inserimento = $dat->flipdata();
$stampa             =$row['stampa'];
$note               =htmlspecialchars($row['note'],ENT_QUOTES);
$tipo               =$row['tipo'];
$categoria          =$row['categoria'];
?>
