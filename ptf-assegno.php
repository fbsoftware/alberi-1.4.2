<?php
include('classi/DB.php');
$db1 = new DB('sito');       $db1->openDB();   DB::config();
$x1 = new DB_tip_add('pag','assegno','Assegno');
$x1->add_xdb();
echo "<br>Aggiunto cadice assegno";
$x1 = new DB_tip_add('pag','contanti','CCContanti');
$x1->add_xdb();
echo "<br>Aggiunto cadice contanti";
$x1 = new DB_tip_add('pag','c/c postale','CC/CC postale');
$x1->add_xdb();
echo "<br>Aggiunto cadice c/c postale";
$x1 = new DB_tip_add('pag','bonifico','Bonifico');
$x1->add_xdb();
echo "<br>Aggiunto cadice bonifico";
?>