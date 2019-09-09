<?php 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.3   
   * copyright	Copyright (C) 2013 - 2014 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
   * --------------------------------------------------------------------------
   *  FUNZIONI DI UTILITA'
   * --------------------------------------------------------------------------
   *              
=============================================================================== 
  Classe 'alias'       
  metodo fa_alias    per ottenere un alias da una stringa trasformando prima
  in minuscolo, troncandola al primo doppio spazio e sostituendo gli spazi con
  trattini. 
============================================================================= */
class alias
{
public $s=""; 

        public function __construct($s)       
               { $this->s = $s;  }
               
         function fa_alias() 
                {      
               $this->s = strtolower($this->s);
               $l = strpos($this->s,"  ");
               if ($l == 0) $l=strlen($this->s);
               $this->s = substr($this->s,0,$l);
               $this->s = strtr($this->s," ","-");
               return $this->s;
               }
}

/**========================================================================== 
  imgdim.php                                                                        
  Classe per il dimensionamento delle immagini in modo da adeguarle alla
  finestra che le ospita.
============================================================================= */
class imgdim            
{                                                 
     public $img    =  '';
     public $alt    =  '';
     public $lun    =  '';
     
     public $width  =  '';
     public $height =  '';
     public $imgh =  '';
     public $imgl =  '';
  
        public function __construct($img,$alt,$lun)       
               {    $this->img     = $img;
                    $this->alt     = $alt;
                    $this->lun     = $lun;
               }  
                       
        public function maxdim()       
          {
          $pathimg = DB::$path_imm.$this->img;
          $dim=array();
          $dim = getimagesize($pathimg);
          $x=$dim['0'];   $this->imgl = $x; 
          $y=$dim['1'];   $this->imga = $y;
          // nei limiti entrambe le dimensioni 
               if($this->imgl <= $this->lun && $y <= $this->alt) 
                         {
                         $vx = $this->imgl;   
                         $vy = $this->imga;
                         }
               else      {
                         $vx = $this->lun/$this->imgl;   
                         $vy = $this->alt/$this->imga;
                         }
               // adeguo la + critica fra le dimensioni       
               if($vx < $vy)  $this->width = $this->lun;  
               else           $this->height= $this->alt;
          }
}

/**===============================================================================
  Partendo dal presupposto che il tipo della struttura di una tabella di database
  mySQL puo' contenerne la lunghezza, es.: VARCHAR(15), ricava la lunghezza campo
  database da questa stringa
  
  Metodi:
  lun()             calcola lunghezza
  Variabili:
  lung              valore della lunghezza (ritorna zero se non indicato il 
                    valore come per campi: text,mediumtext,ecc in quanto
                    mancano i riferimenti alle parentesi)
============================================================================= */
class lun_f         
{       
        public $valore ='';
        public $lung =0;
 
    public function __construct($valore)       
               { $this->valore = $valore; 
                 $this->lung = @$lung;}   

    public function lun_f()               
    {   
    $x1=strpos($this->valore,'(');
    if ($x1 > 0)
       {	  
       $x2=strpos($this->valore,')');       
       $start=($x1+1);     
       $lun=(($x2-$x1)-1);            
       return $this->lung=substr($this->valore,$start,$lun);
       }
    else
       {return $this->lung=0;}
    }    
}

/**===============================================================================
  Crea select dei files .php/.htm/.html contenuti in una cartella  
  Metodi:
  file()            elenca in una select i files nella directory
  Variabili:
  valore            nome del file selezionato
============================================================================= */
class select_file 
{        
        public $path   ='';
        public $valini =''; 
        public $campo  ='';
        public $valore ='';              // scelta della select
        public $label  ='';
 
    public function __construct($path,$valini,$campo,$label)       
               { 
               $this->path    = $path;
               $this->valini  = $valini;
               $this->campo   = $campo;
               $this->label   = $label;                              
               }   

