<?php session_start();      ob_start();   
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================
   * Gestione versamenti elargitori - inserimento e ricerca
   * 07/10/2017     gestione evento
============================================================================= */
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione versamenti iscritti');
     $head->getBootHead(); 

//print_r($_POST);//debug
include_once('post_vel.php');
$azione   =$_POST['submit'];      
 
// analisi scelte
switch ($azione)
{ 
// inserimento =====================================================================================
    case 'nuovo':
 //   bottoni gestione
$param  = array('nuovo','ritorno');    
$btx    = new bottoni_str_par_new('ELARGITORI - versamento','vel','write_vel.php',$param);  
     $btx->btn();
    {
// lato sinistro comune    
     echo "<div class='col-md-6'>";
     echo  "<fieldset><legend> Anagrafica </legend>";
     include('post_ela.php');    
     $sql="SELECT * FROM `".DB::$pref."ela` 
           WHERE id = $id";
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
      foreach($PDO->query($sql) as $row)
          {
          include('fields_ela.php'); 
          $fa = new input(array($numero,'numero',5,'Elargitore N.',' ','rb'));   
               $fa->field();     
          $fd = new input(array($RagioneSociale,'RagioneSociale',40,'Nome/Rag.Sociale',' ','r'));
               $fd->field(); 
          }
     echo  "</fieldset>";                                                                 
     echo "</div>"; 

// lato destro                                                           
     echo "<div class='col-md-6'>"; 
     echo  "<fieldset><legend> Versamenti </legend>";
     $f3 = new input(array($numero,'enume',10,'Numero Elargitore','','h'));       
          $f3->field();
     $f4 = new input(array(date("d-m-Y"),'edata',11,'Data','','d1'));              
          $f4->field();
     $f5 = new input(array(0,'eimporto',10,'Importo','','ir'));                   
          $f5->field();
     $tb = new DB_tip_i('pag','emezzo','','A mezzo','Metodo di pagamento');             
          $tb->select();
     $f9 = new input(array('','erife',30,'Riferimento','Nome della banca','i'));                  
          $f9->field();
     $f0 = new input(array('','eassnum',30,'Numero','numero assegno o altri dati','i'));                     
          $f0->field();
     $fw = new input(array('','ecausale',40,'Causale speciale','Causale che si sostituisce a quella standard','i'));                     
          $fw->field();
     $f6 = new input(array('','enota',50,'Nota','Altri eventuali dati','i'));                      
          $f6->field(); 
     $tc = new DB_tip_i('eve','evento','','Evento','Se si tratta di uno degli eventi previsti');                  
          $tc->select();
     echo  "</fieldset>";
     echo  "</div>";
     echo  "</form>";
      break;
     }      
// ricerca per: modifica-cancella  ================================================================   
    case 'cerca':  
    
 //   bottoni gestione
 $param  = array('modifica','cancella','ritorno');    
 $btx    = new bottoni_str_par('Ricerca versamenti','vel','upd2_vel.php',$param);  
        $btx->btn();

// zona messaggi
include_once('msg.php');

    {
// lato sinistro comune    
     echo "<div class='col-md-6'>";
     echo  "<fieldset><legend> Anagrafica </legend>";
     include('post_ela.php');    
          $sql="SELECT * FROM `".DB::$pref."ela` 
                WHERE id = $id";
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
      foreach($PDO->query($sql) as $row)                
          {
          include('fields_ela.php'); 
          $fa = new input(array($numero,'numero',5,'Elargitore N.',' ','rb'));   
               $fa->field();     
          $fd = new input(array($RagioneSociale,'RagioneSociale',40,'Nome o Rag.Soc.',' ','r'));                          
               $fd->field(); 
          }
     echo  "</fieldset>";                                                                 
     echo "</div>"; 


// versamenti
     echo "<div class='col-md-6'>"; 
     echo  "<fieldset><legend> Versamenti </legend>";
     $sqlv = "SELECT * FROM `".DB::$pref."vel`
              WHERE `enume` = $numero 
              ORDER BY `edata` "; 
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
      foreach($PDO->query($sqlv) as $row)  
     {
     include 'fields_vel.php';
    	$f1 = new fieldi($eid,'eid',2);             
    		$f1->field_ck();
     $f5 = new fieldi($eprog,'eprog',5);         
		$f5->field_r();   
    	$f3 = new fieldi($edata,'edata',10);        
    		$f3->field_r();
    	$f4 = new fieldi(number_format($eimporto,2,',',''),'eimporto',10);         
    		$f4->field_r();
    	$f6 = new fieldi($enota,'enota',40);        
    		$f6->field_r();
    echo "<br />";
    }     
     echo  "</fieldset></div>";
     echo  "</form>";
     break;
    }

     case 'chiudi' :
          { 
     $loc = "location:index.php?urla=widget.php&pag=";
     header($loc);                                   
          break;      
          } 

    default:        echo "(".$azione.")-Operazione invalida";    
}
ob_end_flush();
echo "</html>";
?>
