<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa breve - ELARGIZIONI ANNUALI
   * 1.4.2 
=============================================================================  */
require_once('loadLibraries.php');
require_once('loadTemplateAdmin.php');
require_once('lingua.php');
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
echo "</head>"; 

$page_title    = DB::$page_title;       // titolo della pagina
print_r($_POST);//debug
$azione   = $_POST['submit'];
$dadata   = $_POST['anno']."-01-01";
$adata    = $_POST['anno']."-12-31";
$ordine   = $_POST['ordine'];
$catego   = $_POST['catego'];
$evento   = $_POST['evento'];
$dec      =    new DB_decod2('xdb','xstat','xtipo','xcod','cat',$catego,'xdes');
$decodcat =    $dec->decod2();
$eve      =    new DB_decod2('xdb','xstat','xtipo','xcod','eve',$evento,'xdes');
$decodeve =     $eve->decod2();
// testata da stampare
if ($evento <= '') { $decod = $decodcat; }
else { $decod = $decodeve;	}
 
if ($azione == 'ritorno') {
header('location:widget.php');
}         

//===   GESTIONE PDF   =======================================================================
define('FPDF_FONTPATH','font/');
require('fpdf.php');
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
    $this->Ln(3); 
// intestazione colonne
    $this->SetTextColor(0,0,0);
    $this->SetFont('courier','B',10);
    $this->Cell(75,5,'Società / Cognome e Nome');    
    $this->Cell(45,5,'Indirizzo');  
    $this->Cell(10,5,'Cap');               
    $this->Cell(35,5,'Località');               
    $this->Cell(5,5,'Pr.');
    $this->Cell(20,5,'Data');
    $this->Cell(25,5,'   Importo');
    $this->Cell(45,5,'Note');
    $this->Cell(8,5,'Cat.');
    $this->Cell(7,5,'Eve.');
    $this->Ln(5);
//riga
    $this->Cell($w,.5,'',1,1,'C',1);           
    $this->Ln(5);
                              
    }                          
