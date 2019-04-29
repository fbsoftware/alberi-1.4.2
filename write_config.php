<?php   ob_start();
/** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.4   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
==============================================================================
   * manutenzione config.ini 
   1.0.0 tolto debug,path help e testi,contenuto
         aggiunto libreria classi standard, autore e keywords 
==============================================================================*/
$azione  =$_POST['submit']; 
print_r($_POST);//debug

switch ($azione)
{
case 'ritorno':
          header('location:index.php?forma=Home&sub=&content=htm&dati=widget.php&pag=');
      	break;
                      
default:
// acquisizione e creazione config.ini
require 'classi/FileIni.class.php';                
$options=array('autoSave'=>true, 'readOnly'=>false);  
$file=new FileIni("config.ini", $options);

$file->setValue('versione', 'livello'  ,  $_POST['livello']);
$file->setValue('versione', 'rilascio' ,  $_POST['rilascio']);
$file->setValue('versione', 'modifica' ,  $_POST['modifica']);

$file->setValue('DB', 'root', $_POST['root']);
$file->setValue('DB', 'host', $_POST['host']);
$file->setValue('DB', 'user', $_POST['uten']);
$file->setValue('DB', 'pw'  , $_POST['pw']);
$file->setValue('DB', 'db'  , $_POST['db']);
$file->setValue('DB', 'pref', $_POST['pref']);

$file->setValue('config', 'site'     , $_POST['site']);
$file->setValue('config', 'author'  ,  $_POST['author']);
$file->setValue('config', 'keywords' , $_POST['keywords']);
$file->setValue('config', 'dir_imm'  , $_POST['p_imm']);
$file->setValue('config', 'incr',      $_POST['incr']);
$file->setValue('config', 'sep',       $_POST['sep']);
$file->setValue('config', 'page_title',$_POST['home']);
$file->setValue('config', 'lib',       $_POST['lib']);
$file->setValue('config', 'e_mail',    $_POST['mail']);
$file->setValue('config', 'url',       $_POST['url']);

header('location:gest_config.php'); 

 break;
}
ob_end_flush();
?>
