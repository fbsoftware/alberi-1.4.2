<?php
// adeguamento delle date
// ---------------------------------------------
$vid                =$_POST['vid']; 
$vstat              =$_POST['vstat'];
$vnume              =$_POST['vnume'];  
// ---
$dat = new data($_POST['vdata']);
$vdata = $dat->flipdata();
// ---
$vimporto           =number_format($_POST['vimporto'],2,'.','');
$vanno              =$_POST['vanno'];
$vprog              =$_POST['vprog'];
$vmezzo             =$_POST['vmezzo'];
$vrife              =$_POST['vrife'];
$vassnum            =$_POST['vassnum'];
?>
