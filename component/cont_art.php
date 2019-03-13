<?php
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
   * -------------------------------------------------------------------------
   * Scrittura dei contenuti di tipo art=articolo sulla pagina-menu.      
=============================================================================*/
 include_once('classi/FB.class.php');
    $sql2 = "SELECT * 
               FROM `".DB::$pref."art` 
               WHERE atit='$dati' and astat <> 'A'
               ORDER BY aprog";
      $result = mysql_query($sql2);
      if (mysql_num_rows($result))
{
      while($row = mysql_fetch_array($result))
      { $text   = $row['atext'];    
        $mostra = $row['amostra'];   
        $tit    = $row['atit'];      
        
       if ($mostra == 1)  {echo "<h3>".$tit."</h3>"; }
       $a = new txt($text);
       $a->ingloba();              // elementi inglobati nel testo

       echo $text;
      }
} 
?>
