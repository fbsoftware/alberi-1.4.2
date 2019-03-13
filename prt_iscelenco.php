<?php  session_start(); 
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.2    
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template. 
   * ------------------------------------------------------------------------
   * Stampa elenco iscritti 
============================================================================= */ 
include_once('classi/DB.php');
$db1      = new DB('sito');  $db1->openDB(); 
$azione   = $_POST['submit'];
   switch ($azione) 
   {
   case 'ritorno': 
     $loc = "location:index.php?urla=widget.php&pag=";
     header($loc);                           
   break;
   }   
  
require('fpdf.php');

class PDF extends FPDF
{

var $col = 0;                          // Current column
var $y0  = 28;                         // Ordinate of column start

function Header()
    {   
    global $title;
//    global $intestazione;
    $this->SetFont('Arial','B',15);          
    $this->SetX(0);                             
    $this->SetDrawColor(80,80,80);                // bordo
    $this->SetFillColor(136,136,136);             // background 
    $this->SetTextColor(255,255,255);         
    $this->SetLineWidth(.1);                      //Thickness of frame (0,1 mm)
    $this->SetX(20);    
    $this->Cell(180,9,$title,1,1,'C',1);  
    $this->Image('images/logo/logo.png',2,3,15,18);           
    $this->Ln(1); 
// intestazione colonne 
    $this->SetTextColor(0,0,0);                  
    $this->SetFont('arial','B',10);
    $this->SetX(10);
    $this->Cell(60,5,'Num. Cognome e Nome  ');
    $this->Cell(70,5,'Num. Cognome e Nome  ');
    $this->Cell(70,5,'Num. Cognome e Nome  ');
    $this->Ln(5);
//riga               
    $this->SetX(10);
    $this->Cell(190,.3,'',1,1,'C',1);           
    $this->Ln(3);    
     }                        
function Footer()
    { 
    $this->SetXY(10,-10);                   // Position at 1 cm from bottom
    $this->SetFont('Arial','I',8);                        
    $this->SetDrawColor(80,80,80);         // Color of frame 
    $this->SetFillColor(136,136,136);             // background 
    $this->SetTextColor(255,255,255);             // testo
    $this->SetLineWidth(.1);               //Thickness of frame (0,1 mm)
    $this->now = date ('d/m/Y');
    $this->Cell(190,5,'Stampato in data: '.$this->now.' Pagina '.$this->PageNo(),1,1,'R',1); 
    }  

function SetCol($col)
{
    // Set position at a given column
    $this->col = $col;
    $x = $col*70;
    $this->SetLeftMargin($x);
    $this->SetX($x);
}

function AcceptPageBreak()
{
    // Method accepting or not automatic page break
    if($this->col<2)
    {
        // Go to next column
        $this->SetCol($this->col+1);
        // Set ordinate to top
        $this->SetY($this->y0);         
        // Keep on page
        return false;
    }
    else
    {
        // Go back to first column
        $this->SetCol(0);     
        $this->SetX(10);
        // Page break
        return true;
    }
}

function FileBody($file)
{
    // Read text file
    $txt = file_get_contents($file);       
    $this->SetFont('Arial','',10);                  
    $this->MultiCell(60,5,$txt);                    // Output text in a 6 cm width column
    $this->Ln();
    $this->SetFont('','I');                       
    $this->Cell(0,5,'(Fine elenco)');
    $this->SetCol(0);                              // Go back to first column
}

function PrintFile($file)
{
    $this->AddPage();
    $this->FileBody($file);
}
}

// creazione file txt con gli iscritti da stampare su 3 colonne
$handle=fopen("testo.txt","w");   // crea file vuoto o svuota se esiste
fclose($handle);
$hand=fopen("testo.txt","a");     // apre in accodamento
           $sql="SELECT * FROM `".DB::$pref."isc` 
                 WHERE stato = 'I' 
                 ORDER BY cognome,nome";
           $res2 = mysql_query($sql);
           if (!$res2) die('prt_isc:'.mysql_error());
          while($row = mysql_fetch_array($res2))  
            { 
               $cn = substr($row['cognome']."  ".$row['nome'],0,28);
                $riga = $row['numero_iscrizione']."  ".$cn."\n\r";
                fwrite($hand,$riga);
            }

$pdf = new PDF();
$title = DB::$page_title." - Elenco iscritti";
$pdf->SetTitle($title);
$pdf->SetX(10);
$pdf->PrintFile('testo.txt');
$pdf->Output();
fclose($hand);
?>