    public function file()               
    { 
     $f=opendir($this->path) ;
     while(false!==($g=readdir($f)))          //legge fino a false
     {
         if($g!="." && $g!="..")              //elimino il punto ed i doppi punti
         {   if(is_dir($this->path.$g))            //creo un array con le directory trovate
             { $array_dir[]=$g; }
               if(is_file($this->path.$g))       //creo un array con i file trovati
                  { $array_file[]=$g;
                  $numg++; }                 //numero di file trovati
         }
     }
     closedir($f);                           //chiudo la directory
           echo "<fieldset class='input'><div>
                 <label for='$this->campo'>$this->label</label>";    
           echo "<select name='$this->campo'>";
           echo "<option value=''>Vuoto</option>";
           $conto2=count($array_file);
           for($b=0; $b<$conto2; $b++)
           { 
           $file_ext = substr($array_file[$b], strripos($array_file[$b], '.')); 
           if  ($file_ext=='.php'  || $file_ext=='.htm' || $file_ext=='.html')
           $this->valore = $array_file[$b]; 
               { 
               if ($this->valini == $this->valore)
                 {
                 echo "<option selected='selected' value=".$this->valini.">
                       ".$this->valini."
                       </option>"; 
                 }
                 else  echo "<option value=".$this->valore.">".$this->valore."</option>"; 
               }
           }    
           echo "</select></div></fieldset>";
    }
}
/**===============================================================================
  Crea select dei files .php/.htm/.html contenuti nella root
  Metodi:
  select_dir()      elenca in una select i files nella root
  Variabili:
  valore            nome del file selezionato
============================================================================= */
 class select_root
{
        public $valini ='';
        public $campo  ='';
        public $valore ='';              // scelta della select
        public $label  ='';

    public function __construct($valini,$campo,$label)
               {
               $this->valini  = $valini;
               $this->campo   = $campo;
               $this->label   = $label;
               }

  public function select_dir()
{
$path = $_SERVER['SCRIPT_FILENAME'];  //identifica il percorso della Directory
$path_parts = pathinfo($path);        // effettua parsing della path
 // apre la directory
echo $dir_handle = opendir($path_parts['dirname']) or die("Impossibile aprire ".$path_parts['dirname']);
$dh  = opendir($path_parts['dirname']);
while (false !== ($filename = readdir($dh)))
     {
      $files[] = $filename;
     }
//closedir($path_parts);
sort($files);
echo "<fieldset class='input'><div>
          <label for='$this->campo'>$this->label</label>";
echo "<select name='$this->campo'>";
echo "<option value=''>Scegliere il file</option>";

 foreach ($files as $key=>$this->valore)
     {
          if (strpos($this->valore, '.php',1)
           || strpos($this->valore, '.html',1)
           || strpos($this->valore, '.htm',1))
          {
   //       echo "<a href='$file'>$file</a><br/>";
               if ($this->valini == $this->valore)
                 {
                 echo "<option selected='selected' value=".$this->valini.">
                       ".$this->valini."
                       </option>";
                 }
                 else  echo "<option value=".$this->valore.">".$this->valore."</option>";

          }
     }
echo "</select>";
}

}

/**===============================================================================
  Gestione dei campi input di form a 6 parametri
============================================================================= */
class input
{
    public $label   = "";       // label campo database / testata
    public $valini  = "";       // valore campo database
    public $lung    = 0;        // lunghezza da mostrare del campo database
    public $campo   = "";       // nome variabile campo database (Per il suo valore)
    public $pch     = "";       // placeholder
    public $tipo    = "";       // tipo di campo

        public function __construct($valini,$campo,$lung,$label,$pch,$tipo)
               { $this->valini   = $valini;
                 $this->lung     = $lung;
                 $this->campo    = $campo;
                 $this->label    = $label;
                 $this->pch      = $pch;
                 $this->tipo     = $tipo;
               }

