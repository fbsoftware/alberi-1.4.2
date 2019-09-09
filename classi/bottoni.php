<?php
/** * Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
 * package		FB open template
 * versione 2.0   
 * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
 * license		GNU/GPL
 * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
 * all'uso anche improprio di FB open template.
  ===============================================================================
  bottoni.php
  Classe per la gestione dei bottoni dei form.
  ============================================================================= */

class bottoni {

    public $value1 = '';

    public function __construct($value1) {
        $this->value1 = $value1;
    }

    public function bt_nuovo() {     // nuovo  
        echo "<button class='big' type='submit' name='submit' value='$this->value1'>
                  <img src='images/new_f1.png' height='25'/>Nuovo</button>";
    }

    public function bt_help() {     // help   
        echo "<a href='help00.php?file_h=testi/" . $this->value1 . ".txt' target='_self'>
                  <button class='big' type='button'>
                  <img src='images/con_info.png' height='25'/>Aiuto</button></a>";
    }

    public function bt_salva() {     // salva  
        echo "<button class='big' type='submit' name='submit' value='$this->value1'>        
                   <img src='images/save_f2.png' height='25'/>Salva</button>";
    }

    public function bt_cerca() {     // cerca record  
        echo "<button class='big' type='submit' name='submit' value='$this->value1'>
                  <img src='images/cerca.png' height='25'/>Ricerca</button>";
    }

    public function bt_uscita() {     // uscita  
        echo "<button class='big' type='submit' name='submit' value='$this->value1'>
                  <img src='images/cancel_f2.png' height='25'/>Uscita</button>";
    }

    public function bt_modifica() {     // modifica  
        echo "<button class='big' type='submit' name='submit' value='$this->value1'>
                  <img src='images/edit_f2.png' height='25'/>Modifica</button>";
    }

    public function bt_show() {     // modifica
        echo "<button class='big' type='submit' name='submit' value='$this->value1'>
                  <img src='images/video.png' height='25'/>Mostra</button>";
    }

    public function bt_cancella() {     // cancella  
        echo "<button class='big' type='submit' name='submit' value='$this->value1'>
                  <img src='images/delete.png' height='25'/>Cancella</button>";
    }

    public function bt_chiudi() {     // chiusura mappa  
        echo "<button class='big' type='submit' name='submit' value='$this->value1'>
                  <img src='images/close.jpg' height='25'/>Chiudi</button>";
    }

    public function bt_upld() {     // upload files  
        echo "<button class='big' type='submit' name='submit' value='$this->value1'>
                  <img src='images/upld.png' height='25'/>Upload</button>";
    }

    public function bt_dwnld() {     // download files  
        echo "<button class='big' type='submit' name='submit' value='$this->value1'>
                  <img src='images/down.png' height='25'/>Download</button>";
    }

    public function bt_email() {     // email  
        echo "<button class='big' type='submit' name='submit' value='$this->value1'>        
                   <img src='images/email_2.png' height='25'/>Invia</button>";
    }

    public function bt_reset() {     // reset form 
        echo "<button class='big' type='reset' name='reset' value='$this->value1'>        
                   <img src='images/undo.png' height='25'/>Resetta</button>";
    }

    public function bt_arch() {     // archivia 
        echo "<button class='big' type='submit' name='submit' value='$this->value1'>        
                   <img src='images/arch.png' height='30'/>Archivia</button>";
    }

    public function bt_ripr() {     // ripristina
        echo "<button class='big' type='submit' name='submit' value='$this->value1'>        
                   <img src='images/ripr.png' height='30'/>Ripristina</button>";
    }

    public function bt_prt() {     // stampa
        echo "<button class='big' type='submit' name='submit' value='$this->value1'>        
                   <img src='images/prt.png' height='30'/>Stampa</button>";
    }

    public function bt_logout() {     // logout
        echo "<button class='big' type='submit' name='submit' value='$this->value1'>        
                   <img src='images/exit.png' height='30'/>Logout</button>";
    }

}

// ================================================================================================

class bottoni_str extends bottoni {

    public $titolo = '';      // titolo
    public $tabella = '';      // nome archivio

    public function __construct($titolo, $tabella) {
        $this->titolo = $titolo;
        $this->tabella = $tabella;
    }

