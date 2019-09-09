<?php
// aggiunto: ecausale (15/3/18)
$eid      =$row['eid'];
$estat    =$row['estat'];
$enume    =$row['enume'];                        
$eimporto =$row['eimporto'];
$dat = new data($row['edata']);
$edata = $dat->flipdata();
$enota    =stripcslashes ($row['enota']);
$eprog    =$row['eprog']; 
$emezzo   =$row['emezzo']; 
$erife    =$row['erife'];
$eassnum  =$row['eassnum'];
$evento   =$row['evento'];
$ecausale =$row['ecausale'];
?>
