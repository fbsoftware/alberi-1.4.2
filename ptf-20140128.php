<?php
// aggiunta campi a tbl_ver e tbl_vel
include('classi/DB.php');
$dbase = new DB('sito');    DB::config();   $dbase->openDB();

// + 2 campi tabella ver
  $sql = "ALTER TABLE `tbl_ver` ADD `vprog` INT(5) NOT NULL COMMENT 'Progressivo Ricevuta', ADD `vmezzo` VARCHAR(15) NOT NULL COMMENT 'A mezzo' ";
$result = mysql_query($sql);  
echo "<br>Due campi aggiunti a: tbl_ver";

// + 2 campi tabella vel
  $sql = "ALTER TABLE `tbl_vel` ADD `eprog` INT(5) NOT NULL COMMENT 'Progressivo Ricevuta', ADD `emezzo` VARCHAR(15) NOT NULL COMMENT 'A mezzo' ";
$result1 = mysql_query($sql);
echo "<br>Due campi aggiunti a: tbl_vel";

// natura campi tabella xdb
$sql = "ALTER TABLE `tbl_xdb` CHANGE `xcod` `xcod` TINYTEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'codice', CHANGE `xdes` `xdes` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT 'descrizione'";
$result2 = mysql_query($sql);
echo "<br>Variato tipo di 2 campi a: tbl_xdb";

// + elementi tabella: xdb,settore: pag
$x1 = new DB_tip_add('pag','assegno','Assegno');
$x1->add_xdb();
echo "<br>Aggiunto cadice assegno";
$x1 = new DB_tip_add('pag','contanti','CCContanti');
$x1->add_xdb();
echo "<br>Aggiunto cadice contanti";
$x1 = new DB_tip_add('pag','c/c postale','CC/CC postale');
$x1->add_xdb();
echo "<br>Aggiunto cadice c/c postale";
$x1 = new DB_tip_add('pag','bonifico','BBBonifico');
$x1->add_xdb();
echo "<br>Aggiunto cadice bonifico";
?>