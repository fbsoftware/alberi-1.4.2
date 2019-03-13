<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa versamenti - ISCRITTI + ELARGITORI
=============================================================================  */
           
define('FPDF_FONTPATH','font/');
require('fpdf.php');
// settaggio modulo
include 'set_ric.php';
// primo modulo
$dat        = new data($vdata);
$vdata      = $dat->flipdata();
$disp       =0;
$registrato ="Registrato al Nr. ........";
$copia      ='Copia per FAEL';
require_once 'funzioni/utility.php';
define('EURO', chr(128));

include 'sup_sx.php';
include 'sup_dx_ver.php';
include 'copia_fael.php';
include 'inf_sx_ver.php';
include 'inf_dx.php';

// secondo modulo
$disp       =150;
$registrato =" ";
$copia      ='';
include 'sup_sx.php';
include 'sup_dx_ver.php';
include 'inf_sx_ver.php';
include 'inf_dx.php';

$pdf->Output();
?>