    function bt_gest() {           //  bottoni gestione per prima scelta
        echo "<div class='azioni'>";
        echo "<div class='titolo'>";
        echo "<img src='images/$this->tabella.png' alt='manca img' height='50'> ";
        echo "&nbsp;$this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form method='post' action='upd_$this->tabella.php'>";
        $bt1 = new bottoni('ins');
        $bt1->bt_nuovo();
        $bt2 = new bottoni('mod');
        $bt2->bt_modifica();
        $bt3 = new bottoni('canc');
        $bt3->bt_cancella();
        $bt5 = new bottoni('chiudi');
        $bt5->bt_chiudi();
        echo "</div>";
        echo "</div>";
    }

    function bt_gest_a() {           //  bottoni gestione con archivio 
        echo "<div class='azioni'>";
        echo "<div class='titolo'>";
        echo "<img src='images/$this->tabella.png' alt='manca img' height='50'> ";
        echo "&nbsp;$this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form method='post' action='upd_$this->tabella.php'>";
        $bt1 = new bottoni('ins');
        $bt1->bt_nuovo();
        $bt1 = new bottoni('show');
        $bt1->bt_show();    
        $bt2 = new bottoni('mod');
        $bt2->bt_modifica();
        $bt3 = new bottoni('canc');
        $bt3->bt_cancella();
        $bt4 = new bottoni('arch');
        $bt4->bt_arch();
        $bt6 = new bottoni('chiudi');
        $bt6->bt_chiudi();
        echo "</div>";
        echo "</div>";
    }

    function bt_gest_aj() {           //  bottoni gestione con archivio jquery
        echo "<div class='azioni'>";
        echo "<div class='titolo'>";
        echo "<img src='images/$this->tabella.png' alt='manca img' height='50'> ";
        echo "&nbsp;$this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form method='post' action='updj_$this->tabella.php'>";
        $bt1 = new bottoni('ins');
        $bt1->bt_nuovo();
        $bt2 = new bottoni('mod');
        $bt2->bt_modifica();
        $bt2 = new bottoni('show');   // v1.3.5
        $bt2->bt_show();              // v1.3.5
        $bt3 = new bottoni('canc');
        $bt3->bt_cancella();
        $bt4 = new bottoni('arch');
        $bt4->bt_arch();
        $bt6 = new bottoni('chiudi');
        $bt6->bt_chiudi();
        echo "</div>";
        echo "</div>";
    }


    function bt_gest_r() {           //  bottoni gestione con ripristino
        echo "<div class='azioni'>";
        echo "<div class='titolo'>";
        echo "<img src='images/$this->tabella.png' alt='manca img' height='50'> ";
        echo "&nbsp;$this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form method='post' action='upd_$this->tabella.php'>";
        $bt1 = new bottoni('show');
        $bt1->bt_show();    
        $bt5 = new bottoni('ripr');
        $bt5->bt_ripr();
        $bt3 = new bottoni('canc');
        $bt3->bt_cancella();
        $bt6 = new bottoni('chiudi');
        $bt6->bt_chiudi();
        echo "</div>";
        echo "</div>";
    }

    function bt_upd_ins() {           //  bottoni inserimento
        echo "<div class='azioni'>";
        echo "<div class='titolo'><img src='images/$this->tabella.png' alt='manca img' height='50'>
                              $this->titolo</div>";
        echo "<div class='bottoni'>";
        
        echo "<form class='bottoni' method='post' action='gest_$this->tabella.php'>";        
        $bt2 = new bottoni('uscita');
        $bt2->bt_uscita();
        echo "</form>";
        
        echo "<form class='bottoni' method='post' action='write_$this->tabella.php'>";
        $bt1 = new bottoni('ins');
        $bt1->bt_salva();
        
        echo "</div>";
        echo "</div>";
    }

    function bt_upd_mod() {           //  bottoni modifica
        echo "<div class='azioni'>";

        echo "<div class='titolo'><img src='images/$this->tabella.png' alt='manca img' height='50'>
                              $this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form class='bottoni' method='post' action='write_$this->tabella.php'>";
        $bt1 = new bottoni('mod');
        $bt1->bt_salva();
        $bt2 = new bottoni('uscita');
        $bt2->bt_uscita();
        echo "</div>";
        echo "</div>";
    }

