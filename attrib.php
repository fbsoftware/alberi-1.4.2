<?php
     // transazione    
     $con = "mysql:host=".DB::$host.";dbname=".DB::$db."";
     $PDO = new PDO($con,DB::$user,DB::$pw);
     $PDO->beginTransaction();
define('EURO', chr(128));
               
               // stampa indirizzo dell'iscritto
              	$dc  = new DB_decod2('xdb','xstat','xtipo','xcod','tit',$titolo,'xdes');
               	$tit1 = $dc->decod2();
               $dc  = new DB_decod2('xdb','xstat','xtipo','xcod','tit+',$titolo_plus,'xdes');
               	$tit2 = $dc->decod2(); 
               $anno = substr($data_iscrizione,6,4); 
               // cerca il versamento anno iscrizione
               $sqlv = "SELECT * FROM `".DB::$pref."ver`
                        WHERE vnume = $numero_iscrizione and vanno = '$anno'
                        LIMIT 1";
			foreach($PDO->query($sqlv) as $row) 
			{              
			include 'fields_ver.php';
			$pdf->Text(140,50,"Importo: ".$vimporto);
               $pdf->Text(140,70,"Brescia: ".$data_iscrizione);
               $pdf->Text(35,95,$tit1."  ".$tit2);
               $pdf->Text(35,101,$cognome."  ".$nome);
               $pdf->Text(35,107,$indirizzo);
               $pdf->Text(35,113,$cap." - ".strtoupper($localita)."  ".$prov);

 //              $pdf->Rect(35,135,160,65);
               $pdf->image('images/pergamena.jpg',55,135,120,65);
               $pdf->SetFont('arial','B',12);
               $pdf->Text(85,155,"CONTRIBUTO ANNO ".$anno);
               $pdf->SetFont('arial','',12);
                if ($vimporto <= 20.00)
                	{
			 	$pdf->Text(85,180,"SOCIO ORDINARIO  ".EURO." ".$vimporto);
			 	}
                if ($vimporto > 20.00)
                {$pdf->Text(85,180,"SOCIO SOSTENITORE".EURO."  ".$vimporto);}
               $pdf->SetFont('arial','B',12);
               $pdf->Text(105,245,"PER IL CONSIGLIO DIRETTIVO");
               }
?>