<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa breve - VERSAMENTI ISCRITTI ANNUALI
=============================================================================  */
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>"; 

$azione    =$_POST['submit']; 

if ($azione == 'ritorno') {
     $loc = "location:index.php?urla=widget.php&pag=";
     header($loc);                          
}         
$dadata = $_POST['anno']."-01-01"; 
$adata  = $_POST['anno']."-12-31"; 

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
    $this->Cell(55,5,'Cognome e Nome');
    $this->Cell(75,5,'Indirizzo,Cap e Località');  
    $this->Cell(20,5,'Data');
    $this->Cell(20,5,'  A mezzo');
    $this->Cell(25,5,'   Importo');
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
$title= "VERSAMENTI ANNUALI ISCRITTI ".$_POST['anno']." ";
$pdf->AddPage();   
$tot = 0.00;
$pdf->SetFont('arial','',8);
// lettura dati
$sql = "SELECT * FROM `tbl_isc` as e , `tbl_ver` as v
        WHERE (e.numero_iscrizione = v.vnume) and (v.vdata >= '$dadata')  and (v.vdata <= '$adata')
        ORDER BY v.vdata";
// transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sql) as $row)
                 { 
                 include('fields_isc_p.php');
                 include('fields_ver.php');
                 $pdf->Cell(55,5,substr($cognome."  ".$nome,0,35));
                 $pdf->Cell(80,5,substr($indirizzo,0,30)."  -  ".$cap." ".strtoupper($localita));
                 $pdf->Cell(20,5,$vdata);
                 $pdf->Cell(10,5,$vmezzo);
                 $pdf->Cell(25,5,number_format($vimporto,2,',','.'),0,0,R);
                 $tot = $tot + $vimporto;          // conteggio
                 $pdf->Ln(5);
                 }
                 $pdf->SetFont('arial','B',8);                  
                 $pdf->Cell(180,5,'Totale Euro: ',0,0,R);
                 $pdf->Cell(15,5,number_format($tot,2,',','.'),1,0,R);                     
$pdf->Output();
?>