   function bt_upd_canc() {           //  bottoni conferma cancellazione
        echo "<div class='azioni'>";
        echo "<div class='titolo'><img src='images/$this->tabella.png' alt='manca img' height='50'>
                                   $this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form method='post' method='post' action='write_$this->tabella.php'>";
        $bt1 = new bottoni('canc');
        $bt1->bt_cancella();
        $bt2 = new bottoni('uscita');
        $bt2->bt_uscita();
        echo "</div>";
        echo "</div>";
    }

    function bt_upd_arch() {           //  bottoni conferma archiviazione
        echo "<div class='azioni'>";
        echo "<div class='titolo'><img src='images/$this->tabella.png' alt='manca img' height='50'>
                                   $this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form method='post' method='post' action='write_$this->tabella.php'>";
        $bt1 = new bottoni('arch');
        $bt1->bt_arch();
        $bt2 = new bottoni('uscita');
        $bt2->bt_uscita();
        echo "</div>";
        echo "</div>";
    }

    function bt_upd_ripr() {           //  bottoni conferma ripristino
        echo "<div class='azioni'>";
        echo "<div class='titolo'><img src='images/$this->tabella.png' alt='manca img' height='50'>
                                   $this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form method='post' method='post' action='write_$this->tabella.php'>";
        $bt1 = new bottoni('ripr');
        $bt1->bt_ripr();
        $bt2 = new bottoni('uscita');
        $bt2->bt_uscita();
        echo "</div>";
        echo "</div>";
    }

    function bt_info() {           //  bottone info
        echo "<div class='azioni'>";
        echo "<div class='titolo'><img src='images/info.png' alt='manca img' height='50'>
                                   $this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form method='post' action='upd_$this->tabella.php'>";
        $bt1 = new bottoni('chiudi');
        $bt1->bt_chiudi();
        echo "</div>";
        echo "</div>";
    }

    function bt_vid() {           //  bottone visualizza
        echo "<div class='azioni'>";
        echo "<div class='titolo'><img src='images/video.png' alt='manca img' height='50'>
                                   $this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form method='post' action='widget.php'>";
        $bt1 = new bottoni('uscita');
        $bt1->bt_uscita();
        echo "</div>";
        echo "</div>";
    }


    function bt_upd_show() {           //  bottone info
        echo "<div class='azioni'>";
        echo "<div class='titolo'><img src='images/video.png' alt='manca img' height='50'>
                                   $this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form method='post' action='upd_$this->tabella.php'>";
        $bt1 = new bottoni('chiudi');
        $bt1->bt_chiudi();
        echo "</div>";
        echo "</div>";
    }

    function bt_upd_ins_voce() {   //  bottoni inserimento con scelta tipo                    //  action = upd2 !-importante      
        echo "<div class='azioni'>";
        echo "<div class='titolo'>$this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form method='post' action='upd2_$this->tabella.php'>";
        $bt1 = new bottoni('ins');
        $bt1->bt_salva();
        $bt2 = new bottoni('uscita');
        $bt2->bt_uscita();
        echo "</div>";
        echo "</div>";
    }

    function bt_gest2() {             //  bottoni inserimento con scelta tipo                       //  action = upd2 !-importante      
        echo "<div class='azioni'>";
        echo "<div class='titolo'><img src='images/$this->tabella.png' alt='manca img' height='50'> ";
        echo "$this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form method='post' action='upd2_$this->tabella.php'>";
        $bt1 = new bottoni('ins');
        $bt1->bt_nuovo();
        $bt2 = new bottoni('mod');
        $bt2->bt_modifica();
        $bt3 = new bottoni('canc');
        $bt3->bt_cancella();
        $bt5 = new bottoni('chiudi');
        $bt5->bt_chiudi();
        echo "</div>";
        echo "</div>";
    }

    function bt_ins_cerca() {             //  bottoni ricerca e nuovo
        echo "<div class='azioni'>";
        echo "<div class='titolo'><img src='images/$this->tabella.png' alt='manca img' height='50'> ";
        echo "$this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form method='post' action='upd_$this->tabella.php'>";
        $bt1 = new bottoni('ins');
        $bt1->bt_nuovo();
        $bt2 = new bottoni('cerca');
        $bt2->bt_cerca();
        $bt5 = new bottoni('chiudi');
        $bt5->bt_chiudi();
        echo "</div>";
        echo "</div>";
    }

