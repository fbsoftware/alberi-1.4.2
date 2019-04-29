<?php   session_start();
/*** Fausto Bresciani   fbsoftware.bresciani@gmail.com  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2013 - 2014 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * 
=============================================================================  */
$tipo= $_SESSION['pag'];
include_once('classi/DB.php');
$db1      = new DB('sito');  $db1->openDB();  DB::config();

$dbhost = DB::$a;
$dbuser = DB::$b;
$dbname = DB::$c;
$dbpass = DB::$p;
try  {
     $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
     } catch(PDOException $e) { echo $e->getMessage();  }

$cmd = 'SELECT * FROM '.DB::$pref.'isc
          WHERE numero_iscrizione >=  :term and stato= "'.$tipo.'" 
          ORDER BY numero_iscrizione ASC LIMIT 15';
$term = $_GET['term'] . "%";
$result = $conn->prepare($cmd);
$result->bindValue(":term", $term);
$result->execute();
$return_arr = array();
$row_array = array();

 while ($row = $result->fetch(PDO::FETCH_ASSOC))
     {
        $row_array['id'] = $row['id'];
        $row_array['nome'] = $row['nome'];
        $row_array['value'] = $row['numero_iscrizione']."  ".$row['cognome']."  ".$row['nome'];
        $row_array['cognome'] = $row['cognome'];
        $row_array['numero'] = $row['numero_iscrizione'];
        array_push($return_arr,$row_array);
     }
$conn = NULL;
echo json_encode($return_arr);
