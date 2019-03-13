<?php  
/** * Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 2.0  
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================== 
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
                     height='16px' >&nbsp;";}
             else 
             {  echo "&nbsp;<input type='image' class='nobord' src='images/stop.png' 
                     height='16px' >&nbsp;";}
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
/**==========================================================================
  Gestione dei campi input di form
============================================================================= */
class field              extends fieldi
{ 
  public $label  = "";   // label campo database / testata
  
        public function __construct($valini,$campo,$lung,$label)       
               { $this->valini   = $valini;
                 $this->lung     = $lung;
                 $this->campo    = $campo;
                 $this->label    = $label;}        
                       
        public function field_r()   // input readonly  
          {    echo "<div> 
                     <label for='$this->campo'>$this->label</label>
                     <input type='text' class='titolo' readonly='readonly' 
                     name='$this->campo'  id='$this->campo' value= '$this->valini' 
                     size='$this->lung'  ></div>"; 
          } 
                       
        public function field_rb()   // input readonly + bold 
          {    echo "<div> 
                     <label for='$this->campo'>$this->label</label>
                     <input type='text' class='titolo_b' readonly='readonly' 
                     name='$this->campo'  id='$this->campo' value= '$this->valini' 
                     size='$this->lung'  ></div>"; 
          } 
                                                  
        public function field_ck()   // checkbox  
          {    echo "<div> 
                     <label for='$this->campo'>$this->label</label>
                     <input type='checkbox' class='nobord' id='$this->campo' 
                     name='$this->campo' value=$this->valini 
                     size='$this->lung' ></div>"; 
          } 
                       
        public function field_i()   // input text  
          {    echo "<div> 
                     <label for='$this->campo'>$this->label</label>
                     <input type='text' id='$this->campo' 
                     name='$this->campo' value='$this->valini' 
                     size='$this->lung' ></div>";
          } 
                       
        public function field_ia()   // input text con autofocus 
          {    echo "<div> 
                     <label for='$this->campo'>$this->label</label>
                     <input type='text' id='$this->campo' 
                     name='$this->campo' value='$this->valini' 
                     size='$this->lung' autofocus>
                         <script>
                         if (!('autofocus' in document.createElement('input')))
                         {
                         document.getElementById('$this->campo').focus();
                         }
                         </script></div>";
          } 
                       
                       
        public function field_ir()   // input text requested 
          {    echo "<div>
                     <label for='$this->campo'>$this->label</label>
                     <input class='req' type='text' required
                     name='$this->campo' id='$this->campo' value='$this->valini' 
                     size='$this->lung' ></div>";
          } 
                       
        public function field_t()   // input testate di colonna
          {    echo "<div>
                     <label for='$this->campo'>$this->label</label>
                     <input disabled='disabled' class='blue' 
                     value='$this->label' size='$this->lung'>
                     </div>"; 
          } 
                       
        public function field_pw()   // input password 
          { 
           echo "<div>
                 <label for='$this->campo'>$this->label</label>
                 <input type='password'  id='$this->campo'
                        name='$this->campo' value='$this->valini' 
                        size='$this->lung' ></div>";
          } 
                       
        public function field_pwr()   // input password readonly
          { 
           echo "
           <div>
                 <label for='$this->campo'>$this->label</label>
                 <input type='password'  readonly
                        name='$this->campo' value='$this->valini' 
                        size='$this->lung'  ></div>
                        ";
          } 
                       
                        
        public function field_h()   // input hidden (Lunghezza e label facoltative)
          { 
          echo  "
          <div><input type='hidden' 
                        name='$this->campo' id='$this->campo' value='$this->valini' >
                        </div>
                        "; 
          } 
                       
        public function field_ic()   // input text + color picker 
          { 
           echo "
           <div>
                 <label for='$this->campo'>$this->label</label> 
                 <input type='text' class='colore'
                        name='$this->campo' id='$this->campo' value='$this->valini' 
                        size='$this->lung' ></div>
                        ";
          } 
                       
