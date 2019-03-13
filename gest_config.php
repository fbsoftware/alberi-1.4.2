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
=============================================================================  */
include_once 'include_gest.php';

$tipo         = $_SESSION['pag']; 
// DOCTYPE & head
$head = new getBootHead('gestione layout di pagina');
     $head->getBootHead();        

// definizione variabili
$host     = DB::$host;         $uten     = DB::$user;  
$pw       = DB::$pw;           $db       = DB::$db;  
$pref     = DB::$pref;         $site     = DB::$site;  
$home     = DB::$page_title;   $root     = DB::$root;
$p_imm    = DB::$dir_imm;      $p_txt    = DB::$dir_cont;
$p_hlp    = DB::$dir_help;     $sep      = DB::$sep;
$incr     = DB::$incr;         $mail     = DB::$e_mail;
$cont     = DB::$content;      $url      = DB::$url;
$dbg      = DB::$debug;        $dbga     = DB::$debuga;
$livello  = DB::$livello;      $modifica = DB::$modifica;     
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
     $f0 = new input(array($p_txt,'p_txt',30,'Path contenuti','','ir'));        
          $f0->field();  
     $fb = new input(array($p_hlp,'p_hlp',30,'Path help','','ir'));             
          $fb->field();              
     $fc = new input(array($sep,'sep',10,'Separatore dei path','','ir'));       
          $fc->field();           
     $fd = new input(array($incr,'incr',10,'Incremento record DB','','ir'));    
          $fd->field();              
     $fe = new input(array($mail,'mail',30,'E-mail del sito','','ir'));         
          $fe->field();              
     $ff = new input(array($cont,'cont',20,'Colonna dei contenuti','','ir'));   
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
     $f2 = new input(array($modifica,'modifica',2,'Modifica','','ir'));       
          $f2->field();  
echo "</fieldset>";
echo "</div>";

// dati di servizio 
echo "<div class='col-md-6'>" ;
echo "<fieldset>
       <legend>&nbsp;Debug attivato&nbsp;</legend>";
     $sn = new input(array($dbg,'dbg',1,'Sito','','sn'));                  
          $sn->field();
     $sm = new input(array($dbga,'dbga',1,'Amministratore','','sn'));      
          $sm->field();
echo "</fieldset>";
echo "</div>";
echo "</form>";
echo "</div>";       // row
echo "</div>";       // container
?>
