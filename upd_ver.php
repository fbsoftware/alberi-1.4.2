<?php session_start();      ob_start();   
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * Gestione versamenti iscritti - inserimento e ricerca
============================================================================= */
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>"; 
      
$tipo     = $_SESSION['pag'];

include_once('post_ver.php');
$azione   =$_POST['submit'];    //print_r($_POST);//debug
$id       =$_POST['id']; 

// verifica effettuata scelta 
if (($id <= 0   ||  $id == ''  || $id == NULL ) && ($azione == 'nuovo' || $azione == 'cerca') )
     { 
     $_SESSION['esito'] = 4;
     $loc = "location:index.php?".$_SESSION['location']."";
     header($loc);
     break;
     }

     // verifica versamento già effettuato
if ($azione == 'nuovo')
     { 
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction();  
         $sqlx="SELECT * FROM `".DB::$pref."isc` 
                WHERE id = $id ";
                 foreach($PDO->query($sqlx) as $row)           
          {        include('post_isc.php');
            $sq =  "SELECT COUNT(*) FROM `".DB::$pref."ver`
                    WHERE `vnume` = ".$row['numero_iscrizione']." 
                     AND `vanno` = $vanno                   
                    LIMIT 1  " ;     
                    
          $stmt1 = $PDO->prepare($sq);
          $stmt1->execute();
               if($stmt1->fetchColumn() > 0) 
                    {
                    $_SESSION['esito'] = 5;
                    $loc = "location:index.php?".$_SESSION['location']."";
                    header($loc);
                    }
          }
     }
          
// analisi scelte
switch ($azione)
{      

// inserimento =====================================================================================
    case 'nuovo':
 //   bottoni gestione
$param  = array('nuovo','ritorno');    
$btx    = new bottoni_str_par_new('Nuovo versamento','ver','write_ver.php',$param);  
     $btx->btn();

    {
// lato sinistro comune  
     // contenitore
     echo     "<div class='container form-horizontal'>"; 
     echo     "<div class='row container'>";
     echo     "<div class='col-md-6'>";  
     echo  "<fieldset><legend>Anagrafica</legend>";
     include('post_isc.php');  
     
       
    $sql="SELECT * FROM `".DB::$pref."isc` 
          WHERE id = $id";
          foreach($PDO->query($sql) as $row)                
          {
          include('fields_isc.php'); 
          $fa = new input(array($numero_iscrizione,'numero_iscrizione',5,'Elargitore N.','','rb'));   
          $fa->field();     
          $fd = new input(array($cognome,'cognome',33,'Cognome','','r'));                          
          $fd->field();
          $fe = new input(array($nome,'nome',33,'Nome','','r'));                          
          $fe->field(); 
          $ff = new input(array($note,'note',33,'Note','','r'));
          $ff->field();
          }
     echo  "</fieldset>";                                                                 
     echo "</div>"; 

// lato destro                                                           
     echo     "<div class='col-md-6'>"; 
     echo  "<fieldset><legend>Versamenti</legend>";
     $f6 = new input(array($vanno,'vanno',6,'Anno','Anno di riferimento','rb'));                      
          $f6->field();
     $f3 = new input(array($numero_iscrizione,'vnume',10,'','','h'));       
          $f3->field();
     $f4 = new input(array(date("d-m-Y"),'vdata',11,'Data','Data del versamento','d1'));              
          $f4->field();
     $n  = number_format(20,2,',','');    // edit decimale
     $f5 = new input(array($n,'vimporto',10,'Importo','','ir'));                   
          $f5->field();
     $tb = new DB_tip_i('pag','vmezzo','','A mezzo','');               
          $tb->select();
     $f9 = new input(array('','vrife',30,'Banca','','i'));                  
          $f9->field();
     $f2 = new input(array('','vassnum',30,'N.ro assegno','','i'));               
          $f2->field();
     echo  "</fieldset>";
     echo  "</div></div></div>";
     echo  "</form>";
      break;
     }      
// ricerca per: modifica-cancella  ================================================================   
    case 'cerca':
     echo     "<div class='container form-horizontal'>";
 //   bottoni gestione
$param  = array('modifica','cancella','ritorno');    
$btx    = new bottoni_str_par('Ricerca versamenti','ver','upd2_ver.php',$param);  
               $btx->btn();

// zona messaggi
include_once('msg.php');
    {
// lato sinistro comune    
     // contenitore
     echo     "<div class='row container'>";
     echo     "<div class='col-md-6'>";  

     echo  "<fieldset><legend>Anagrafica</legend>";
     include('post_ela.php');    
          $sql="SELECT * FROM `".DB::$pref."isc` 
                WHERE id = $id";
          foreach($PDO->query($sql) as $row)
          {
          include('fields_isc.php'); 
          $fa = new input(array($numero_iscrizione,'numero_iscrizione',5,'Iscritto N.','','rb'));   
          $fa->field();     
          $fd = new input(array($cognome,'cognome',25,'Cognome','','r'));                          
          $fd->field(); 
          $fe = new input(array($nome,'nome',25,'Nome','','r'));                          
          $fe->field(); 
          }
     echo  "</fieldset>";                                                                 
     echo "</div>"; 


// versamenti
     echo     "<div class='col-md-6'>";  
     echo  "<fieldset><legend>Versamenti</legend>";
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction();  
     $sqlv = "SELECT * FROM `".DB::$pref."ver`
              WHERE `vnume` = $numero_iscrizione
              ORDER BY `vdata` ";
          foreach($PDO->query($sqlv) as $row)
          {
          include 'fields_ver.php';
          $f1 = new fieldi($vid,'vid',2);             
               $f1->field_ck();
          $f5 = new fieldi($vprog,'vprog',5);         
               $f5->field_r();
          $f3 = new fieldi($vdata,'vdata',10);        
               $f3->field_r();
          $f4 = new fieldi(number_format($vimporto,2,',',''),'vimporto',10);         
                $f4->field_r();
          $f6 = new fieldi($vanno,'vanno',6);         
               $f6->field_r();
    echo "<br />";
    }     
     echo  "</fieldset>";
     echo "</div></div>";
     echo "</div>";
     echo  "</form>";
     break;
    }

          $loc = "location:index.php?".$_SESSION['location']."";
     header($loc);                              
     break;      
 
case 'chiudi':
          $_SESSION['esito'] = 2;
    		header('location:index.php?forma=Home&sub=&content=htm&dati=widget.php&pag=');  
          break;
               
default:        echo "Operazione invalida";    
}
ob_end_flush();       
echo "</html>";           
?>                     