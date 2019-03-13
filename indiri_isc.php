<?php          // stampa indirizzo dell'iscritto
               $dc  = new DB_decxdb('tit',$titolo); 
               $tit1 = $dc->decxdb();
               $dc  = new DB_decxdb('tit+',$titolo_plus); 
               $tit2 = $dc->decxdb();
               $pdf->Cell(35,5,$tit1."  ".$tit2);   
		     $pdf->Ln(5); 
               $pdf->Cell(45,5,$cognome."  ".$nome); 
               $pdf->Ln(5);               
               $pdf->Cell(55,5,$indirizzo);
               $pdf->Ln(5);   
               $pdf->Cell(70,5,$cap." - ".strtoupper($localita)."  ".$prov);               
               $pdf->SetY(297);
?>
