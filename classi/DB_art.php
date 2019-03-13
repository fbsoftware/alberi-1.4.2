<?php
/* * Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================== 
  Classe 'DB_art'     Funzioni per tabella 'mod'
  Metodi:
  sel_tipo_mod()     select dei tipi modulo
============================================================================= */
class DB_art          extends DB

{       public $valore='';   
  
               public function __construct($valore)       
               { $this->valore = $valore; }   
             
    public function select_art()       // articoli
          { echo "<select name='sv' >";
            echo "<option selected='selected' value=$this->valore>$this->valore</option>";
            $sql="SELECT * FROM ".self::$pref."art WHERE astat = '' ORDER BY aprog";
            $result = mysql_query($sql) or die ("Errore nello script:<b>".__FILE__."</b> alla riga <b>".__LINE__."</b>".mysql_error());
            while($row = mysql_fetch_array($result))
              {  echo "<option value='".$row['atit']."'>".$row['atit']."</option>";  }
            echo "</select>";
          } 
 
}
?>