        public function field()
          {    echo "<div>";
              if ($this->label > '')
                  { echo "<label for='$this->campo'>$this->label</label>"; }
 switch ($this->tipo) {
    case 'ck':      // check box
                echo "<input type='checkbox' class='nobord' id='$this->campo'
                        name='$this->campo' value=$this->valini size='$this->lung'  ";
                if ($this->valini === 1) { echo "checked";}
                echo ">";
         break;
    case 'star':        // immagine stella
                if ($this->valini == '*')
                    { echo "<input type='image' class='titolo'
                       name='$this->campo' value= '$this->valini'
                       src='images/star.png '>"; }
                else { echo "<input type='text' class='titolo' readonly='readonly'
                       name='$this->campo' value= '$this->valini' size='$this->lung' >"; }
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
    case 'ia':      // input text con autofocus
                    echo "<input type='text' id='$this->campo' name='$this->campo'
                        value='$this->valini' size='$this->lung' autofocus>
                         <script>
                         if (!('autofocus' in document.createElement('input')))
                         {
                         document.getElementById('$this->campo').focus();
                         }
                         </script></div>";
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
                        echo "<input type='text' class='color' name='$this->campo' id='$this->campo'
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

     default:
         break;
        }
          }
}
/**===========================================================================
   * Classe per la gestione degli inglobamenti di HTML specifico nei testi
   * per gestire:
   * - video YpuTube
   * - gallery Picasa
   * - testo scorrevole
   * - select a scelta singola
   * - select a scelta multipla
   * - indicatore ShinyStat
=============================================================================*/
class txt
     {
     public $text ='';          // testo da trattare
     public $testo=array();     // array interna

        public function __construct($text)
               {
               $this->testo  = $text;
               }

        public function ingloba()
        {
          $testo = $this->testo  ;
          $this->testo=explode('{media}',$this->testo);
          $i=0;
          for ($i=0; $i < count($this->testo) ;$i++ )
          {
// YouTube
               if (substr($this->testo[$i],0,8) == 'youtube|')
               { echo "<br />";
               $codvid=array();
               $testoi=$this->testo[$i];
               list($codvid,$width,$height)=explode('|',substr($this->testo[$i],8));
               if ($width  <= 0)   $width=480;
               if ($height <= 0)   $height=360;
               echo "<br /><iframe  style='clear:left;' width='$width'
               height='$height'
               src='http://www.youtube.com/embed/$codvid?rel=0'
               frameborder='0'
               allowfullscreen>
               </iframe><br /><br />";
               }
// gallery Picasa
                elseif (substr($this->testo[$i],0,7) == 'picasa|')
               {echo "<br />";
               $codvid=array();
               $testoi=$this->testo[$i];
               list($coduser,$codgal,$width,$height)=explode('|',substr($this->testo[$i],7));
               if ( $width == 0) $width=400;
               if ( $heigh == 0) $heigh=300;
               $rgb="0x".TMP::$tcolchi;    if ( $rgb == '0x      ')  $rgb='0xffffff';
               echo  "<embed type='application/x-shockwave-flash' ";
               echo  "src='https://picasaweb.google.com/s/c/bin/slideshow.swf'";
               echo  "width='".$width."'";
               echo  "height='".$heigh."'";
               echo  "flashvars='host=picasaweb.google.com&captions=1&noautoplay=1&hl=it&feat=flashalbum&RGB=".$rgb."&feed=https%3A%2F%2Fpicasaweb.google.com%2Fdata%2Ffeed%2Fapi%2Fuser%2F".$coduser."%2Falbumid%2F".$codgal."%3Falt%3Drss%26kind%3Dphoto%26hl%3Dit' ";
               echo  "pluginspage='http://www.macromedia.com/go/getflashplayer'></embed>";
               }
// marquee
               elseif (substr($this->testo[$i],0,8) == 'marquee|')
               {
               echo "<br />";
//               $codvid=array();
//               $testoi=$this->testo[$i];
               list($marq_text)=explode('|',substr($this->testo[$i],8));
               echo "<marquee scrollamount=3 scrolldelay=9 >$marq_text</marquee><br />";
               }
// select
               elseif (substr($this->testo[$i],0,7) == 'select|')
               {
               echo "<br />";
               $select_text=array();
               $testoi=$this->testo[$i];
               echo "<select>";
               $select_text=explode('|',substr($this->testo[$i],7));
               $conta = count($select_text);
               for($x=0; $x<$conta; $x++)
               {
               echo "<option value='$select_text[$x]'>$select_text[$x]</option>";
               }
               echo "</select><br />";
               }
// select a scelte multiple
               elseif (substr($this->testo[$i],0,8) == 'selectm|')
               {
               echo "<br />";
               $select_text=array();
               $testoi=$this->testo[$i];
               echo "<select multiple='multiple'>";
               $select_text=explode('|',substr($this->testo[$i],8));
               $conta = count($select_text);
               for($x=0; $x<$conta; $x++)
               {
               echo "<option value='$select_text[$x]'>$select_text[$x]</option>";
               }
               echo "</select><br />";
               }
// calendario
        /*       elseif (substr($this->testo[$i],0,12) == 'calengoogle|')
               {
               echo "<br />";
               $codvid=array();
               $testoi=$this->testo[$i];
               list($calengoogle)=explode('|',substr($this->testo[$i],12));
               echo $calengoogle;
               }  */
// ShinyStat
               elseif (substr($this->testo[$i],0,10) == 'shinystat|')
               {
               $shiny = "<!-- Begin Shinystat code -->
               <script type='text/javascript' src='http://codice.shinystat.com/cgi-bin/getcod.cgi?USER=fbsoftware'></script>
               <noscript>
               <a href='http://www.shinystat.com' target='_top'>
               <img src='http://www.shinystat.com/cgi-bin/shinystat.cgi?USER=fbsoftware' alt='Free hit counters' border='0' /></a>
               </noscript>
               <!-- End Shinystat code -->
               ";
               $this->testo[$i] = $shiny;
               echo "<br />".$this->testo[$i];
               }


// altrimenti mantengo il testo originario
               else
               {
               echo $this->testo[$i];
               }

          }
     }
     }

?> 
