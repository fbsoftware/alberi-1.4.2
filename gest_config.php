<?php
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 3.0   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
==============================================================================
   * Gestione "config.ini"
   * Uso di DB_PDO e bootstrap
   1.0.0 tolto debug,path help e testi,contenuto
         aggiunto libreria classi standard, autore e keywords 
=============================================================================  */
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>"; 

$tipo         = $_SESSION['pag']; 

// definizione variabili
$host     = DB::$host;         $uten     = DB::$user;  
$pw       = DB::$pw;           $db       = DB::$db;  
$pref     = DB::$pref;         $site     = DB::$site;  
$home     = DB::$page_title;   $root     = DB::$root;
$p_imm    = DB::$dir_imm;      $sep      = DB::$sep;
$author   = DB::$author;       $keywords = DB::$keywords; 
$incr     = DB::$incr;         $mail     = DB::$e_mail;
$lib      = DB::$lib;          $url      = DB::$url;
$livello  = DB::$livello;      $modifica = DB::$modify;     
$rilascio = DB::$rilascio;             

     echo     "<div class='container well'>";
     
     echo     "<div class='row space-before space-after'>"; 
     echo     "<div class='col-md-12'>"; 
       
 //   bottoni gestione
$param  = array('modifica','ritorno');  
$btx    = new bottoni_str_par('Configurazione','config','write_config.php',$param);     
     $btx->btn();
echo "</div>";
echo "</div>";

// dati di configurazione
     echo     "<div class='row  space-before space-after'>";
     echo "<div class='col-md-6'>" ;
     echo "<fieldset><legend>&nbsp;Generali&nbsp;</legend>";
     $f6 = new input(array($site,'site',20,'Cartella sito','','i'));           
          $f6->field();   
     $f7 = new input(array($home,'home',30,'Titolo home page','','ir'));        
          $f7->field();  
     $f8 = new input(array($root,'root',40,'Root sito','','i'));               
          $f8->field();   
     $f9 = new input(array($p_imm,'p_imm',30,'Path immagini','','ir'));         
          $f9->field();   
     $au = new input(array($author,'author',20,'Autore','','ir'));                  
          $au->field();
     $ke = new input(array($keywords,'keywords',40,'Parole chiave','','i'));      
          $ke->field();     
	 $fc = new input(array($sep,'sep',10,'Separatore dei path','','ir'));       
          $fc->field();           
     $fd = new input(array($incr,'incr',10,'Incremento record DB','','ir'));    
          $fd->field();              
     $fe = new input(array($mail,'mail',30,'E-mail del sito','','ir'));         
          $fe->field();              
     $ff = new input(array($lib,'lib',30,'Libreria standard','Libreria delle classi standard','ir'));   
          $ff->field();             
     $fg = new input(array($url,'url',30,'URL del sito (http://...)','','ir')); 
          $fg->field();             
echo "</fieldset>";
echo "</div>";    

// dati del database
echo "<div class='col-md-6'>" ;
echo "<fieldset><legend>&nbsp;Database&nbsp;</legend> ";
     $f1 = new input(array($host,'host',30,'Host','','ir'));         
          $f1->field();   
     $f2 = new input(array($uten,'uten',20,'Utente','','ir'));        
          $f2->field();  
     $f3 = new input(array($pw,'pw',20,'Password','','pw'));          
          $f3->field(); 
     $f4 = new input(array($db,'db',20,'Database','','ir'));          
          $f4->field();  
     $f5 = new input(array($pref,'pref',10,'Prefisso','','i'));      
          $f5->field();  
echo "</fieldset>";
echo "</div>";
echo "</div>";       // row

echo     "<div class='row  space-before space-after'>";
// dati della versione
echo "<div class='col-md-6'>" ;
echo "<fieldset><legend>&nbsp;Versione&nbsp;</legend> ";
     $f1 = new input(array($livello, 'livello' ,2,'Livello','','ir'));        
          $f1->field();
     $f0 = new input(array($rilascio,'rilascio',2,'Rilascio','','ir'));       
          $f0->field();
     $f2 = new input(array($modify,'modify',2,'Modifica','','ir'));       
          $f2->field();  
echo "</fieldset>";
echo "</div>";

echo "</form>";
echo "</div>";       // row
echo "</div>";       // container
?>
