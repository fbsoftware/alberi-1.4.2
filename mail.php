<?php
$from = "Fausto";
// Set up parameters
$to = "fbsoftware@libero.it";
$subject = "Comunicazione";
$message = "<h1>Siamo lieti</h1> di comunicarLe che ha vinto un premio di € 100.000.000,00 complimenti!";
$from = "alberidivita@gmail.com";
$headers = "From: ".$from;

// Send email
mail($to,$subject,$message,$headers);

// Inform the user
echo "Inviate mail per premio";
?>