function Footer()
{    $w=280;
     $this->SetY(-15);
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

$pdf=new PDF('L','mm');
$pdf->Open();
$title=$page_title." - ELARGIZIONI ANNUALI ".$_POST['anno']." : ".$decod."";	
$pdf->AddPage();   
$tot = 0.00;
$pdf->SetFont('arial','',8);

// lettura dati 

 switch ($catego) 
 {
 case 9 :
if ($evento <= ' ') 
{
     if ($ordine == 'data' ) {
     $sql = "SELECT * FROM `tbl_ela` as e , `tbl_vel` as v
        WHERE (e.numero = v.enume) and (v.edata >= '$dadata')  and (v.edata <= '$adata') 
        ORDER BY v.edata";
        }
     elseif  ($ordine == 'impo' )   {
     $sql = "SELECT * FROM `tbl_ela` as e , `tbl_vel` as v
        WHERE (e.numero = v.enume) and (v.edata >= '$dadata')  and (v.edata <= '$adata') 
        ORDER BY v.eimporto desc";
        }
     else {
     $sql = "SELECT * FROM `tbl_ela` as e , `tbl_vel` as v
        WHERE (e.numero = v.enume) and (v.edata >= '$dadata')  and (v.edata <= '$adata') 
        ORDER BY e.RagioneSociale";
      }
} 
else {
     if ($ordine == 'data' ) {
     $sql = "SELECT * FROM `tbl_ela` as e , `tbl_vel` as v
        WHERE (e.numero = v.enume) and (v.edata >= '$dadata')  and (v.edata <= '$adata') 
              and v.evento = '$evento'
        ORDER BY v.edata";
        }
     elseif  ($ordine == 'impo' )   {
     $sql = "SELECT * FROM `tbl_ela` as e , `tbl_vel` as v
        WHERE (e.numero = v.enume) and (v.edata >= '$dadata')  and (v.edata <= '$adata') 
              and v.evento = '$evento'
        ORDER BY v.eimporto desc";
        }
     else {
     $sql = "SELECT * FROM `tbl_ela` as e , `tbl_vel` as v
        WHERE (e.numero = v.enume) and (v.edata >= '$dadata')  and (v.edata <= '$adata') 
              and v.evento = '$evento'        
        ORDER BY e.RagioneSociale";
      }
	
}     
 	break;
     
 default:
if ($evento <= ' ') 
{
if ($ordine == 'data' )   {
     $sql = "SELECT * FROM `tbl_ela` as e , `tbl_vel` as v
        WHERE (e.numero = v.enume) and (v.edata >= '$dadata')  and (v.edata <= '$adata') 
               and e.categoria = '$catego'
        ORDER BY v.edata";
        }
elseif  ($ordine == 'impo' )  {
     $sql = "SELECT * FROM `tbl_ela` as e , `tbl_vel` as v
        WHERE (e.numero = v.enume) and (v.edata >= '$dadata')  and (v.edata <= '$adata') 
               and e.categoria = '$catego'
        ORDER BY v.eimporto desc";
        }
else   {
     $sql = "SELECT * FROM `tbl_ela` as e , `tbl_vel` as v
        WHERE (e.numero = v.enume) and (v.edata >= '$dadata')  and (v.edata <= '$adata') 
               and e.categoria = '$catego'
        ORDER BY e.RagioneSociale";
  	   }
}
else {
if ($ordine == 'data' )   {
     $sql = "SELECT * FROM `tbl_ela` as e , `tbl_vel` as v
        WHERE (e.numero = v.enume) and (v.edata >= '$dadata')  and (v.edata <= '$adata') 
               and e.categoria = '$catego'  and v.evento = '$evento'
        ORDER BY v.edata";
        }
elseif  ($ordine == 'impo' )  {
     $sql = "SELECT * FROM `tbl_ela` as e , `tbl_vel` as v
        WHERE (e.numero = v.enume) and (v.edata >= '$dadata')  and (v.edata <= '$adata') 
               and e.categoria = '$catego' and v.evento = '$evento'
        ORDER BY v.eimporto desc";
        }
else   {
     $sql = "SELECT * FROM `tbl_ela` as e , `tbl_vel` as v
        WHERE (e.numero = v.enume) and (v.edata >= '$dadata')  and (v.edata <= '$adata') 
               and e.categoria = '$catego' and v.evento = '$evento'
        ORDER BY e.RagioneSociale";
  	   }
}	
 	break;
 }              
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction(); 
foreach($PDO->query($sql) as $row)
                 { 
                 //include('fields_ela_p.php');
                 //include('fields_vel.php');                 
                 $pdf->Cell(75,5,substr($_row['e.RagioneSociale'],0,35));  
                 $pdf->Cell(45,5,substr($_row['indirizzo'],0,30));
                 $pdf->Cell(10,5,$_row['cap']); 
                 $pdf->Cell(35,5,strtoupper($_row['localita']));
                 if ($_row['provincia'] > '0') 
                    { $pdf->Cell(5,5,$_row['provincia']); }                                                      	
                 else
                     { $pdf->Cell(5,5,'  '); };
                 $pdf->Cell(20,5,$_row['edata']); 
                 $pdf->Cell(25,5,number_format($_row['eimporto'],2,',','.'),0,0,R); 

                 if ($evento > ' ') 
                 {
                 $d = new DB_decod2('xdb','xstat','xtipo','xcod','eve',$evento,'xdes');
                 $pdf->Cell(50,5,substr($d->decod2(),0,40));   	
                 }
                 else
                 {
                 $pdf->Cell(50,5,substr($_row['enota'],0,40));  } ;
                 $pdf->Cell(5,5,$catego);
                 $pdf->Cell(5,5,$evento);
                 // conteggio totale
                 $tot = $tot + $_row['eimporto'];          
                 // conteggio categorie note
                  switch ($_row['categoria']) 
                  {
                  case 0:  { $tot0   = $tot0 + $_row['eimporto']; }
                  	break;
                  case 1:  { $tot1   = $tot1 + $_row['eimporto']; }
                  	break;
                  case 2:  { $tot2   = $tot2 + $_row['eimporto']; }
                  	break;
                  case 3:  { $tot3   = $tot3 + $_row['eimporto']; }
                  	break;
                      
                  default:
                  	
                  	break;
                  }
                 $pdf->Ln(5);
                 }
                 // stampa totali
                 $pdf->SetFont('arial','B',8);                  
                 $pdf->Cell(200,5,'Totale Euro: ',0,0,R); 
                 $pdf->Cell(15,5,number_format($tot,2,',','.'),1,0,R);
                 $pdf->Ln(10);
                  switch ($catego) 
               {    case 9:  
                  {
                 $pdf->Cell(200,5,'Privati: ',0,0,R); 
                 $pdf->Cell(15,5,number_format($tot0,2,',','.'),1,0,R);
                    $per0 = ($tot0*100)/$tot;
                 $pdf->Cell(10,5,number_format($per0,1,',','')." %",1,0,R); 
                 $pdf->Ln(5); 
                                     
                 $pdf->Cell(200,5,'Società: ',0,0,R); 
                 $pdf->Cell(15,5,number_format($tot1,2,',','.'),1,0,R);
                    $per1 = ($tot1*100)/$tot;
                 $pdf->Cell(10,5,number_format($per1,1,',','')." %",1,0,R); 
                 $pdf->Ln(5); 
                                     
                 $pdf->Cell(200,5,'Farmaceutiche: ',0,0,R); 
                 $pdf->Cell(15,5,number_format($tot2,2,',','.'),1,0,R);
                    $per2 = ($tot2*100)/$tot;
                 $pdf->Cell(10,5,number_format($per2,1,',','')." %",1,0,R); 
                 $pdf->Ln(5); 
                                     
                 $pdf->Cell(200,5,'Associazioni: ',0,0,R); 
                 $pdf->Cell(15,5,number_format($tot3,2,',','.'),1,0,R);
                    $per3 = ($tot3*100)/$tot;
                 $pdf->Cell(10,5,number_format($per3,1,',','')." %",1,0,R); 
                 $pdf->Ln(5); 
                 }   
                 break;

               }
$pdf->Output();
?>
