<?php session_start();      ob_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FAEL gestione iscritti
   * versione 1.0    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= 
   * 
============================================================================= */
echo "<!DOCTYPE html><html><head>";
// istanzia le classi -----------------------
include_once('classi/DB.php');
$db1 = new DB('sito');       $db1->openDB(); 
 
// variabili di configurazione 
$pref          = DB::$pref;             // prefisso tabelle
$site          = DB::$site;             // descrizione sito
$page_title    = DB::$page_title;       // titolo della pagina
$livello       = DB::$livello;          // livello
$rilascio      = DB::$rilascio;         // rilascio
$modifica      = DB::$modify;         // modifica

// template attivo
$tmp = new DB_tmp('sito');   $tmp->read_tmp() ;       

// metadati                
echo "<title>'".$page_title."-ADMIN'</title>            
    <meta http-equiv='generator' content='PSPad'>            
    <meta http-equiv='content-type' content='text/html;charset=utf-8'>  	          
    <meta name='created' content='lun, 07 dic 2009 06.55.04 GMT'>              
    <meta name='description' content='amministrazione sito'>              
    <meta name='keywords' content='admin,amministrazione sito,amministratore sito,FB open template'>              
    <meta name='author' content='fbsoftware'>
     <link rel='stylesheet' type='text/css' href='css/style.css'>
     <link rel='stylesheet' type='text/css' href='css/nav2.css'>
     <link href='favicon.ico' rel='shortcut icon' type='image/x-icon'> 
     </head><body class='main'>";	  
// parametri passati con l'url e memorizzati per iframe
include 'request.php';
$_SESSION['pag'] = $pag;      // vedi: include 'request.php'; !!??
// D E B U G      
include('moduli/debug.php');
   
// test se richiesto login
     if(!isset($_COOKIE['admin']))
          {header('location:login.php');}
//     else
//          {setcookie('admin','admin',time()-1,'','','');}
//  setta la voce di menu corrente    
include('moduli/path_a.php');
$sql = "UPDATE ".$pref."nav SET nselect=0 WHERE nmenu='$tmp->desc' "; // pulisce navigatore scelto     
mysql_query($sql); 
if($forma=='')    // legge la prima voce se manca
     {
     $sql      = "SELECT * FROM `".$pref."nav` order by `nprog` limit 1";
     $result   = mysql_query($sql);
     $row      = mysql_fetch_array($result);
     $forma    =$row['nli'];
     $sub      =$row['ndesc'];
     }	    
$sql = "UPDATE  ".$pref."nav  SET  nselect =1 WHERE nli='$forma' and nmenu='$tmp->desc' ";
$result = mysql_query($sql); // memorizza navigatore corrispondente

// H E A D E R  =====================================
include_once('moduli/header_a.php');

//  N A V I G A T O R E   ===========================
echo    "<nav>";     
if  ($menu == 'main_menu') {	include('moduli/nav2.php'); }	
include('moduli/logout.php'); 
echo    "</nav>";    
    //  C O R P O   =====================================             
echo    "<div id='corpo'>"; 
//  colonna 2   ===========================================
echo  "<div id='".$tmp->col2."'>" ;
$pos = $tmp->col2;  
if ($urla){
          echo  "<iframe src='".$urla."'  height='750px' width='100%' ></iframe>";  // iframe
          } 
if ($dati){
          include('component/content.php');    // componenti
          }       
echo  "</div>" ;                 
echo  "</div>" ;
//  FINE CORPO  =======================================================
//  footer + navigatore   ============================================= 
include('moduli/footer.php'); 
                               
ob_end_flush();
echo "</body></html>";        
?>
