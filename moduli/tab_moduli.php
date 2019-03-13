<?php
$con = mysql_connect("localhost","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
echo "<table border='0'>
<tr >
<th bgcolor='#ccff66'>Stato</th>
<th bgcolor='#ccff66'>Progr</th>
<th bgcolor='#ccff66'>Voce menu'</th>
<th bgcolor='#ccff66'>Posizione</th>
<th bgcolor='#ccff66'>Comando</th>
<th bgcolor='#ccff66'>Descrizione</th>
<th bgcolor='#ccff66'>1a pagina</th>
</tr>";
mysql_select_db("my_fbsoftware", $con);
$sql = "SELECT * FROM `mod` where mstat=' ' order by mprog";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
  {
  echo "<td>" . $row['mstat'] . "</td>";
  echo "<td>" . $row['mprog'] . "</td>";
  echo "<td>" . $row['mnav'] . "</td>";
  echo "<td>" . $row['mpos'] . "</td>";
  echo "<td>" . $row['mtesto'] . "</td>"; 
  echo "<td>" . $row['mdesc'] . "</td>";
  echo "<td>" . $row['m1p'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?> 


