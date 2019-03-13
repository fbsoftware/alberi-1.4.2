<?php
include ("../moduli/openDB.php");
$sql = "select * FROM `tmp` WHERE tsel='*' "; 
$result = mysql_query($sql); 
while($row = mysql_fetch_array($result))
   	if ( $row['tfolder'] != "") 
{ 
    
    $tipo   = $row['ttipo'] ;
    $desc   = $row['ttdesc'] ;
    $path   = $row['tfolder'] ;
  $col1   = $row['tcol1'] ;
  $col2   = $row['tcol2'] ;
  $col3   = $row['tcol3'] ;
  $menu   = $row['tmenu'] ;
}

?> 