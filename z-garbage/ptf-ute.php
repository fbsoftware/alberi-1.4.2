<?php
// aggiunta campi a tbl_ute
include('classi/DB.php');
$dbase = new DB('sito');    $dbase->openDB();
echo "<br><h1>MODIFICHE AL DATABASE</h1>";
// + campo tabella ela
$sql = "ALTER TABLE `tbl_ute` ADD `uiscritto` INT(1) NOT NULL COMMENT 'Nr.iscritto'";
$result = mysql_query($sql);  
echo "<br>Campo -uiscritto- aggiunto a: tbl_ute";
?>
