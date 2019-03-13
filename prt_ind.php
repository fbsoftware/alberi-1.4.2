<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa breve - INDIRIZZI
=============================================================================  */
include_once('classi/DB.php'); 

$azione   = $_POST['submit']; 
$ordine   = $_POST['ordine']; 
$stampa   = $_POST['stampa'];  // categoria
$dec      =    new DB_decod2('xdb','xstat','xtipo','xcod','ind',$stampa,'xdes');
$decod    =    $dec->decod2();
$db1      = new DB('sito');      $db1->openDB();
$page_title    = DB::$page_title;       // titolo della pagina
  
   switch ($azione) 
   {
   case 'ritorno': 
   $loc = "location:index.php?urla=widget.php&pag=";
        header($loc);                          
   break;
 
   default:
define('FPDF_FONTPATH','font/');
require('fpdf.php');
//===   GESTIONE PDF   =======================================================================
class PDF extends FPDF
{

function Header()
{   global $title;
    $this->SetFont('courier','B',15);          
    $w=280;                                       
    $this->SetDrawColor(80,80,80);                
    $this->SetFillColor(136,136,136);             
    $this->SetTextColor(255,255,255);             
    $this->SetLineWidth(.1); 
    $this->SetX(20); 
    $this->Cell(($w-8),9,$title,1,1,'C',1); 
    $this->Image('images/logo/logo.png',2,3,15,18) ;
    $this->Ln(1);                                 
// intestazione colonne
    $this->SetTextColor(0,0,0);
    $this->SetFont('courier','B',10);
    $this->Cell(10,5,'Num.');  
    $this->Cell(100,5,'Società / Cognome e Nome');    
    $this->Cell(70,5,'Indirizzo');  
    $this->Cell(90,5,'Cap Località e Provincia');
    $this->Cell(10,5,'St.');               
    $this->Ln(5);
//riga               
    $this->SetX(10);
    $this->Cell($w,.5,'',1,1,'C',1);             
    $this->Ln(3);
    }                          
function Footer()
    {   
    $this->SetY(-15);                  //Position at 1.5 cm from bottom
    $this->SetFont('courier','I',8);                         
    $this->SetDrawColor(80,80,80);               
    $this->SetFillColor(136,136,136);             
    $this->SetTextColor(255,255,255);            
    $this->SetLineWidth(.1);                     
    $this->now = date ('d/m/Y');
    $this->Cell($w,5,'Stampato in data: '.$this->now.'     Pagina '.$this->PageNo(),1,1,'R',1);  
    $this->Ln(3);                               
    }
}
//=============================================================================================

$pdf=new PDF('L','mm');
$pdf->Open();
$pdf->SetTextColor(0,0,0);
$title=$page_title." - Elenco INDIRIZZI : ".$decod;   
$pdf->AddPage();   
$pdf->SetTitle($title);
$pdf->SetFont('arial','',10); 
$pdf->SetAutoPageBreak(true,15);
 
switch ($stampa) 
{
case 9:
// scelta ordinamento per tutti

        switch ($ordine)                          
        {
        case 'alfa':
        $sql="SELECT * FROM `".DB::$pref."ind` 
              WHERE stato != 'A' 
              ORDER BY RagioneSociale";        
              break;
        case 'nume':
        $sql="SELECT * FROM `".DB::$pref."ind` 
              WHERE stato != 'A' 
              ORDER BY numero";        
        break;
        }  

	break;
default:
// scelta ordinamento per categoria
        switch ($ordine)                          
        {
        case 'alfa':
        $sql="SELECT * FROM `".DB::$pref."ind` 
              WHERE stato != 'A' and stampa = ".$stampa."
              ORDER BY RagioneSociale";        
              break;
        case 'nume':
        $sql="SELECT * FROM `".DB::$pref."ind` 
              WHERE stato != 'A' and stampa = ".$stampa."
              ORDER BY numero";        
        break;
        }  
	
	break;
} 
echo $sql;//debug
// lettura dati
          $res2 = mysql_query($sql);
          if (!$res2) die('prt_ind:'.mysql_error());
          while($row = mysql_fetch_array($res2))  
                 { 
                 include('fields_ind.php'); 
                 if ($provincia <= '0 ')   $provincia = '  '; 
                 if ($cap <= '0 ')   $cap = '-----';             
                 $pdf->Cell(10,5,$numero);  
                 $pdf->Cell(100,5,substr($RagioneSociale,0,49)); 
                 $pdf->Cell(70,5,substr($indirizzo,0,27));
                 $pdf->Cell(90,5,$cap."  ".strtoupper($localita)."  ".$provincia); 
                 $pdf->Cell(10,5,$stampa);
                 $pdf->Ln(5);
                 }     
$pdf->Output();

 }  

?>
