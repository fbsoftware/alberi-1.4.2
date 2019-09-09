<?php session_start();      ob_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Onlus gestione iscritti
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= 
   * 
============================================================================= */
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('connectDB.php');

// DOCTYPE & head
$app = new Head('Gestione iscritti');
$app->openHead();
require_once('include_head.php');
require_once('jquery_link.php');
require_once('bootstrap_link.php');
require_once('lingua.php');
$app->closeHead();
echo "<body>";
// parametri passati con l'url e memorizzati per iframe
include 'request.php';
$tipo = $_SESSION['pag']; 

$_SESSION['pag'] = $pag;      // vedi: include 'request.php'; !!??
   
// test se richiesto login
     if(!isset($_COOKIE['admin']))
          {header('location:login.php');}
//     else
//          {setcookie('admin','admin',time()-1,'','','');}

// pulisce navigatore scelto    
include('moduli/path_a.php'); 
	$con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
	$PDO = new PDO($con,DB::$user,DB::$pw);
	$PDO->beginTransaction();      
	$sql = "UPDATE ".DB::$pref."nav 
			SET nselect=0 
			WHERE nmenu='".TMP::$ttdesc."' ";     
     $PDO->exec($sql);    
     $PDO->commit(); 
	$con = NULL;

// legge la prima voce se manca 
if($forma=='')    
{
	$sql = "SELECT * FROM `".DB::$pref."nav` 
			ORDER BY `nprog` limit 1";   
	$con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
	$PDO = new PDO($con,DB::$user,DB::$pw);
	$PDO->beginTransaction(); 
	foreach($PDO->query($sql) as $row)
	{
     $forma    =$row['nli'];
     $sub      =$row['ndesc'];
     }
}
$con = NULL;

// memorizza navigatore corrispondente		    
		$sql = "UPDATE  ".DB::$pref."nav  
				SET  nselect =1 
				WHERE nli='$forma' and nmenu='".TMP::$ttdesc."' ";
          $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
          $PDO = new PDO($con,DB::$user,DB::$pw);
          $PDO->beginTransaction(); 
          $PDO->exec($sql);    
          $PDO->commit(); 
		$con = NULL;
		
// H E A D E R  =====================================
include_once('moduli/header_a.php');       

//  N A V I G A T O R E   ===========================
echo    "<nav>";        

if  (TMP::$tmenu == 'admin') {	include('moduli/nav2.php'); }	

//  bottone logout
echo "<div class='bottoni'>";
echo "<form class='bottoni' method='post' action='login.php'>";
echo "<button class='big' type='submit' name='submit' value='logout'>        
      <img src='images/exit.png' height='30'/>Logout</button>";
echo  "</form>";
echo "</div>";
        
echo    "</nav>";    
    //  C O R P O   =====================================             
echo "<section id='corpo' class='container'>"; 
$pos = $tmp->col2;  
if ($urla){
          include $urla;
          } 
if ($dati){
          include('component/content.php');    // componenti
          }       
echo "</section>" ;      //  FINE CORPO
  
//  footer + navigatore   ============================================= 
include('moduli/footer.php'); 
                               
ob_end_flush();
echo "</body></html>";        
?>
