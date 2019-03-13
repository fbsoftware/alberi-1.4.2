<?php
// adeguamento delle date
// ---------------------------------------------
$id                 =$_POST['id'];
$stato              =$_POST['stato'];
$numero             =$_POST['numero'];                        
$titolo             =$_POST['titolo'];
$titolo_plus        =$_POST['titolo_plus'];          
$RagioneSociale     =addslashes(trim($_POST['RagioneSociale']));    
$referente          =addslashes($_POST['referente']);
$indirizzo          =addslashes($_POST['indirizzo']);        
$cap                =$_POST['cap']; 
$localita           =addslashes($_POST['localita']);            
$provincia          =$_POST['provincia'];            
$telefono           =$_POST['telefono'];
$dat = new data($_POST['data_inserimento']);
$data_inserimento   = $dat->flipdata();
$stampa             =$_POST['stampa'];
$note               =addslashes($_POST['note']);
$tipo               =$_POST['tipo'];
$categoria          =$_POST['categoria'];
?>
