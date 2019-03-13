<?php  session_start(); 
/* * Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 2.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
   * ------------------------------------------------------------------------
   * gestione credits.     
============================================================================= */ 
echo  "<link rel='stylesheet' type='text/css' href='css/style.css'>";
include_once('classi/bottoni.php');  
//   bottoni gestione
$btx = new bottoni_str('Informazioni','info');     $btx->bt_info();
echo "<fieldset >";
echo "<pre class=info><strong>Ringraziamenti</strong><br ><br >
<ul class='info'><li><img src='images/bs1b.jpg' alt='fb' width=90 ></li></ul> 
FB ha utilizzato programmi <i><b>Open Source</b></i> delle seguenti societa' o programmatori :
<ul class='info'>
	<li><img src='images/logo_tiny.png' alt='tiny mce' width=90 > per l'introduzione dei testi</li>
	<li><a href='http://www.pspad.com/' title='PSPad.com - freeware text editor'><img src='http://www.pspad.com/banners/pspad_7.png' alt='pspad' title='PSPad.com - freeware text editor' ></a> per la gestione dei sorgenti</li>
	<li><img src='images/topstyle.gif' alt='topstyle' width=90 > per la gestione dei CSS</li>
	<li><img src='images/pclzip.jpg' alt='pclzip' width=150 > per la gestione degli archivi .zip</li>
	<li><img src='images/color-picker.jpg' alt='color-picker' width=150 > per la gestione del color-picker</li>
	<li><img src='images/Man 4.png' alt='santos' width=50 ><a href='mailto:josiel_lkp@yahoo.com.br'>Josiel A. Santos</a>  per la gestione dei files .ini</li>
	<li><a href='http://www.danish-shareware.dk/soft/shelpm/index.html' title='Shalom help maker'><img src='images/shm.jpg' alt='shalom' width=150 ></a>  per la gestione dell'help</li>	
</ul></pre>";   

echo "</form></fieldset>";  
?> 