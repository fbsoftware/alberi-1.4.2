<?php
// aggiunta campi a tbl_ver e tbl_vel
include('classi/DB.php');
$dbase = new DB('sito');    DB::config();   $dbase->openDB();
echo "<br><h1>MODIFICHE AL DATABASE</h1>";
// + campo tabella ver
$sql = "ALTER TABLE `tbl_ver` ADD `vassnum` VARCHAR(30) NOT NULL COMMENT 'Numero rif.'";
$result = mysql_query($sql);  
echo "<br>Campo aggiunto a: tbl_ver";
// + campo tabella vel
$sql = "ALTER TABLE `tbl_vel` ADD `eassnum` VARCHAR(30) NOT NULL COMMENT 'Numero rif.'";
$result = mysql_query($sql);
echo "<br>Campo aggiunto a: tbl_vel";
?>