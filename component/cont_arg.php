<?php
/** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 3.0   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
   * -------------------------------------------------------------------------
   * Scrittura dei contenuti di tipo arg=argomento.
   * $pag=0  Stampa tutti gli articoli dell'argomento. 
   * $pag=1  Stampa tutti i titoli degli articoli dell'argomento+ link di richiamo. 
   * se "rmostra"=1 mostra il testo dell'argomento.       
   * 3.0 uso di 'namespace'
=============================================================================*/

// stampa il testo dell'argomento se richiesto.
       $sql1 = "SELECT * FROM `".$pref."arg` 
                WHERE rcod='$dati' and rstat <> 'A'  ";
      $result1 = mysql_query($sql1);   
      if(mysql_num_rows($result1)!=0)  
      {
       while($row = mysql_fetch_array($result1))
        { $rtext   = $row['rtext']; 
          $rmostra = $row['rmostra']; 
        }
        if ($rmostra == 1) {  echo $rtext;   }
      }     
      
// leggo i capitoli dell'argomento e stampo il testo del capitolo(if) ed i suoi articoli.
 
       $sql2 = "SELECT * FROM `".$pref."cap` 
                WHERE carg='$dati' and cstat <> 'A'  
                ORDER BY cprog ";
      $result2 = mysql_query($sql2);   
      if(mysql_num_rows($result2)!=0)  
      {
       while($row2 = mysql_fetch_array($result2))
          { 
          $ctext   = $row2['ctext']; 
          $cmostra = $row2['cmostra']; 
          $ccod    = $row2['ccod']; 
          if ($cmostra == 1) {  echo $ctext;   }
          include 'cont_artarg.php'; 
          }                   
      }     

?>
