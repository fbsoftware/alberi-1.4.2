<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.3    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= */ 
if (!function_exists('getBootHead')) 
{
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo  "<link rel='stylesheet' type='text/css' href='css/style.css'>";
echo "</head>"; 
}  
    
      //   bottoni gestione
     $param  = array( 'Classi','config','index.php?urla=widget.php&pag=','ritorno');  
     $btx    = new bt_param($param);     $btx->show_bottoni($param);
// classe: sel 
echo "<fieldset>";
echo    "<legend>&nbsp;&nbsp;&nbsp;select a scelta singola</legend>";
echo    "<ul>";
echo    "<li class='CL'><pre><b>sel</b></pre> </li>";
echo    "<h3> Variabili </h3>";
echo    "<li class='DV'><pre><b>valore</b>                 parametro passato al costruttore.</pre></li>";
echo    "<h3> Metodi </h3>";
echo    "<li class='CS'><pre><b>__constructor()</b>        metodo costruttore con parametro: vuoto per elenco completo, con valore per mostrare quel valore nella select.</pre></li>";
echo    "</ul>";
echo    "</fieldset>";
// classe DB 
echo "<fieldset>"; 
echo    "<legend>&nbsp;&nbsp;&nbsp;classe di base per il database, ha classi derivate (che la estendono)</legend>";
echo    "<ul>";
echo    "<li class='CL'><pre><b>sel</b></pre> </li>";
echo    "<h3> Variabili </h3>";
echo    "<li class='SV'><pre><b>a</b>                       host</pre></li>";
echo    "<li class='SV'><pre><b>b</b>                       utente</pre></li>";
echo    "<li class='SV'><pre><b>c</b>                       database</pre></li>";
echo    "<li class='SV'><pre><b>p</b>                       password</pre></li>";
echo    "<li class='SV'><pre><b>pref</b>                    prefisso archivi</pre></li>";
echo    "<li class='SV'><pre><b>ambi</b>                    ambiente - valori: '<b>sito/amm</b>'</pre></li>";
echo    "<li class='SV'><pre><b>incr</b>                    incremento per inserimento</pre></li>";
echo    "<li class='SV'><pre><b>root</b>                    root - localhost</pre></li>";
echo    "<li class='SV'><pre><b>site</b>                    nome del sito</pre></li>";
echo    "<li class='SV'><pre><b>sep</b>                     separatore directory</pre></li>";
echo    "<li class='SV'><pre><b>dir_cont</b>                directory contenuti</pre></li>";
echo    "<li class='SV'><pre><b>dir_imm</b>                 directory immagini</pre></li>";
echo    "<li class='SV'><pre><b>dir_help</b>                directory contenuti di help</pre></li>";
echo    "<li class='SV'><pre><b>path_site</b>               path del sito</pre></li>";
echo    "<li class='SV'><pre><b>path_cont</b>               path completo contenuti</pre></li>";
echo    "<li class='SV'><pre><b>path_imm</b>                path completo immagini</pre></li>";
echo    "<li class='SV'><pre><b>path_help</b>               path completo contenuti di help</pre></li>";
echo    "<li class='SV'><pre><b>page_title</b>              titolo del sito</pre></li>";
echo    "<li class='SV'><pre><b>debug</b>                   debug sito si-no</pre></li>";
echo    "<li class='SV'><pre><b>debuga</b>                  debug amministratore si-no</pre></li>";
echo    "<li class='SV'><pre><b>content</b>                 colonna dei contenuti</pre></li>";
echo    "<li class='SV'><pre><b>e_mail</b>                  e-mail relativa al sito</pre></li>";
echo    "<li class='DV'><pre><b>con</b>                     connessione</pre></li>";
echo    "<li class='DV'><pre><b>mod_ins</b>                 progressivo per inserimento moduli</pre></li>";
echo    "<li class='DV'><pre><b>amb</b>                     ambiente 'sito/amm' (costruttore)</pre></li>";
echo    "<li class='DV'><pre><b>max</b>                     progressivo piu alto letto della tabella per determinare il valore del record da inserire</pre></li>";
echo    "<h3> Metodi </h3>";
echo    "<li class='CS'><pre><b>__constructor()</b>        metodo costruttore con parametro: ambiente del contesto</pre></li>";
echo    "<li class='SM'><pre><b>config()</b>               legge valori dal file:  <b>config.ini</b></pre></li>"; 
echo    "<li class='SM'><pre><b>openDB()</b>               connessione al database</pre></li>";
echo    "<li class='SM'><pre><b>select_ute()</b>           select tabella utenti</pre></li>";  
echo    "<li class='SM'><pre><b>select_mnu()</b>           select tabella menu</pre></li>"; 
echo    "<li class='SM'><pre><b>insert_mnu()</b>           progressivo di inserimento tabella menu</pre></li>";
echo    "<li class='DS'><pre><b>__destruct()</b>           metodo distruttore</pre></li>";     
echo    "</fieldset></ul>";
// classe: bottoni
echo    "<fieldset><legend>&nbsp;&nbsp;&nbsp;crea bottone funzione</legend>";   
echo    "<ul>";
echo    "<li class='CL'><pre><b>bottoni</b></pre> </li>";
echo    "<h3> Variabili </h3>"; 
echo    "<li class='DV'><pre><b>valore</b>                 parametro: tipo operazione(ins/mod/canc/uscita/salva) oppure nome file di help(help). 
                                  Tale parametro diventa il valore che la 'submit' passa al programma chiamato, help escluso, 
                                  dove invece e' il nome del file di help senza percorso e suffisso.</pre></li>";
