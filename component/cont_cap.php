<?php
/* * Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 3.0   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
   * -------------------------------------------------------------------------
   * Scrittura dei contenuti di tipo cap=capitolo.
   * $pag=0  Stampa tutti gli articoli del capitolo. 
   * $pag=1  Stampa tutti i titoli degli articoli del capitolo + link di richiamo. 
   * se "cmostra"=1 mostra il testo del capitolo.       
   * 3.0 uso di 'namespace'
=============================================================================*/

// stampa il testo del capitolo.
       $sql1 = "SELECT * FROM `".$pref."cap` 
                WHERE ccod='$dati' and cstat <> 'A'  ";
      $result1 = mysql_query($sql1);   
      if(mysql_num_rows($result1)!=0)  
      {
       while($row = mysql_fetch_array($result1))
        { $ctext   = $row['ctext']; 
          $cmostra = $row['cmostra']; 
        }
        if ($cmostra == 1) {  echo $ctext;   }
      }     
include_once 'cont_artcap.php';      
        
?>