         public function field_st()   // input status
          {
          if ($this->campo != 'A') 
             {  echo "
             <div>
                      <label for='$this->campo'>$this->label</label>
                      <input type='image' class='nobord' src='images/ok.png' 
                      name='$this->campo' id='$this->campo' value='$this->valini'
                      height='16px' ></div>
                      ";}
             else 
             {  echo "
             <div>
                      <label for='$this->campo'>$this->label</label>
                      <input type='image' class='nobord' src='images/stop.png'
                      name='$this->campo' id='$this->campo' value='$this->valini' 
                      height='16px' ></div>
                      &nbsp;";}
          }  
                       
        public function field_d1()   // input data-1 con calendario jquery  
          {    echo "<div> 
                     <label for='$this->campo'>$this->label</label>
                     <input type='text' id='datepicker1' 
                     name='$this->campo' value='$this->valini' 
                     size='$this->lung' ></div>";
          } 
                       
        public function field_d2()   // input data-2 con calendario jquery  
          {    echo "<div> 
                     <label for='$this->campo'>$this->label</label>
                     <input type='text' id='datepicker2' 
                     name='$this->campo' value='$this->valini' 
                     size='$this->lung' ></div>";
          } 

}
/**============================================================================== 
  Gestione dei campi input di form secondo CSS3.
============================================================================= */
class field3             extends field
{ 
  public $pch    = "";   // placeholder
 
        public function __construct($valini,$campo,$lung,$label,$pch)       
               { $this->valini   = $valini;
                 $this->lung     = $lung;
                 $this->campo    = $campo;
                 $this->label    = $label;
                 $this->pch      = $pch; }        
                       
        public function field_ip()   // input text + placeholder 
          {    echo "<fieldset class='input'><div> 
                     <label for='$this->campo'>$this->label</label>
                     <input type='text' id='$this->campo' 
                     name='$this->campo' value='$this->valini' 
                     size='$this->lung'  placeholder='$this->pch' >
                     </fieldset>";
          } 
                       
        public function field_irp()   // input text requested  + placeholder
          {    echo "<fieldset class='input'><div>
                     <label for='$this->campo'>$this->label</label>
                     <input type='text' required 
                     name='$this->campo' id='$this->campo' value='$this->valini' 
                     size='$this->lung' placeholder='$this->pch' ></div></fieldset>";
          } 
                       
        public function field_pwp()   // input password + placeholder
          { 
           echo "<fieldset class='input'><div>
                 <label for='$this->campo'>$this->label</label>
                 <input type='password'  id='$this->campo'
                        name='$this->campo' value='$this->valini' 
                        size='$this->lung' placeholder='$this->pch' >
                 </div></fieldset>";
          } 
                       
        public function field_icp()   // input text + color picker + placeholder 
          { 
           echo "<fieldset class='input'><div>
                 <label for='$this->campo'>$this->label</label> 
                 <input type='text' class='colore'
                        name='$this->campo' id='$this->campo' value='$this->valini' 
                        size='$this->lung' placeholder='$this->pch' >
                 </div></fieldset>";
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

/**===========================================================================
  Classe per la gestione delle textarea
============================================================================= */

class fieldx               
{ 
     public $valini = '';   // valore campo database 
     public $campo  = '';   // nome variabile POST 
     public $col    = 0;    // colonne
     public $rig    = 0;    // righe     
     public $label  = '';   // label campo testata

        public function __construct($valini,$campo,$col,$rig,$label)
               {
                 $this->valini     = $valini;
                 $this->campo      = $campo;                 
                 $this->col        = $col;
                 $this->rig        = $rig;
                 $this->label      = $label; 
               }        
                       
        public function fieldx()   // input textarea
               {
               echo  "<fieldset class='input'><div><label for=$this->campo>$this->label</label>";
      echo  "<textarea name=$this->campo cols=$this->col rows=$this->rig>$this->valini</textarea>
               </div></fieldset>";
               } 
                       
        public function fieldx_r()   // input textarea readonly
               {
               echo  "<fieldset class='input'><div><label for=$this->campo>$this->label</label>";
      echo  "<textarea name=$this->campo cols=$this->col rows=$this->rig readonly>$this->valini</textarea>
               </div></fieldset>";
               } 
}

/**===========================================================================
  Classe per la gestione dei radio-button 1=si/0=no.
============================================================================= */
class sn             
{                                                 
public $valini  =  0;
public $campo   =  '';
public $label   =  ''; 
  
  public function __construct($valini,$campo,$label)       
               { $this->valini = $valini;
                 $this->campo  = $campo;
                 $this->label  = $label;}  
                       
  public function default_si()     // scrive radio-button si checked   
  {
     echo  "<fieldset class='input'><div> 
            <label for='$this->campo'>$this->label</label>
            <input id='state0' type='radio' name='$this->campo' value='0'>No
            <input id='state1' type='radio' name='$this->campo' value='1' 
            checked='checked'>Si
            </div></fieldset>";
          } 

        public function show()     // mostra radio-button con label
        {
        if($this->valini == 0) 
        { 
        echo  "<fieldset class='input'><div>
               <label for='$this->campo'>$this->label</label>
               <input id='state0' type='radio' value='0' name='$this->campo' 
               checked='checked'>No";
        echo  "<input id='state1' type='radio' value='1' name='$this->campo'>Si
               </div></fieldset>";
        }                                     
        if($this->valini == 1) 
        {
        echo  "<fieldset class='input'><div>
               <label for='$this->campo'>$this->label</label>
               <input id='state1' type='radio' value='1' name='$this->campo' checked='checked' >
               Si";
        echo  "<input id='state0' type='radio' value='0' name='$this->campo'>
               No
               </div></fieldset>";
        }
        }
        
                    
}

/**===========================================================================
  Classe per mostrare icone che rappresentano lo stato del record.
============================================================================= */
class stato      
{                                                 
               
public $stato  =  '';    // stato del record

public function __construct($stato)       
               { $this->stato = $stato;  }  
                       
public function status()       
{
if ($this->stato != 'A') 
{
echo "&nbsp;<input type='image' class='nobord' src='images/ok.png' height='16px' >&nbsp;";}
else 
{echo "&nbsp;<input type='image' class='nobord' src='images/stop.png' height='16px' >&nbsp;";}
}  
}      
?>
