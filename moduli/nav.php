<?php 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.1    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= 
   * legge nav per il menu attivo e crea gli elementi li+a per il menu
   * evidenzia la voce corrente.    
============================================================================= */
echo "<ul class='nav'>";    
$sql = "SELECT * 
        FROM `".DB::$pref."nav` 
        WHERE nmenu='admin' and nstat != 'A'
        ORDER BY nprog";
$result = mysql_query($sql); 
while($row = mysql_fetch_array($result))
  {   	
  if ( $row['nli'] == $forma) 
  { 
//  echo "<li class='current'><a href='".$row['ntesto']."'>".$row['nli']."</a></li>";
  echo "<li class='current'><a href='index.php?forma=".$forma."&iframea=urla&urla=".$row['ntesto']."'>".$row['nli']."</a></li>";  
  }
		else
    { 
//  echo "<li><a href='".$row['ntesto']."'>".$row['nli']."</a></li>"; 
  echo "<li><a href='index.php?forma=".$forma."&iframea=urla&urla=".$row['ntesto']."'>".$row['nli']."</a></li>";
    }
}  
echo "</ul>";  
?> 