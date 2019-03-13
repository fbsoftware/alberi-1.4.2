<?php
class PDF extends FPDF
{
function Header()
{   global $title;
    $this->SetFont('Arial','B',15);          
//    $this->SetX(0);                             
    $this->SetDrawColor(80,80,80);                // bordo
    $this->SetFillColor(136,136,136);             // background 
    $this->SetTextColor(255,255,255);             // testo
    $this->SetLineWidth(.1);                      // spessore linea (0,1 mm)
    $this->SetX(20);    
    $this->Cell(180,9,$title,1,1,'C',1);  
    $this->Image('images/logo/logo.png',2,3,15,18);           
    $this->Ln(1); 
// intestazione colonne 
    $this->SetTextColor(0,0,0);                  
    $this->SetFont('arial','B',10);
    $this->SetX(10);
    $this->Cell(10,5,'Num.');
    $this->Cell(45,5,' Cognome e Nome');       
    $this->Cell(45,5,' Indirizzo');
    $this->Cell(12,5,' Cap');               
    $this->Cell(30,5,'Località');               
    $this->Cell(6,5,'Pr.');
    $this->Cell(21,5,'Telefono');
    $this->Cell(21,5,'Cellulare');                              
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
    $this->SetDrawColor(80,80,80);                // bordo
    $this->SetFillColor(136,136,136);             // background 
    $this->SetTextColor(255,255,255);             // testo
    $this->SetLineWidth(.1);                      // spessore linea (0,1 mm)
    $this->now = date ('d/m/Y');
    $this->Cell(190,5,'Stampato in data: '.$this->now.' Pagina '.$this->PageNo(),1,1,'R',1); 
    }  

}
?>
