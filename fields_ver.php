<?php
$vid      =$row['vid'];
$vstat    =$row['vstat'];
$vnume    =$row['vnume'];                        
$vimporto =$row['vimporto'];
// ---
$dat = new data($row['vdata']);
$vdata = $dat->flipdata();
// ---
$vanno    =$row['vanno'];
$vprog    =$row['vprog']; 
$vmezzo   =$row['vmezzo'];
$vrife    =$row['vrife'];
$vassnum  =$row['vassnum'];
?>
