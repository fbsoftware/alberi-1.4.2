<?php   session_start();
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * Stampa ISCRITTI per età
=============================================================================  */ 
// DOCTYPE & head
include_once 'include_gest.php';
$head = new getBootHead('gestione iscritti');
     $head->getBootHead(); 
     echo "</head>";  
       
$gio = $_POST['gio'];
$anz = $_POST['anz'];
// determina date limite
$dat=date('Y');
$data1 = ($dat - $gio)."-01-00";                                                      
$data2 = ($dat - $anz)."-01-00";                                                                                                
include_once('calc_eta.php');
$azione   = $_POST['submit'];

   switch ($azione) 
   {
case 'ritorno': 
   {
     $loc = "location:index.php?urla=widget.php&pag=";
     header($loc);                           
   break;
   }   
case 'stampa':
{             
define('FPDF_FONTPATH','font/');
require('fpdf.php');
include_once('headers_breve2.php');
$pdf=new PDF('P','mm');
$pdf->Open();
$pdf->SetTextColor(0,0,0); 
$title=$page_title."ISCRITTI PER ETA'";
$pdf->AddPage();   
$pdf->SetTitle($title);
$pdf->SetFont('arial','',20); 
$pdf->SetAutoPageBreak(true,15);

$pdf->SetX(50);
$pdf->Cell(40,1,"Giovani: ");
$pdf->Cell(30,1,$num,'','','R');
$pdf->Cell(30,1,$perc." %",'','','R');
$pdf->Ln(14);

$pdf->SetX(50);
$pdf->Cell(40,1,"Adulti: ");
$pdf->Cell(30,1,$num2,'','','R');
$pdf->Cell(30,1,$perc2." %",'','','R');
$pdf->Ln(14);

$pdf->SetX(50);
$pdf->Cell(40,1,"Anziani: ");
$pdf->Cell(30,1,$num3,'','','R');
$pdf->Cell(30,1,$perc3." %",'','','R');
$pdf->Ln(14);

$pdf->SetX(50);
$pdf->Cell(90,.3,'',1,1,'C',1);
$pdf->Ln(14);

$pdf->SetX(50);
$pdf->Cell(40,1,"TOTALE: ");
$pdf->Cell(30,1,$tot,'','','R');
$pdf->Ln(4);

$pdf->Output();
break;
}
case 'mostra':
     {
      echo "<html>
  <head>
    <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    <script type='text/javascript'>

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Giovani',".$num."],
          ['Adulti',".$num2."],
          ['Anziani',".$num3."],
       ]);

        // Set chart options
        var options = {'title':'Composizione Iscritti',
                       'width':800,
                       'height':600};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body> ";

//   bottoni gestione
$param = array('ritorno');
$btx   = new bottoni_str_par('ISCRITTI PER ETA\'','isc','prt_isc_eta.php',$param);     
     $btx->btn();
//  Div that will hold the pie chart
echo "<div id='chart_div' style='align:center;'></div>";

     break;     
     }
$loc = "location:index.php?".$_SESSION['location']."";
     header($loc);     
}
echo "</body></html>  "; 
?>