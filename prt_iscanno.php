<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa breve - ISCRITTI ANNUALI
=============================================================================  */
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>";  

$azione   = $_POST['submit'];
$anno     = $_POST['anno'];          
$dadata   = $anno."-01-01"; 
$adata    = $anno."-12-31";  
   switch ($azione) 
   {
   case 'ritorno': 
     $loc = "location:index.php?urla=widget.php&pag=";
     header($loc);                          
   break;
   }   
//===   GESTIONE PDF   =======================================================================             
define('FPDF_FONTPATH','font/');
require('fpdf.php');
class PDF extends FPDF
{
function Header()
{   global $title;
    $this->SetFont('courier','B',15);          
    $w=210;
    $this->SetDrawColor(80,80,80);                
    $this->SetFillColor(136,136,136);             
    $this->SetTextColor(255,255,255);            
    $this->SetLineWidth(.1);
    $this->SetX(20);                                                
    $this->Cell(($w-28),9,$title,1,1,'C',1);
    $this->Image('images/logo/logo.png',2,3,15,18) ;             
    $this->Ln(3); 
// intestazione colonne
    $this->SetTextColor(0,0,0);
    $this->SetFont('courier','B',10);
    $this->Cell(15,5,'Numero');
    $this->Cell(55,5,'Cognome e Nome');
    $this->Cell(75,5,'Indirizzo,Cap e Località ');
    $this->Cell(25,5,'Data iscr.');
    $this->Cell(20,5,$anno);
    $this->Cell(20,5,$dadata);
    $this->Cell(25,5,$adata);
    $this->Cell(25,5,$azione);
    $this->Ln(5);
//riga
    $this->Cell($w,.5,'',1,1,'C',1);           
    $this->Ln(5);
                              
    }                          
function Footer()
{   $this->SetY(-15);                                    
    $this->SetFont('courier','I',8);                     
    $this->SetDrawColor(80,80,80);                
    $this->SetFillColor(136,136,136);             
    $this->SetTextColor(255,255,255);            
    $this->SetLineWidth(.1);                     
    $this->now = date ('d/m/Y');
    $this->Cell($w,5,'Stampato in data: '.$this->now.'     Pagina '.$this->PageNo(),1,1,'R',1);  //Page number
    $this->Ln(3);                                
    }
}
//=============================================================================================

$pdf=new PDF('P','mm');
$pdf->Open();
$title= DB::$page_title." - ISCRITTI ANNO ".$_POST['anno']." ";
$pdf->AddPage();   
$tot = 0.00;
$pdf->SetFont('arial','',8);
// lettura dati
$sql = "SELECT numero_iscrizione,cognome,nome,indirizzo,cap,localita,data_iscrizione,stato
	    FROM `tbl_isc` 
        WHERE stato = 'I'
          and data_iscrizione >= '$dadata' 
          and data_iscrizione <= '$adata'
        ORDER BY numero_iscrizione";        
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sql) as $row)                 
                 { 
                 include('fields_isc_p.php');
                 $pdf->Cell(15,5,$numero_iscrizione);
                 $pdf->Cell(55,5,substr($cognome."  ".$nome,0,35));
                 $pdf->Cell(80,5,substr($indirizzo,0,30)."  -  ".$cap." ".strtoupper($localita));
                 $pdf->Cell(15,5,$data_iscrizione);
                 $pdf->Ln(5);
                 $tot ++;
                 }
                 $pdf->Ln(5);
                 $pdf->Cell(30,5,'Totale iscritti anno '.$anno.'');
                 $pdf->Cell(15,5,' numero ');
                 $pdf->Cell(10,5,$tot);
$pdf->Output();
?>
