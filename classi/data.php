<?php   
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================== 
  Trattamento della data fra PHP e MySql e viceversa
  Metodi:
  flipdata()         capovolge campo data 
============================================================================= */
class data          

{       public $datain='';  
        public $dataout='';
      
     public function __construct($datain)       
          { 
          $this->datain       = $datain;       // data letta da MySql
          $this->dataout      = @$dataout;      // data convertita per video
          }   

     function flipData()
          {
          $this->dataout = explode ('-',$this->datain);
          $this->dataout = array_reverse($this->dataout);
          return implode($this->dataout,'-');
          }
}  
?>