echo    "<h3> Metodi </h3>";
echo    "<li class='CS'><pre><b>__constructor()</b>        metodo costruttore con parametro</pre></li>";
echo    "<li class='DM'><pre><b>bt_nuovo()</b>             crea bottone 'Nuovo' parametro ins</pre></li>"; 
echo    "<li class='DM'><pre><b>bt_mod()</b>               crea bottone 'Modifica' parametro mod</pre></li>";
echo    "<li class='DM'><pre><b>bt_canc()</b>              crea bottone 'Cancella' parametro canc</pre></li>";         
echo    "<li class='DM'><pre><b>bt_uscita()</b>            crea bottone 'Uscita' parametro uscita</pre></li>";
echo    "<li class='DM'><pre><b>bt_salva()</b>             crea bottone 'Salva' parametro salva</pre></li>";
echo    "<li class='DM'><pre><b>bt_help()</b>              crea bottone 'Aiuto' parametro nome file di help</pre></li>";
echo    "</fieldset></ul>";
// classe: bottoni_str 
echo    "<fieldset><legend>&nbsp;&nbsp;&nbsp;crea serie di bottoni funzione</legend>";
echo    "<br ><ul>";
echo    "<li class='CL'><pre><b>bottoni_str</b></pre> </li>";
echo    "<h3> Variabili </h3>";
echo    "<li class='DV'><pre><b>parametro1</b>                 titolo del form che usa la serie di bottoni</li>";
echo    "<li class='DV'><pre><b>parametro2</b>                 suffisso tabella da gestire (art,mod,mnu ...)</li>";
echo    "<h3> Metodi </h3>";
echo    "<li class='CS'><pre><b>__constructor()</b>         metodo costruttore con 2 parametri.</pre></li>";
echo    "<li class='DM'><pre><b>bt_gest()</b>               crea bottoni 'Nuovo-Modifica-Cancella-Aiuto'</pre></li>"; 
echo    "<li class='DM'><pre><b>bt_upd_ins()</b>            crea bottoni 'Salva-Uscita'</pre></li>";
echo    "<li class='DM'><pre><b>bt_upd_mod()</b>            crea bottoni 'Salva-Uscita'</pre></li>";         
echo    "<li class='DM'><pre><b>bt_upd_canc()</b>           crea bottoni 'Cancella-Uscita'</pre></li>";
echo    "</fieldset></ul>";
// classe: --------------- 
echo    "<fieldset><legend>&nbsp;&nbsp;&nbsp;Simbologia</legend>";
echo    "<ul>";
echo    "<li class='CL'><pre><b>Nome classe</b></pre> </li>";
echo    "<h3> Variabili </h3>";
echo    "<li class='DV'><pre><b>Variabile dinamica</b></li>";
echo    "<li class='SV'><pre><b>Variabile statica</b></pre></li>";
echo    "<h3> Metodi </h3>";
echo    "<li class='CS'><pre><b>metodo costruttore</b></pre></li>";
echo    "<li class='DM'><pre><b>metodo dinamico</b></pre></li>"; 
echo    "<li class='SM'><pre><b>metodo statico</b></pre></li>";
echo    "<li class='DS'><pre><b>metodo distruttore</b></pre></li>";
echo    "</fieldset></ul>";
 // ------------

?> 
