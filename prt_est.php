<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.0   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa - ELARGITORI - abbreviata
=============================================================================  */
echo "<!DOCTYPE html>";
echo  "<link rel='stylesheet' type='text/css' href='CSS/style.css' media='screen'>";
echo  "<link rel='stylesheet' type='text/css' href='CSS/style_p.css' media='print'>";
include_once('classi/DB.php');

$db1      = new DB('sito');  $db1->openDB();  DB::config();             

define('FPDF_FONTPATH','font/');
require('fpdf.php');

//===   GESTIONE PDF   =======================================================================
class PDF extends FPDF
{
function Header()
{   global $title;
    $this->SetFont('courier','B',15);          
//    $w=$this->GetStringWidth($title)+80;        //Calculate width of title 
    $w=190;                                       //Calculate width of title
//    $this->SetX((210-$w)/20);                   //  and position
    $this->SetX(10);                              //  and position
    $this->SetDrawColor(0,80,180);                //Colors of frame , 
    $this->SetFillColor(200,220,255);             //  background ,
    $this->SetTextColor(255,255,255);             //  and text
    $this->SetLineWidth(.1);                      //Thickness of frame (0,1 mm)
    $this->Cell($w,9,$title,1,1,'C',1);           //Title
    $this->Ln(3);         }                       //Line break   
function Footer()
{   $this->SetY(-15);                                       //Position at 1.5 cm from bottom
    $this->SetFont('courier','I',6);                          //Arial italic 8
    $this->SetDrawColor(0,80,180);                //Colors of frame , 
    $this->SetFillColor(200,220,255);             //  background ,
    $this->SetTextColor(0,0,0);             //  and text
    $this->SetLineWidth(.1);                      //Thickness of frame (0,1 mm)
    $this->now = date ('d/m/Y');
    $this->Cell($w,5,'Stampato in data: '.$this->now.'     Pagina '.$this->PageNo(),1,1,'R',1); }  //Page number
}
//=============================================================================================

$pdf=new PDF();
$pdf->Open();
$pdf->SetFont('courier','',9);
//$pdf->FontSizePt=12;
$pdf->SetTextColor(0,0,0); 
$title='Associazione FAEL - ELARGITORI - Elenco breve';
$pdf->AddPage();   
$pdf->SetTitle($title);
$pdf->SetFont('courier','B',9);
               $pdf->Cell(5,5,'Num.');
               $pdf->Cell(55,5,'Società / cognome e Nome');       
               $pdf->Cell(55,5,'Indirizzo');
               $pdf->Cell(10,5,'Cap');               
               $pdf->Cell(30,5,'Località');               
               $pdf->Cell(5,5,'Pr.');
               $pdf->Cell(20,5,'Telefono');
               $pdf->Ln(5);
               $pdf->Cell($w,.5,'',1,1,'C',1);           //riga
$pdf->SetFont('courier','',7); 
// lettura dati
           $sql="SELECT * FROM `".DB::$pref."est` ";
           $res2 = mysql_query($sql);
           if (!$res2) die('prt_ela:'.mysql_error());
          while($row = mysql_fetch_array($res2))  
            { 
                include('fields_esterni.php');   
                //   $pdf->MultiCell(60,5,$numero);
               $pdf->Cell(5,5,$numero);  
               $pdf->Cell(10,5,$cap);  
               $pdf->Cell(20,5,$telefono);               
                           
               $pdf->Cell(55,5,$RagioneSociale);  
               $pdf->Cell(55,5,$indirizzo);
               
             $pdf->Cell(30,5,strtoupper($localita));             
               $pdf->Cell(5,5,$provincia);           
           
               
             $pdf->Ln(5);
               $pdf->Cell($w,.01,'',1,1,'C',1);         
               $pdf->Ln(5);                         
            }                 




$pdf->Output();
$pdf->exit();
?>