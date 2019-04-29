<?php
/** Trasformazione vimporto da decomal a float */
include('classi/DB.php');
$dbase = new DB('sito');    DB::config();   $dbase->openDB();
echo "<br><h1>MODIFICHE AL DATABASE</h1>";

$sql = "ALTER TABLE `tbl_ver` CHANGE `vimporto` `vimporto` FLOAT(14,2) NULL DEFAULT \'20.00\'";
$result = mysql_query($sql);  
echo "<br>Modifica tabella TBL_VER eseguita.";
?>