<?php
// definisco mittente e destinatario della mail
$nome_mittente = "Mio Nome";
$mail_mittente = "mittente@sito.com";
$mail_destinatario = "fbsoftware@libero.it";

// definisco il subject
$mail_oggetto = "Messaggio di prova";

// definisco il messaggio formattato in HTML
$mail_corpo = <<<HTML
<html>
<head>
  <title>Una semplice mail con PHP formattata in HTML</title>
</head>
<body>
<h1>Elba 2007</h1>
<p><span style="font-size: 14px;">Isola d'Elba, Marina di Campo in campeggio, una baia con vicino un paese tipico e pulito (5 minuti in bici). Con tempo bello la temperatura è ideale ai primi di Giugno, l'umidità è quasi assente e l'acqua bella e gradevole.</span></p>
<div><span style="font-size: 14px;">Al largo era parcheggiato un panfilo di un "povero Cristo" con  mezzo speciale di trasporto a terra! Zoomare per credere!  Sai ... la barchetta è scomoda ... bisogna remare ... metti che il mare sia mosso ... se hai dimenticato di comperare lo zucchero ... vuoi mettere la comodità di un elicottero che ti cala proprio davanti al supermercato?</span></div>
<div><span style="font-size: 14px;"><span style="font-family: arial,helvetica,sans-serif;">C\'è anche chi molto più modesto,ma dignitosamente, affronta il mare con altri mezzi!</span></span></div></body>
</html>
HTML;

// aggiusto un po' le intestazioni della mail
// E' in questa sezione che deve essere definito il mittente (From)
// ed altri eventuali valori come Cc, Bcc, ReplyTo e X-Mailer
$mail_headers = "From: " .  $nome_mittente . " <" .  $mail_mittente . ">\r\n";
$mail_headers .= "Reply-To: " .  $mail_mittente . "\r\n";
$mail_headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

// Aggiungo alle intestazioni della mail la definizione di MIME-Version,
// Content-type e charset (necessarie per i contenuti in HTML)
$mail_headers .= "MIME-Version: 1.0\r\n";
$mail_headers .= "Content-type: text/html; charset=iso-8859-1";

if (mail($mail_destinatario, $mail_oggetto, $mail_corpo, $mail_headers))
  echo "Messaggio inviato con successo a " . $mail_destinatario;
else
  echo "Errore. Nessun messaggio inviato.";
?>