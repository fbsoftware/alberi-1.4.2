<?php   session_start();
/*** Fausto Bresciani   fbsoftware.bresciani@gmail.com  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2013 - 2014 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * 
=============================================================================  */

//------- partenza da ... -----------------------------
 if ($ses_elenco == 'start')
          {
           echo "<div class='crea'><fieldset>";
           echo "<select name='id' size='20'>";
           $sql="SELECT * FROM `".DB::$pref."ind`
                    WHERE stato = ' '  and RagioneSociale LIKE '".$ses_start."%'
                    ORDER BY RagioneSociale ";
           $res2 = mysql_query($sql);
           if (!$res2) die('indiri:'.mysql_error());
           while($row = mysql_fetch_array($res2))
            {
               include('fields_ind.php');
               echo "<option value='$id'>$RagioneSociale - ($numero)</option>";
            }
           echo "</select></fieldset></div>";
           echo "</form>";
           }
//------- in ordine alfabetico -----------------------------
 if ($ses_elenco == 'alfa')
          {
           echo "<div class='crea'><fieldset>";
           echo "<select name='id' size='20'>";
           $sql="SELECT * FROM `".DB::$pref."ind`
                 WHERE stato = ' '
                 ORDER BY RagioneSociale ";
           $res2 = mysql_query($sql);
           if (!$res2) die('indiri:'.mysql_error());
           while($row = mysql_fetch_array($res2))
            {
               include('fields_ind.php');
               echo "<option value='$id'>$RagioneSociale - ($numero)</option>";
            }
           echo "</select></fieldset></div>";
           echo "</form>";
           }
//------- in ordine numerico -----------------------------
if ($ses_elenco == 'nume')
          {
          echo "<div class='crea'><fieldset>
               <select name='id' size='20'>";
          $sql="SELECT * FROM `".DB::$pref."ind`
                WHERE stato = ' '
                ORDER BY numero ";
    echo "res2=".$res2 = mysql_query($sql);
          if (!$res2) die('indiri:'.mysql_error());
          while($row = mysql_fetch_array($res2))
            {
               include('fields_ind.php');
               echo "<option value='$id'>$numero - $RagioneSociale</option>";
            }
          echo "</select></fieldset></div>";
          echo "</form>";
          }


?>