    function bt_mod_canc() {                   //  bottoni modifica e cancella           
        echo "<div class='azioni'>";           //  action = upd2 !-importante
        echo "<div class='titolo'><img src='images/$this->tabella.png' alt='manca img' height='50'> ";
        echo "$this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form method='post' action='upd2_$this->tabella.php'>";
        $bt2 = new bottoni('mod');
        $bt2->bt_modifica();
        $bt3 = new bottoni('canc');
        $bt3->bt_cancella();
        $bt5 = new bottoni('uscita');
        $bt5->bt_uscita();
        echo "</div>";
        echo "</div>";
    }

    function bt_upload() {           //  bottone upload locale
        echo "<div class='azioni'>";
        echo "<div class='titolo'>";
        echo "<img src='images/upld.png' alt='upld' height='50'>&nbsp;&nbsp;$this->titolo ";
        echo "</div>
                        <div class='bottoni'>";
        echo "<form action='upload1_tmp.php' name='upload' enctype=multipart/form-data method='post'>";
        $bt1 = new bottoni('upload');
        $bt1->bt_upld();
        $bt2 = new bottoni('uscita');
        $bt2->bt_uscita();
        echo "</div></div>";
    }

    function bt_upload_ftp() {           //  bottone upload ftp
        echo "<div class='azioni'>";
        echo "<div class='titolo'>";
        echo "<img src='images/upld.png' alt='upld' height='50'>&nbsp;&nbsp;$this->titolo ";
        echo "</div>";
        echo "<div class='bottoni'>";
        echo "<form class='bottoni' action='write_ftp.php' name='upload' 
                              method='post' enctype='multipart/form-data'>";
        $bt1 = new bottoni('upload');
        $bt1->bt_upld();
        $bt2 = new bottoni('uscita');
        $bt2->bt_uscita();
        echo "</div>";
        echo "</div>";
    }

    function bt_upload_media() {           //  bottone upload immagini    (usato ???)
        echo "<div class='azioni'>";
        echo "<div class='titolo'>";
        echo "<img src='images/up.jpg' alt='upld' height='50'>&nbsp;&nbsp;$this->titolo ";
        echo "</div>";
        echo "<div class='bottoni'>";
        echo "<form class='bottoni' action='write_$this->tabella.php' name='upload'    
                              method='post' enctype='multipart/form-data'>";
        $bt1 = new bottoni('upload');
        $bt1->bt_upld();
        $bt2 = new bottoni('uscita');
        $bt2->bt_uscita();
        echo "</div>";
        echo "</div>";
    }

    function bt_download_media() {           //  bottone download immagini    (usato ???)
        echo "<div class='azioni'>";
        echo "<div class='titolo'>";
        echo "<img src='images/dwn.jpg' alt='dwnld' height='50'>&nbsp;&nbsp;$this->titolo ";
        echo "</div>";
        echo "<div class='bottoni'>";
        echo "<form class='bottoni' action='write_$this->tabella.php' name='upload'    
                              method='post' enctype='multipart/form-data'>";
        $bt1 = new bottoni('download');
        $bt1->bt_dwnld();
        $bt2 = new bottoni('uscita');
        $bt2->bt_uscita();
        echo "</div>";
        echo "</div>";
    }

    function bt_media() {           //  bottoni upload e chiudi
        echo "<div class='azioni'>";
        echo "<div class='titolo'><img src='images/img.png' alt='upld' height='50'>&nbsp;&nbsp;$this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form method='post' action='upd_$this->tabella.php'>";
        $bt2 = new bottoni('upload');
        $bt2->bt_upld();
        $bt2 = new bottoni('uscita');
        $bt2->bt_uscita();
        echo "</div>";
        echo "</div>";
    }

    function bt_upd_config() {           //  bottoni modifica  configurazione
        echo "<br ><div class='azioni'>";
        echo "<div class='titolo'><img src='images/tool.png' alt='upld' height='50'>&nbsp;&nbsp;$this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form class='bottoni' method='post' action='write_$this->tabella.php'>";
        $bt1 = new bottoni('mod');
        $bt1->bt_salva();
        $bt2 = new bottoni('uscita');
        $bt2->bt_uscita();
        echo "</div>";
        echo "</div>";
    }

    function bt_db_tab() {           //  scelta tabella DB
        echo "<br ><div class='azioni'>";
        echo "<div class='titolo'>
                          <img src='images/Help 3.png' alt='manca img' height='50'>
                          $this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form class='bottoni' method='post' action='gest_tabella.php'>";
        $bt1 = new bottoni('tab');
        $bt1->bt_salva();
        $bt2 = new bottoni('uscita');
        $bt2->bt_uscita();
        echo "</div>";
        echo "</div>";
    }

