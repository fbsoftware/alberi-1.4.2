<?php
/** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================== 
  Funzioni di utilita' database
  Metodi:
  select()             select di campo di tabella con label
============================================================================= */
class DB_sel_le          extends DB_sel_l

{ 
        public $error   ='';
  
    public function __construct($tabella,$prog,$valini,$campo,$select,$stato,$option,$label,$error)       
           { 
           $this->tabella = $tabella;        // tabella
           $this->prog    = $prog;           // campo del progressivo di ordinamento
           $this->valini  = $valini;         // valore iniziale (if)
           $this->campo   = $campo;          // campo valore passato a POST
           $this->select  = $select;         // nome variabile POST (name-select)
           $this->stato   = $stato;          // campo stato record (!A=valido)
           $this->option  = $option;         // campo option da mostrare
           $this->label   = $label;          // label select
           $this->error   = $error;          // label errore
           }   
              
    public function select_label()           // crea select con label su un campo
           {
           echo "<fieldset class='input'><div>
                 <label for='$this->select'>$this->label</label>"; 
           echo "<select name='$this->select'>";
           $sql="SELECT * FROM ".self::$pref.$this->tabella." 
                WHERE ".$this->stato." !='A' 
                ORDER BY ".$this->prog." ";
                echo $sql;
           $res2 = mysql_query($sql);
           if (!$res2) die('DB_sel/select:'.mysql_error());
           while($row = mysql_fetch_array($res2))  
            { if ($row[$this->campo] == $this->valini)
                 {echo "<option selected='selected' value=".$row[$this->campo].">
                       ".$row[$this->option]."
                       </option>"; }
              else
                 {echo "<option value='".$row[$this->campo]."'>
                       ".$row[$this->option]."
                       </option>"; 
                       echo $row[$this->campo]."<br >";}                  
            }  
           echo "</select>
                 <span style='color:red; font-weight:bold;'>$this->error</span>
                 </div></fieldset>";
           } 

}
?> 
