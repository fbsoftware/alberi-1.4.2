<?php
define('EURO', chr(128));

               // stampa indirizzo dell'iscritto
              $dc  = new DB_decod2('xdb','xstat','xtipo','xcod','tit',$titolo,'xdes');
               $tit1 = $dc->decod2();
               $dc  = new DB_decod2('xdb','xstat','xtipo','xcod','tit+',$titolo_plus,'xdes');
               $tit2 = $dc->decod2();  
               // cerca il versamento anno iscrizione
               $sqlv = "SELECT * FROM `".DB::$pref."isc`
                        WHERE vnume = $numero_iscrizione and vanno = $anno
                        LIMIT 1";
               $modv = mysql_query($sqlv);
               $row = mysql_fetch_array($modv);
               include 'fields_ver.php';
               $pdf->Text(140,70,"Brescia: ".date('d-m-Y'));
               $pdf->Text(35,95,$tit1."  ".$tit2);
               $pdf->Text(35,101,$cognome."  ".$nome);
               $pdf->Text(35,107,$indirizzo);
               $pdf->Text(35,113,$cap." - ".strtoupper($localita)."  ".$prov);
               $pdf->Text(85,120,"E' stato archiviato il socio:");
?>