    function bot_prt() {           //  bottoni stampa unificati
        echo "<div class='azioni'>";
        echo "<div class='titolo'><img src='images/prt.png' alt='manca img' height='50'>
                                   $this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form class='bottoni' method='post' action='prt_$this->tabella.php'>";
        $bt2 = new bottoni('uscita');
        $bt2->bt_uscita();
        echo  "</form>";
 
        echo "<form class='bottoni'  method='post' action='prt_$this->tabella.php'>";
        $bt1 = new bottoni('prt');
        $bt1->bt_prt();    
        echo "</div>";
        echo "</div>";

    }

    function bot_logout() {           //  bottone logout
       echo "<div class='bottoni'>";
        echo "<form class='bottoni' method='post' action='login.php'>";
        $bt2 = new bottoni('uscita');
        $bt2->bt_logout();
        echo  "</form>";
        echo "</div>";
    }

    function bot_prt_vid() {           //  bottoni stampa e visualizza
        echo "<div class='azioni'>";
        echo "<div class='titolo'><img src='images/prt.png' alt='manca img' height='50'>
                                   $this->titolo</div>";
        echo "<div class='bottoni'>";
        echo "<form class='bottoni' method='post' action='upd_$this->tabella.php'>";
        $bt1 = new bottoni('show');
        $bt1->bt_show();    
        $bt1 = new bottoni('prt');
        $bt1->bt_prt();
        $bt2 = new bottoni('uscita');
        $bt2->bt_uscita();
        echo "</div>";
        echo "</div>";
 
    }

}

/**================================================================================= 
  Classe 'bt_param'       
  metodo get_param    per ottenere il valore dei parametri contenuti in ogni
  elemento composto e separato con ",".
  Nel caso di valori doppi la separazione  
================================================================================= */
class bt_param      extends bottoni
{
    
public    $param="";
var       $arr=array(); 

        public function __construct($param)       
               { $this->param = $param;}
                                                                    
        public function show_bottoni($param)
 {       
               // parametri in array
               $par=array();
               $par = $this->param ;
               $accesso  =  $_COOKIE['accesso'];
             //  print_r($par);                   
// icona e titolo                                                
        echo "<div class='azioni'>";
        echo "<div class='titolo'>";
        echo "<img src='images/archivi/$par[1].png' alt='manca img' height='50'> ";
        echo "&nbsp;$par[0]</div>";
        echo "<div class='bottoni'>";
        echo "<form method='post' action='$par[2]' onkeypress='return event.keyCode != 13;'>";
        
// bottoni
          $b5   = array('nuovo','modifica','cancella','archivia','cerca','ripristina','salva'); 
          $b0   = array('chiudi','uscita','mostra','stampa','ritorno');
         $max = count($par);
         for ($i=3 ; $i<$max ; $i++) 
         {
          $pos = strpos($par[$i], '|');

     if ($pos === false) 
          {
          if(in_array($par[$i], $b5))  { $accesso_bottone = 5; }
          if(in_array($par[$i], $b0))  { $accesso_bottone = 0; }
          if ($accesso >= $accesso_bottone) 
          {
          echo "<button class='big' type='submit' name='submit' value='$par[$i]'>
                  <img src='images/bottoni/$par[$i].png' height='40'/>$par[$i]</button>";
          } 
          }
     else
          {
          list($label,$azione)=explode('|',$par[$i]); 
          if(in_array($par[$i], $b5))  { $accesso_bottone = 5; }
          if(in_array($par[$i], $b0))  { $accesso_bottone = 0; }
          if ($accesso >= $accesso_bottone) 
               {
               echo "<button class='big' type='submit' name='submit' value='$azione'>
                  <img src='images/bottoni/$label.png' height='40'/>$label</button>";
               }
          }
} 
        echo "</div>";
        echo "</div>";
} 
} 
/**===============================================================================================*/

class widget {

    public $value1 = '';

    public function __construct($value1) {
        $this->value1 = $value1;
    }
                 
