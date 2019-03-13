<?php  
/*** Fausto Bresciani    fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package  FB open template
   * versione 2.0  
   * copyright	Copyright (C) 2013 - 2014 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================== 
  Gestione dei campi input di form a 6 parametri
============================================================================= */
class input
{
    public $label   = "";       // label campo database / testata
    public $valini  = "";       // valore campo database
    public $lung    = 0;        // lunghezza da mostrare del campo database / cols x textarea
    public $campo   = "";       // nome variabile campo database (Per il suo valore)
    public $pch     = "";       // placeholder
    public $tipo    = "";       // tipo di campo
    public $param   =  array(); // parametri
        public function __construct($param)
               { 
               $this->valini   = $param[0];             
               $this->campo    = $param[1];               
               $this->lung     = $param[2];
               $this->label    = $param[3];
               $this->pch      = $param[4];
               $this->tipo     = $param[5];
               }


        public function field()
          {    echo "<div>";   
              if ($this->label == !NULL)
                  { echo "<label for='$this->campo' data-toggle='tooltip' title='$this->pch'>$this->label</label>"; }
 switch ($this->tipo) {
    case 'ck':      // check box
                echo "<input type='checkbox' id='$this->campo' name='$this->campo'
                         value=$this->valini size='$this->lung'  ";
                if ($this->valini === 1) { echo "checked";} 
                echo ">";
         break;
/*    case 'star':        // immagine stella
                if ($this->valini == '*')
                    { echo "<input type='image' class='titolo'
                       name='$this->campo' value= '$this->valini'
                       src='images/star.png '>"; }
                else { echo "<input type='text' class='titolo' readonly='readonly'
                       name='$this->campo' value= '$this->valini' size='$this->lung' >"; }
         break;  */
case 'star':     // immagine stella
          if ($this->valini == '*') 
               {
               echo "<input type='image' class='titolo' 
                    name='$this->campo' value= '$this->valini' 
                    src='images/star.png '>"; 
               }
          else
               { 
               echo "<input type='image' class='titolo' 
                    name='$this->campo' value= '$this->valini' 
                    src='images/null.png '>"; 
               } 
	break;

    case 'pw':      // input password
                echo "<input type='password'  id='$this->campo' name='$this->campo'
                    value='$this->valini' size='$this->lung' >";
    break;
    case 'pwr':     // input password readonly
                echo "<input type='password'  readonly  name='$this->campo'
                    value='$this->valini' size='$this->lung' >";
    break;
    case 'r':       // input readonly
                    echo "<input type='text' class='titolo' readonly name='$this->campo'
                        id='$this->campo' value= '$this->valini'
                        size='$this->lung' >";
         break;
    case 'rb':      // input readonly + bold
                    echo "<input type='text' class='titolo_b' readonly='readonly'
                        name='$this->campo'  id='$this->campo' value= '$this->valini'
                        size='$this->lung' >";
        break;
    case 'i':       // input
                    echo "<input type='text' id='$this->campo' name='$this->campo'
                        value='$this->valini' size='$this->lung' >";
            break;
    case 'tx':       // textarea
                    echo "<textarea type='text' id='$this->campo' name='$this->campo'
                          cols='$this->lung' rows='5'>$this->valini</textarea>";
            break;

    case 'txr':       // textarea teadonly
                    echo "<textarea type='text' id='$this->campo' name='$this->campo'
                          cols='$this->lung' rows='5' readonly='readonly'>$this->valini</textarea>";
            break;
    case 'ia':      // input text con autofocus
                    echo "<input type='text' id='$this->campo' name='$this->campo'
                        value='$this->valini' size='$this->lung' autofocus>
                         <script>
                         if (!('autofocus' in document.createElement('input')))
                         {
                         document.getElementById('$this->campo').focus();
                         }
                         </script>";
            break;
    case 'ir':          // input text obbligatorio
                        echo "<input type='text' required='Compilare questo campo'  name='$this->campo'
                            id='$this->campo' value='$this->valini' size='$this->lung' >";
            break;
    case 't' :          // input testate di colonna
                        echo "<input disabled class='blue' value='$this->label' size='$this->lung'>";
            break;
   case 'h':            // input hidden (Lunghezza e label facoltative)
                        echo  "<input type='hidden'
                        name='$this->campo' id='$this->campo' value='$this->valini' >";
            break;
  case 'ic':            // input text + color picker
                        echo "<input type='color' class='color' name='$this->campo' id='$this->campo'
                            value='$this->valini' size='$this->lung' >";
            break;
  case 'st':            // input status
                    if ($this->valini != 'A')
                        { echo "<input type='image' class='nobord'
                            src='images/ok.png' height='16px' width='16px'
                          name='$this->campo' id='$this->campo' value='$this->valini' >";}
                    else
                        {echo "<input type='image' class='nobord' src='images/stop.png' height='16px'
                         name='$this->campo' id='$this->campo' value='$this->valini' width='16px' >";}
            break;
case 'ip':          // input text + placeholder
                    echo "<input type='text' id='$this->campo' name='$this->campo'
                        value='$this->valini' size='$this->lung'  placeholder='$this->pch' >";
            break;
case 'ipr':
                    echo "<input type='text' required='Compilare questo campo'
                     name='$this->campo' id='$this->campo' value='$this->valini'
                     size='$this->lung' placeholder='$this->pch' >";
            break;
case 'd1' :
        echo "<input type='text' id='datepicker1' 
                     name='$this->campo' value='$this->valini' 
                     size='$this->lung'>";
         break;

case 'd2' :
        echo "<input type='text' id='datepicker2' 
                     name='$this->campo' value='$this->valini' 
                     size='$this->lung'>";
         break;     

case 'd3' :
        echo "<input type='text' id='datepicker3' 
                     name='$this->campo' value='$this->valini' 
                     size='$this->lung'>";
         break;     
      
     
     default:
         break;
        }
     echo "</div>";          
     }
}

/**=============================================================================== 
  Gestione dei campi input di form 
============================================================================= */
class fieldi           
{                                                 
  public $valini  = "";  // valore campo database 
  public $lung    = 0;   // lunghezza campo database
  public $campo   = "";  // nome variabile campo database (Per il suo valore)
  
        public function __construct($valini,$campo,$lung)       
               { $this->campo  = $campo;
                 $this->lung   = $lung;
                 $this->valini = $valini;}        
                       
         public function field_r()   // input readonly  
          { 
          echo "<input type='text' class='titolo' readonly  
                       name='$this->campo' value= '$this->valini' size='$this->lung' >"; 
          } 

        public function field_ck()   // input checkbox  (Lunghezza facoltativa)
          { 
          echo "<input type='checkbox'  class='nobord' 
                       name='$this->campo' value='$this->valini'>"; 
          } 
                       
        public function field_i()   // input text  
          { 
           echo "<input type='text' 
                        name='$this->campo' value='$this->valini' size='$this->lung' >";
          } 
                       
        public function field_ic()   // input text + color picker 
          { 
           echo "<input type='text' class='colore'
                        name='$this->campo' value='$this->valini' size='$this->lung' >";
          } 
 
                       
        public function field_ir()   // input text requested 
          { 
           echo "<input type='text' requested='requested' 
                        name='$this->campo' value='$this->valini' size='$this->lung' >";
          } 
                       
        public function field_pw()   // input password 
          { 
           echo "<input type='password'  readonly='readonly' 
                        name='$this->campo' value='$this->valini' size='$this->lung' >";
          } 
                       
        public function field_h()   // input hidden (Lunghezza facoltativa)
          { 
          echo  "<input type='hidden' 
                        name='$this->campo' value='$this->valini' >"; 
          } 
                       
         public function field_st()   // input status
          {
          if ($this->valini != 'A') 
             {  echo "&nbsp;<input type='image' class='nobord' src='images/ok.png' 
                     height='20' width='20'>&nbsp;";}
             else 
             {  echo "&nbsp;<input type='image' class='nobord' src='images/stop.png' 
                     height='20' width='20' >&nbsp;";}
          }  
                       
        public function field_id1()   // input data-1 con calendario jquery  
          {    echo "<input type='text' id='datepicker1' 
                     name='$this->campo' value='$this->valini' 
                     size='$this->lung' >";
          } 
                       
        public function field_id2()   // input data-2 con calendario jquery  
          {    echo "<input type='text' id='datepicker2' 
                     name='$this->campo' value='$this->valini' 
                     size='$this->lung' >";
          } 
                        
} 
/**===========================================================================
  Classe per la gestione delle testate di tabella
============================================================================= */

class fieldt          
{ 
  public $lung   = 0;    // lunghezza campo database
  public $label  = "";   // label campo testata
  
        public function __construct($label,$lung)       
               { $this->lung     = $lung;
                 $this->label    = $label;
               }        
                       
        public function field()   // input testate di colonna
               {    
               echo "<input disabled='disabled' class='blue' 
               value='$this->label' size='$this->lung'>"; 
               } 
}

?> 