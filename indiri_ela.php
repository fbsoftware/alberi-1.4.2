<?php          // stampa indirizzo dell'elargitore
               $dc  = new DB_decxdb('tit',$titolo); 
               $tit1 = $dc->decxdb();
               $dc  = new DB_decxdb('tit+',$titolo_plus); 
               $tit2 = $dc->decxdb();
               $pdf->Cell(25,5,$tit1."  ".$tit2);
               $pdf->Ln(5);
               $pdf->Cell(35,5,$RagioneSociale);
               $pdf->Ln(5);
                 if ($referente > '  ') 
                 
                 {
                    $pdf->Cell(45,5,$referente);
                    $pdf->Ln(5);                	
                    $pdf->Cell(55,5,$indirizzo);
                    $pdf->Ln(5);
                    $pdf->Cell(70,5,$cap." - ".strtoupper($localita)."  ".$provincia);
                 }
                 else
                 {
                    $pdf->Cell(45,5,$indirizzo);
                    $pdf->Ln(5);
                    $pdf->Cell(60,5,$cap." - ".strtoupper($localita)."  ".$provincia);
                 }
                 
               $pdf->SetY(297);
?>
