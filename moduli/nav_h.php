<?php
//--------------------------------------------------------------
//   lettura del menu da visualizzare del tipo: dl+dt da "mnu"
//   lettura delle relative voci da "nav"
//   possibilita' di inserire riga di separazione (comando vuoto)
//--------------------------------------------------------------
                                                         
include('classi/DB.php');
$dbase = new DB('sito');
$dbase->openDB();

echo "<dl class='navi'>";
$sql = "SELECT * FROM `".DB::$pref."nav`  WHERE nmenu='$desc' order by nprog";
$result = mysql_query($sql); 
while($row = mysql_fetch_array($result))
  {   
echo "<dt><a href=" .$row['ntesto'];
if ($row['ntarget'] <> null) {echo " target='".$row['ntarget']."'>"; }
echo $row['nli'] . "</a></dt>";
  }
  
echo "</dl>";   
?> 