<?php     // riga per stampa CONSIGLIO DIRETTIVO
          $pdf->SetX(20);                  
          $nc = $cognome." ".$nome;               
          $pdf->Cell(45,5,substr($nc,0,35));  
          $car = new DB_decxdb('car',$icons_dir);
          $carica = $car->decxdb() ;
          $pdf->Cell(21,5,$carica);                             
          $pdf->Ln(10);
?>
