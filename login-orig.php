<?php  session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.4    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= */              
echo  "<!DOCTYPE html>
      <head>
      <title>Gestione login amministratore</title>";
echo  "<link rel='stylesheet' type='text/css' href='css/style.css'>";
echo  "</head>
       <body>";

//  controllo utente
include ("classi/DB.php");
include ("classi/FB.class.php");
$dbase    = new DB('sito');  $dbase->openDB();  $dbase->config(); 
                                             
echo  "<div id='login'>"; 
echo  "<fieldset class='log'>";
echo  "<legend class='log'>";
echo  "&nbsp;Collegamento&nbsp;"; 
echo  "<img class='login' src='images/logo/logo.png' alt='logonew.png, 1,6kB' title='key2' height='50''>";
echo  "</legend>";
//   prepara il modulo del login  
echo  "<form name='modulo' action='login_test.php' method='post'>";

/**   tolta select utente e richiesta digitazione
     $ute = new DB_ute('sito');   $ute->select_ute(); */
 $f1 = new input('','uten',20,'Utente','','ir');           $f1->field();
 $f2 = new input('','pass',20,'Password','','pw');         $f2->field();
echo  "<img class='login' src='images/key2.png' alt='key2.png, 1,6kB' title='key2' height='50''>";
echo  "<br ><br />";   
echo  "<button class=login type=submit name=submit value=Login >Login</button><br >";
echo  "<br >";
  if  ($_COOKIE['err'] == '1') {echo  "<p class=red><b>Credenziali NON VALIDE !</b></p>" ;}
  else
      {echo  "&nbsp;" ;}
echo  "</form><br >";
      
echo  "<form name=modulo_back action=uscita.php method=post><br >"; 
echo  "<hr ><br >";
echo  "<button class=login type=submit name=submit_back value=Ritorno >Ritorno</button>"; 
echo  "</form>";
echo  "</fieldset>"; 
echo  "</div>";
echo  "</body></html>";
?> 