    public function bt_widget() {       // terna N.1
        echo "<div id='widgets'>";
        echo "<div class='widget'>";
        echo "<form class='wdg' action='gest_mnu.php' type='post'>";
        echo "<button class='wdg' type='submit' name='submit' value='$this->value1'>
                  <img src='images/menu.jpg' height='70'><br ><b>Menu</b></button>";
        echo "</form></div>";

        echo "<div class='widget'>";
        echo "<form class='wdg' action='gest_nav.php' type='post'> ";
        echo "<button class='wdg' type='submit' name='submit' value='$this->value1'>
                  <img src='images/vocimenu.jpg' height='70'><br ><b>Voci menu</b></button>";
        echo "</form></div>";

        echo "<div class='widget'>";
        echo "<form class='wdg' action='gest_mod.php' type='post'> ";
        echo "<button class='wdg' type='submit' name='submit' value='$this->value1'>
                  <img src='images/moduli.png' height='70'><br ><b>Moduli</b></button>";
        echo "</form></div></div>";
        // terna N.2
        echo "<div id='widgets'>";
        echo "<div class='widget'>";
        echo "<form class='wdg' action='gest_art.php' type='post'> ";
        echo "<button class='wdg' type='submit' name='submit' value='$this->value1'>
                  <img src='images/document.png' height='70'><br ><b>Articoli</b></button>";
        echo "</form></div>";
        echo "</div>";

        echo "<div class='widget'>";
        echo "<form class='wdg' action='gest_cap.php' type='post'> ";
        echo "<button class='wdg' type='submit' name='submit' value='$this->value1'>
                  <img src='images/capitoli.jpg' height='70'><br ><b>Capitoli</b></button>";
        echo "</form></div>";

        echo "<div class='widget'>";
        echo "<form class='wdg' action='gest_arg.php' type='post'> ";
        echo "<button class='wdg' type='submit' name='submit' value='$this->value1'>
                  <img src='images/argomenti.jpg' height='70'><br ><b>Argomenti</b></button>";
        echo "</form></div></div>";
        // terna N.3
        echo "<div id='widgets'>";
        echo "<div class='widget'>";
        echo "<form class='wdg' action='gest_vid.php' type='post'> ";
        echo "<button class='wdg' type='submit' name='submit' value='$this->value1'>
                  <img src='images/youtube.jpg' height='70'><br ><b>Videoclip</b></button>";
        echo "</form></div>";

        echo "<div class='widget'>";
        echo "<form class='wdg' action='gest_gal.php' type='post'> ";
        echo "<button class='wdg' type='submit' name='submit' value='$this->value1'>
                  <img src='images/picasa.jpg' height='70'><br ><b>Fotogallery</b></button>";
        echo "</form></div></div>";

        echo "<div class='widget'>";
        echo "<form class='wdg' action='gest_config.php' type='post'> ";
        echo "<button class='wdg' type='submit' name='submit' value='$this->value1'>
                  <img src='images/tool.png' height='70'><br ><b>Configuraz.</b></button>";
        echo "</form></div></div>";
    }

    public function bt_widget_fael() {       // terna N.1

    /*    echo "<div class='widget'>";
        echo "<form class='wdg' action='gest_ela.php?pag=L' type='post'> ";
        echo "<button class='wdg' type='submit' name='submit' value='$this->value1'>
                  <img src='images/ela.png' height='70'><br ><b>Elargitori</b></button>";
        echo "</form></div></div>";

        echo "<div id='widgets'>";
        echo "<div class='widget'>";
        echo "<form class='wdg' action='gest_isc.php?pag=I' type='post'> ";
        echo "<button class='wdg' type='submit' name='submit' value='$this->value1'>
                <img src='images/isc.png' height='70'></a><br ><b>Iscritti</b></button>";
        echo "</form>";
        echo "</div></div>";

        echo "<div class='widget'>";
        echo "<form class='wdg' action='gest_ver.php' type='post'> ";
        echo "<button class='wdg' type='submit' name='submit' value='$this->value1'>
                  <img src='images/ver.png' height='70'><br ><b>Versamenti</b></button>";
        echo "</form></div>";

        echo "<div class='widget'>";
        echo "<form class='wdg' action='gest_config.php' type='post'> ";
        echo "<button class='wdg' type='submit' name='submit' value='$this->value1'>
                  <img src='images/tool.png' height='70'><br ><b>Configuraz.</b></button>";
        echo "</form></div></div>";  
     */
   
      echo "<img src='images/fael2.png' height='200' style='margin-left:200px;margin-top:150px;'>";   
        
    }

}
?>
