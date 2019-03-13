<?php
// aggiunta campi a tbl_ver e tbl_vel
include('classi/DB.php');
$dbase = new DB('sito');    DB::config();   $dbase->openDB();

// + campo tabella ver
$sql = "ALTER TABLE `tbl_ver` ADD `vrife` VARCHAR(30) NOT NULL COMMENT 'Riferimento' ";
$result = mysql_query($sql);  
echo "<br>Campo aggiunto a: tbl_ver";

// + campo tabella vel
$sql = "ALTER TABLE `tbl_vel` ADD `erife` VARCHAR(30) NOT NULL COMMENT 'Riferimento' ";
$result = mysql_query($sql);  
echo "<br>Campo aggiunto a: tbl_vel";

?>