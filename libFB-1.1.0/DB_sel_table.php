<?php
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 2.0
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta
   * all'uso anche improprio di FB open template.
===============================================================================
  Funzioni di utilita' database
  Metodi:
  select_table()             Mostra struttura tabelle del database aperto
============================================================================= */
class DB_sel_table
{
     public $tabella   ='';
     public $pref      ='';

     public function __construct($pref)
          {
           $this->pref = $pref;
          }

    public function select_table()
          // crea select su un campo
          {
          echo "<label for='table'>Scegliere la tabella     </label>";
          echo "<select name='table'>";
          echo $sql = "SHOW TABLES";
          $result = mysql_query($sql);
          while($tableName = mysql_fetch_row($result))
               {
               $this->table = $tableName[0];
               $is = strpos($this->table, $this->pref);
               if ($is !== false)    // filtro il prefisso da considerare
                    {
                    echo "<option value='".$this->table."'>".$this->table."</option>";
                    }
          }
           echo "</select>";
}
}
?>