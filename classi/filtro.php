<?php
/*** Fausto Bresciani   fbsoftware.bresciani@gmail.com  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2013 - 2014 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * genera fieldset con filtro su tabella isc
=============================================================================  */
   class filtro
   { // BEGIN class filtro 
   	// variabili
   	public $sel_elenco  = '';
   	public $sel_start   = '';
   	public $ritorno     = '';
   	// constructor
     public function __construct($sel_elenco,$sel_start,$ritorno)
   	{ // BEGIN constructor
   	 $this->sel_elenco = $sel_elenco ;
      $this->sel_start  = $sel_start ;
      $this->ritorno    = $ritorno ;
   	} // END constructor

       public function filtra2()
     	{
echo      "<div class='crea'><fieldset>";
echo      "<form action='dummy.php?ritorno=".$this->ritorno."' method='post'>" ;
echo      "<input type='hidden' name='ritorno' value='".$this->ritorno."' > ";
echo      "&nbsp;Ordinamento :&nbsp;";
echo      "<select name='sel_elenco'>";
          if ($this->sel_elenco === 'alfa')
                {echo      "<option selected value='alfa'>Alfabetico</option>";}
          else  {echo      "<option          value='alfa'>Alfabetico</option>";}
          if ($this->sel_elenco === 'nume')
                {echo      "<option selected value='nume'>Numerico</option>";}
          else  {echo      "<option          value='nume'>Numerico</option>";}
echo      "</select>";
echo      "&nbsp;<button type='submit' name='submit' value='OK' >OK</button>";
echo      "</form></fieldset></div>" ;

     	}

       public function filtra()
     	{
echo      "<div class='crea'><fieldset>";
echo      "<form action='dummy.php?ritorno=".$this->ritorno."' method='post'>" ;
echo      "<input type='hidden' name='ritorno' value='".$this->ritorno."' > ";
echo      "&nbsp;Ordinamento :&nbsp;";
echo      "<select name='sel_elenco'>";
          if ($this->sel_elenco === 'start')
                {echo "<option selected value='start'>Partenza da</option>";}
          else  {echo      "<option          value='start'>Partenza da</option>";}
          if ($this->sel_elenco === 'alfa')
                {echo      "<option selected value='alfa'>Alfabetico</option>";}
          else  {echo      "<option          value='alfa'>Alfabetico</option>";}
          if ($this->sel_elenco === 'nume')
                {echo      "<option selected value='nume'>Numerico</option>";}
          else  {echo      "<option          value='nume'>Numerico</option>";}
echo      "</select>";
echo      "&nbsp;<input type='text' name='sel_start' value='".$this->sel_start."' size='20' >";
echo      "&nbsp;<button type='submit' name='submit' value='OK' >OK</button>";
echo      "</form></fieldset></div>" ;
     
     	}


   } // END class filtro
?>