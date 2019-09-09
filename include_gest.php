<?php
foreach (glob("libFB-1.1.1/*.php") as $filename)
  { include_once $filename; }
$db  = new DB();             
$tmp = new TMP('admin');
$tmp->read_tmp();
$PDO = new PDO("mysql:host=".DB::$host.";dbname=".DB::$db."",DB::$user,DB::$pw);
$PDO->beginTransaction();
?>
