<?php
foreach (glob("libFB-1.1.0/*.php") as $filename)
  {
	include_once $filename;
//      echo $filename."<br />";
  }
$db  = new DB();             
$tmp = new TMP();
$tmp->read_tmp() ;
include('lingua.php');
$con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
$PDO = new PDO($con,DB::$user,DB::$pw);
$PDO->beginTransaction();
?>