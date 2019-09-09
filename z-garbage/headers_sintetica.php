<?php
class PDF extends FPDF
{
function Header()
{   global $title;
    $this->SetFont('Arial','B',15);          
    $this->SetX(0);                             
    $this->SetDrawColor(0,80,180);                // Color of frame 
    $this->SetFillColor(200,220,255);             //  background 
    $this->SetTextColor(255,255,255);         
    $this->SetLineWidth(.1);                      //Thickness of frame (0,1 mm)
    $this->SetX(20);    
    $this->Cell(180,9,$title,1,1,'C',1);  
    $this->Image('images/logo/logo.png',0,3,15,18);           
    $this->Ln(1); 
// intestazione colonne 
    $this->SetTextColor(0,0,0);                  
    $this->SetFont('arial','B',10);
    $this->SetX(0);
    $this->Cell(70,5,'Num. Cognome e Nome  ');
    $this->Cell(70,5,'Num. Cognome e Nome  ');
    $this->Cell(70,5,'Num. Cognome e Nome  ');
    $this->Ln(5);
//riga               
    $this->SetX(0);
    $this->Cell(190,.3,'',1,1,'C',1);           
    $this->Ln(3);    
     }                        
function Footer()
    { 
    $this->SetXY(0,-10);                   // Position at 1 cm from bottom
    $this->SetFont('Arial','I',6);                        
    $this->SetDrawColor(0,80,180);         // Color of frame 
    $this->SetFillColor(200,220,255);      //  background 
    $this->SetTextColor(0,0,0);            
    $this->SetLineWidth(.1);               //Thickness of frame (0,1 mm)
    $this->now = date ('d/m/Y');
   $this->Cell(190,5,'Stampato in data: '.$this->now.' Pagina '.$this->PageNo(),1,1,'R',1); 
    }  

}
?>
