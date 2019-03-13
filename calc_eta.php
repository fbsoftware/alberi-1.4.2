<?php
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Calcola componenti per età
=============================================================================  */
 
// scelta giovani
     $sql="SELECT nascita_data,cognome FROM `".DB::$pref."isc` 
           WHERE stato = 'I' and nascita_data > STR_TO_DATE($data1,'%Y,%m,%d')";
     $num = 0;           
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sql) as $row)
     {   $num ++;  } 
     
// scelta adulti
     $sql="SELECT nascita_data,cognome FROM `".DB::$pref."isc`
           WHERE stato = 'I' and nascita_data > STR_TO_DATE($data2,'%Y,%m,%d') and nascita_data < STR_TO_DATE($data1,'%Y,%m,%d')";
     $num2 = 0;
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sql) as $row)
     {   $num2 ++;  }
     
// scelta anziani
$sql="SELECT nascita_data,cognome FROM `".DB::$pref."isc`
                 WHERE stato = 'I' and nascita_data < STR_TO_DATE($data2,'%Y,%m,%d')";
     $num3 = 0;
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
     foreach($PDO->query($sql) as $row)
     {   $num3 ++;  }

$tot = $num + $num2 + $num3;
// calcola %
$perc = ($num*100)/$tot;
$perc =  number_format($perc,1,',','');    // edit decimale
$perc2 = ($num2*100)/$tot;
$perc2 =  number_format($perc2,1,',','');    // edit decimale
$perc3 = ($num3*100)/$tot;
$perc3 =  number_format($perc3,1,',','');    // edit decimale
