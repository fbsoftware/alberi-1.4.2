<?php
/**     === VERSIONE PRECEDENTE ===
include_once 'classi/DB.php';
include_once 'classi/DB_sel_table.php';
$db  = new DB('sito');  $db->config();
$tmp  = new DB_tmp('sito');
$tmp->read_tmp() ;
//include('lingua.php');
*/
foreach (glob("libFB-1.0.0/*.php") as $filename)
  {
	include_once $filename;
      $filename."<br />";
  }
$db  = new DB();
$tmp  = new TMP();
$tmp->read_tmp() ;
//include('lingua.php');
$con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
$PDO = new PDO($con,DB::$user,DB::$pw);
$PDO->beginTransaction();



?>