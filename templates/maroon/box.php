<?php
$box_id =   $_REQUEST['box'];
$box_id = "box1";
include ("../../moduli/openDB.php");

 // scrivo l'intestazione  letta da box

$sql = "SELECT * FROM `box`  WHERE bmenu='$box_id' ";
$result = mysql_query($sql); 
while($row = mysql_fetch_array($result))
    { 
     $titolo = $row['btesto']; 
    } 
   
echo    "<div class='blog'>";
echo    "<div class='blog-header'><div class='img-centro'>".$titolo."</div>";
echo    "</div>";	
echo    "<div class='img-centro'><br >";
echo    "</div>"; 

// scrivo le righe lette da boxv   
$sql = "SELECT * FROM `boxv`  WHERE bvmenu='$box_id'";     
$result = mysql_query($sql); 
while($row = mysql_fetch_array($result))
    { 
      $bvlink = $row['bvlink'];
       $btesto = $row['bvtesto'];
     echo   "<a href='".$bvlink."'>";
     echo   $btesto."</a><br >";
    } 
echo    "</div><br >"; 

?>

