<?php session_start();      ob_start();   
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * Gestione elargizioni - ricerca per ricevuta
============================================================================= */
if (!function_exists('getBootHead')) 
{
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>"; 
}  
$azione   =$_POST['submit']; 
$bolletta =$_POST['bolletta']; 
  
// verifica effettuata scelta 
if ($_POST['bolletta'] <= 0)
   { 
   $_SESSION['esito'] = 4;
$loc = "location:index.php?".$_SESSION['location']."";
     header($loc); 
   }
   
// analisi scelte
switch ($azione)
{ 

// ricerca per: modifica-cancella     
    case 'cerca':

//   bottoni gestione
$param  = array('ritorno');    
$btx    = new bottoni_str_par('Versamenti <strong>ELARGITORI</strong> - ricerca ','vel','gest_vel_bol.php',$param);  
     $btx->btn();

// zona messaggi
include_once('msg.php');

// ricerca del'iscritto della bolletta  

     $sqlv = "SELECT * FROM `".DB::$pref."vel`
              WHERE `eprog` = '$bolletta'  LIMIT 1";
  try
    {
// transazione    
$con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
$PDO = new PDO($con,DB::$user,DB::$pw);
$PDO->beginTransaction(); 
foreach($PDO->query($sqlv) as $row)
          {   $id = $row['enume'];     }
    }
  catch(exception $e)
    { echo 'Nessuna ricevuta ',$e->getMessage();
          exit();
          $_SESSION['esito'] = 4;
          header('location:gest_vel_bol.php'); 
    }
 
// lato sinistro comune    
     echo "<div class='crea'>";
     echo  "<fieldset><legend> Anagrafica </legend>";
   
          $sql="SELECT * FROM `".DB::$pref."ela` 
                WHERE numero = $id ";
// transazione    
$con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
$PDO = new PDO($con,DB::$user,DB::$pw);
$PDO->beginTransaction(); 
foreach($PDO->query($sql) as $row) 
          {
          include('fields_ela.php'); 
          $fa = new input(array($numero,'numero',5,'Iscritto N.','','rb'));   
          $fa->field();     
          $fd = new input(array($RagioneSociale,'RagioneSociale',50,'Elargitore','','r'));                          
          $fd->field(); 
          }
     echo  "</fieldset>";                                                                 
     echo "</div>"; 


// versamenti
     echo "<div class='crea_dx'>"; 
     echo  "<fieldset><legend> Versamenti </legend>";
     $sqlv = "SELECT * FROM `".DB::$pref."vel`
              WHERE `enume` = $numero
              ORDER BY `edata` ";
// transazione    
$con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
$PDO = new PDO($con,DB::$user,DB::$pw);
$PDO->beginTransaction(); 
foreach($PDO->query($sqlv) as $row)
     {
     include 'fields_vel.php';
    $f1 = new fieldi($eid,'eid',2);             $f1->field_ck();
    $f5 = new fieldi($eprog,'eprog',5);         $f5->field_r();
    $f3 = new fieldi($edata,'edata',10);        $f3->field_r();
    $n  = number_format($eimporto,2,',','');    // edit decimale
    $f4 = new fieldi($n,'eimporto',10);         $f4->field_r();
    echo "<br />";
    }     
     echo  "</fieldset></div>";
     echo  "</form>";
     break;

     case 'chiudi' :
			$loc = "location:index.php?urla=widget.php&pag=";
        header($loc);                                
               break;       

    default:        echo "Operazione invalida";    
}
ob_end_flush();
echo "</html>";
?>
