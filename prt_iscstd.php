<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa standard - ISCRITTI 
=============================================================================  */
include_once('classi/DB.php');
include_once('classi/data.php');
$db1      = new DB('sito');  $db1->openDB(); 
$azione   = $_POST['submit'];
$adata    = $_POST['adata'];
$dd2      = new data($_POST['adata']); 
$data     =$dd2->flipData($_POST['adata']); 
$n = 0;
// uscita
    switch ($azione)
     {
     case 'ritorno': 
          {  
          $loc = "location:index.php?urla=widget.php&pag=";
          header($loc);
          break;   }  
     } 
             
define('FPDF_FONTPATH','font/');
require('fpdf.php');

//===   GESTIONE PDF   =======================================================================
class PDF extends FPDF
{
function Header()
{   global $title;
    $this->SetFont('Arial','B',15);          
    $this->SetX(20);                              //  and position
    $this->SetDrawColor(0,80,180);                //Colors of frame , 
    $this->SetFillColor(200,220,255);             //  background ,
    $this->SetTextColor(255,255,255);             //  and text
    $this->SetLineWidth(.1);                      //Thickness of frame (0,1 mm)
    $this->Cell(260,9,$title,1,1,'C',1);           //Title
    $this->Image('images/logo/logo.png',2,3,15,18);  
    $this->Ln(1); 
// intestazione colonne 
    $this->SetTextColor(0,0,0);             //  and text      
    $this->SetFont('arial','B',10);
    $this->SetX(20);
    $this->Cell(10,5,'Num.');
    $this->Cell(45,5,' Cognome e Nome');       
    $this->Cell(45,5,' Indirizzo');
    $this->Cell(12,5,' Cap');               
    $this->Cell(30,5,'Località');               
    $this->Cell(6,5,'Pr.');
    $this->Cell(21,5,'Telefono');
    $this->Cell(21,5,'Cellulare'); 
    $this->Cell(30,5,'Codice Fiscale');
    $this->Cell(45,5,'   E-mail');
    $this->Cell(10,5,'Progr');                             
    $this->Ln(5);
//riga               
    $this->SetX(20);
    $this->Cell(280,.3,'',1,1,'C',1);           
    $this->Ln(3);    
     }                        
function Footer()
    { 
    $this->SetXY(0,-15);                    //Position at 1.5 cm from bottom
    $this->SetFont('Arial','I',6);          //Arial italic 8
    $this->SetDrawColor(0,80,180);          //Colors of frame , 
    $this->SetFillColor(200,220,255);       //  background ,
    $this->SetTextColor(0,0,0);             //  and text
    $this->SetLineWidth(.1);                //Thickness of frame (0,1 mm)
    $this->now = date ('d/m/Y');
    $this->Cell(280,5,'Stampato in data: '.$this->now.'     Pagina '.$this->PageNo(),1,1,'R',1); 
    }  

}
//=============================================================================================

$pdf=new PDF('L','mm');
$pdf->Open();
$pdf->SetTextColor(0,0,0); 
$title=DB::$page_title." - ISCRITTI - Elenco principale al ".$adata."";
$pdf->AddPage();   
$pdf->SetTitle($title);
$pdf->SetFont('arial','',10); 
$pdf->SetAutoPageBreak(true,15);
 
// scelta ordinamento
        switch ($_POST['ordine'])                          
        {
        case 'alfa':
 echo          $sql="SELECT * FROM `".DB::$pref."isc` 
                 WHERE stato = 'I' 
                 and data_iscrizione <= '$data'
                 ORDER BY cognome,nome";
        break;
        case 'nume':
echo           $sql="SELECT * FROM `".DB::$pref."isc` 
                 WHERE stato = 'I' 
                 and data_iscrizione <= '$data'
                 ORDER BY numero_iscrizione";
        break;
        }  
 
// lettura dati
                 
           $res2 = mysql_query($sql);
           if (!$res2) die('prt_isc:'.mysql_error());
          while($row = mysql_fetch_array($res2))  
            { 
            	$n ++;
                include('fields_isc.php'); 
               $pdf->SetX(20);                  
               $pdf->Cell(10,4.5,$numero_iscrizione);
               $nc = $cognome." ".$nome;               
               $pdf->Cell(45,4.5,substr($nc,0,25));  
               $pdf->Cell(45,4.5,substr($indirizzo,0,25));
               $pdf->Cell(12,4.5,$cap);               
               $pdf->Cell(30,4.5,strtoupper(substr($localita,0,14)));              
               $pdf->Cell(6,4.5,$prov);           
               $pdf->Cell(21,4.5,$telefono); 
               $pdf->Cell(21,4.5,$cellulare); 
               $pdf->SetFont('arial','',8);                            
               $pdf->Cell(30,4.5,strtoupper($cod_fisc));
               $pdf->SetFont('arial','',10);
               $pdf->Cell(50,4.5,$email);
                if ($tipologia <= 1 || $tipologia > 5)  $tip='Ordi.';  
                elseif ($tipologia == 2)                $tip='Sost.';
                elseif ($tipologia == 3)                $tip='Fond.';                                                                          	
                elseif ($tipologia == 4)                $tip='Bene.';                                                                         
                elseif ($tipologia == 5)                $tip='Onor.';                
               $pdf->Cell(10,4.5,$n);
               $pdf->Ln(4);
}


$pdf->Output();

?>
