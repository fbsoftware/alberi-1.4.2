<?php
// aggiunta campi a tbl_ela
include('classi/DB.php');
$dbase = new DB('sito');    DB::config();   $dbase->openDB();
echo "<br><h1>MODIFICHE AL DATABASE</h1>";
// + campo tabella ela
$sql = "ALTER TABLE `tbl_ela` ADD `referente` VARCHAR(40) NOT NULL COMMENT 'Referente'";
$result = mysql_query($sql);  
echo "<br>Campo -referente- aggiunto a: tbl_ela";
?>