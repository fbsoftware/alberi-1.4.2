<?php     // riga per stampa breve
               $pdf->SetX(10);                  
               $pdf->Cell(10,4.5,$numero_iscrizione);
               $nc = $cognome." ".$nome;               
               $pdf->Cell(45,4.5,substr($nc,0,25));  
               $pdf->Cell(45,4.5,substr($indirizzo,0,25));
               $pdf->Cell(12,4.5,$cap);               
               $pdf->Cell(30,4.5,strtoupper(substr($localita,0,14)));              
               $pdf->Cell(6,4.5,$prov);           
               $pdf->Cell(21,4.5,$telefono); 
               $pdf->Cell(21,4.5,$cellulare);                             
               $pdf->Ln(4);
?>