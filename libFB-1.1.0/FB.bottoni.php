﻿<?php
/** ---------------------------------------------------------------------
 * Classe "bottoni_str_par"   Barra titolo con IMG e bottoni di gestione 
 * ----------------------------------------------------------------------
 * parametri:  immagine e titolo della mappa
 *             tabella di database interessata
 *             programma di callback
 *             array diparametri (Bottoni da visualizzare)
 *             livello di accesso (min=0 , max=9)
 * ----------------------------------------------------------------------
 * Metodi:
 *        btn()     per visualizzare
 * ----------------------------------------------------------------------
 * Note:  - ambiente Bootstrap 
 *        - controllo livello utente per accesso al singolo bottone se usata
 *          la gestione utenti, altrimenti accesso a tutto
 *        - protezione tasto invio (non ammesso)
------------------------------------------------------------------------- */
          // funzione con parametri
class bottoni_str_par         
{                                                 
  public $titolo   =  '';      // titolo
  public $tabella  =  '';      // nome archivio
  public $callbk   =  '';      // pgm di callback
  public $param    =  array(); // parametri
  public $accesso  =  '';      // livello di accesso ( min.0 --> 9 max.) 
  
        public function __construct($titolo,$tabella,$callbk,$param)       
               { $this->titolo  = $titolo;
                 $this->tabella = $tabella;
                 $this->callbk  = $callbk;
                 $this->param   = $param;
                 if (isset($_COOKIE['accesso'])) 
                    {  
                    $this->accesso = $_COOKIE['accesso'];
                    }  
                 else 
                    {
                    $this->accesso = 9;
                    }  
               }             
        public function btn()           //  bottoni gestione
          {      
                echo    "<fieldset>";
                              
                // immagine ampiezza=1
                echo "<div class='col-sm-1'>";
                echo "<img src='images/$this->tabella.png' alt='manca img' height='50'> ";
                echo    "</div>";
                
                // titolo ampiezza=44
                echo "<div class='col-sm-4 text-center'>";
                echo "<h1>&nbsp;$this->titolo</h1>";
                echo    "</div>";
                
                // bottoni ampiezza=7
                echo    "<div class='btn-group col-sm-7 text-right'>"; 
                echo    "<form method='post' id='$this->tabella' action='$this->callbk' onkeypress='return event.keyCode != 13;'>" ;
               $length = count($this->param);
               for ($i = 0; $i < $length; $i++) 
               {
               $act = $this->param[$i];

               // controllo accesso al bottone 
               $b5   = array('nuovo','modifica','cancella','archivia','cerca','ripristina','salva'); 
               $b0   = array('chiudi','uscita','mostra','stampa','ritorno');
               if(in_array($act, $b5))  { $accesso_bottone = 5; }
               if(in_array($act, $b0))  { $accesso_bottone = 0; }
               if ($this->accesso >= $accesso_bottone) 
               {
               echo    "<button class='btn btn-default btn-md' type='submit' name='submit' value='$act' id='$act'>
                         <img src=images/".$act.".png alt='$act' height=25 />".$act."</button>";
               }
               }
                echo    "</div>";
                
                echo    "</fieldset>";  // fieldset 
          }
}
/* ----------------------------------------------
	Barra dei pulsanti per programma da mostrare
	in una nuova finestra
	---------------------------------------------*/
class bottoni_str_par_new        
{                                                 
  public $titolo   =  '';      // titolo
  public $tabella  =  '';      // nome archivio
  public $callbk   =  '';      // pgm di callback
  public $param    =  array(); // parametri
  public $accesso  =  '';      // livello di accesso ( min.0 --> 9 max.) 
  
        public function __construct($titolo,$tabella,$callbk,$param)       
               { $this->titolo  = $titolo;
                 $this->tabella = $tabella;
                 $this->callbk  = $callbk;
                 $this->param   = $param;
                 if (isset($_COOKIE['accesso'])) 
                    {  
                    $this->accesso = $_COOKIE['accesso'];
                    }  
                 else 
                    {
                    $this->accesso = 9;
                    }  
               }             
        public function btn()           //  bottoni gestione
          {      
                echo    "<fieldset>";
                              
                // immagine ampiezza=1
                echo "<div class='col-sm-1'>";
                echo "<img src='images/$this->tabella.png' alt='manca img' height='50'> ";
                echo    "</div>";
                
                // titolo ampiezza=4
                echo "<div class='col-sm-4 text-center'>";
                echo "<h1>&nbsp;$this->titolo</h1>";
                echo    "</div>";
                
                // bottoni ampiezza=7
                echo    "<div class='btn-group col-sm-7 text-right'>"; 
                echo    "<form method='post' target='_blank' id='$this->tabella' action='$this->callbk' onkeypress='return event.keyCode != 13;'>" ;
               $length = count($this->param);
               for ($i = 0; $i < $length; $i++) 
               {
               $act = $this->param[$i];

               // controllo accesso al bottone 
               $b5   = array('nuovo','modifica','cancella','archivia','cerca','ripristina','salva'); 
               $b0   = array('chiudi','uscita','mostra','stampa','ritorno');
               if(in_array($act, $b5))  { $accesso_bottone = 5; }
               if(in_array($act, $b0))  { $accesso_bottone = 0; }
               if ($this->accesso >= $accesso_bottone) 
               {
               echo    "<button class='btn btn-default btn-md' type='submit' name='submit' value='$act' id='$act'>
                         <img src=images/".$act.".png alt='$act' height=25 />".$act."</button>";
               }
               }
                echo    "</div>";
                
                echo    "</fieldset>";  // fieldset 
          }
}


/**********************************************
 * @class:      widget
 *
 * @description:
 * @author: Fausto Bresciani  
 * @email:  fbsoftware@libero.it
 * @version: 0.1
 * ********************************************/

class widget
{ 

	// variabili
	public $azione = '';
	public $tabella = '';
	public $testo = '';

	// costruttore
  public function __construct($azione,$tabella,$testo)
	{
	$this->azione = $azione ;
     $this->tabella = $tabella ;
     $this->testo = $testo ;
	}
/************************************************
 * @method:   getWidget()
 * @description:
 *
 * @author: Fausto Bresciani  
 * @email:  fbsoftware@libero.it
 * @version: 0.1
 * **********************************************/
  public function getWidget()
{
          
          echo    "<div class='widget'>" ;
          echo    "<form action='$this->azione' type='post'> ";
          echo    "<button class='btn btn-default btn-md' type='submit' name='submit' value='$this->azione'>
                  <img src='images/".$this->tabella.".png' height='70'><br ><b>$this->testo</b></button>";
          echo    "</form></div>" ;
}
} 
?>