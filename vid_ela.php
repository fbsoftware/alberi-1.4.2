<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 3.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
   * ------------------------------------------------------------------------
   * visualizzazione sintetica elargitori
============================================================================= */
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
     echo "</head>";   
$azione   = $_POST['submit'];
 
$param = array('ritorno');
$btx   = new bottoni_str_par('Visualizza elargitori','ela','index.php?urla=widget.php&pag=',$param);     
     $btx->btn();
     
   switch ($azione) 
   {
   case 'chiudi': 
     $loc = "location:index.php?urla=widget.php&pag=";
     header($loc);                          
   break;
 
   default:

// mostra la tabella
echo    "<div class='tabella'><fieldset >";
      $fa = new fieldt('Num',3);                $fa->field();
      $fb = new fieldt('St.',1);                $fb->field();
      $fc = new fieldt('RagioneSociale',50);    $fc->field();
      $fe = new fieldt('Indirizzo',40);         $fe->field();
      $fg = new fieldt('CAP',5);                $fg->field();
      $ff = new fieldt('Localit&agrave;',20);   $ff->field();
      $fk = new fieldt('Pr.',3);                $fk->field();      
      $fj = new fieldt('Telefono',10);          $fj->field();
 
// scelta ordinamento
        switch ($_POST['ordine'])                          
        {
        case 'alfa':
        $sql="SELECT * FROM `".DB::$pref."ela` 
                 ORDER BY RagioneSociale ";       
              break;
        case 'nume':
        $sql="SELECT * FROM `".DB::$pref."ela` 
                 ORDER BY numero ";       
        break;
        }  
    
// lettura dati
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
     foreach($PDO->query($sql) as $row)  
          { 
          include('fields_ela.php');  
          echo "<br />"; 
          $f1 = new fieldi($numero,'',3);              $f1->field_r();     
          $f2 = new fieldi($stampa,'',1);              $f2->field_r();
          $f3 = new fieldi($RagioneSociale,'',50);     $f3->field_r();
          $f5 = new fieldi($indirizzo,'',40);          $f5->field_r();
          $f6 = new fieldi($cap,'',5);                 $f6->field_r();     
          $f7 = new fieldi($localita,'',20);           $f7->field_r(); 
          $f9 = new fieldi($provincia,'',3);           $f9->field_r();     
          $f8 = new fieldi($telefono,'',10);           $f8->field_r();
          }
echo    "</fieldset ></div'></html>";
}
?> 
