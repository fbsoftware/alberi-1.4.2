<?php
/* * Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 3.0   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
   * -------------------------------------------------------------------------
   * Scrittura dei contenuti di tipo art=articolo relativi ad un capitolo: 
   * testo e titolo (se richiesto)
   * oppure solo link.           
   * 3.0 uso di 'namespace'
=============================================================================*/

    
// leggo gli articoli del capitolo
       $sql3 = "SELECT * FROM `".DB::$pref."art` 
                WHERE acap='$dati' and astat <> 'A' 
                ORDER BY aprog";   
      $result3 = mysql_query($sql3);   
      if(mysql_num_rows($result3)!=0)  
// prepara il paragrafo se solo titoli
       if ($pag != 0)  { echo "<p>" ; }
      {
        while($row3 = mysql_fetch_array($result3))
        { $atext   = $row3['atext'];    
          $amostra = $row3['amostra'];   
          $atit    = $row3['atit']; 
          if ($pag == 0)  {              
                          if ($amostra == 1)  {echo "<h3>".$atit."</h3>"; }
                          echo $atext; 
                          }
         else
          {
          echo "<a href='index.php?form=".$forma."&sub=".$dati."&content=art&dati=".$atit."&pag=1'>".$atit."</a><br >";
          } 
        }
      }
// chiude il paragrafo se solo titoli
       if ($pag != 0)  { echo "</p>" ; }


?>