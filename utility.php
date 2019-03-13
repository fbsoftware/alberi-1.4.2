<?php
/*** Fausto Bresciani   fbsoftware.bresciani@gmail.com  www.fbsoftware.altervista.org
   * package		Gestione Associazione
   * versione 1.3   
   * copyright	Copyright (C) 2013 - 2014 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
=============================================================================  
   * 
   *  Ritorna la conversione in lettere di un numero
============================================================================= */
function num_lett($numero)
{
    if (($numero < 0) || ($numero > 999999999))
    {
        return "$numero";
    }

    $milioni = floor($numero / 1000000);  // Milioni
    $numero -= $milioni * 1000000;
    $migliaia = floor($numero / 1000);    // Migliaia
    $numero -= $migliaia * 1000;
    $centinaia = floor($numero / 100);     // Centinaia
    $numero -= $centinaia * 100;
    $decine = floor($numero / 10);       // Decine
    $unita = $numero % 10;               // Unità

    $cifra_lettere = "";

    if ($milioni)
    {
            if ($milioni == 1)
            $cifra_lettere .=  "milione ";
            else
            $cifra_lettere .= num_lett($milioni) . "milioni ";
    }

    if ($migliaia)
    {
            if ($migliaia == 1)
            $cifra_lettere .=  "mille ";
            else
            $cifra_lettere .= num_lett($migliaia) . "mila ";

    }

    if ($centinaia)
    {
        if ($centinaia == 1)
        { $cifra_lettere  .= "cento "; }
        else {
              $cifra_lettere .= num_lett($centinaia) . "cento ";
             }
    }

    $array_primi = array("", "uno", "due", "tre", "quattro", "cinque", "sei",
        "sette", "otto", "nove", "dieci", "undici", "dodici", "tredici",
        "quattordici", "quindici", "sedici", "diciassette", "diciotto",
        "diciannove");
    $array_decine = array("", "", "venti", "trenta", "quaranta", "cinquanta", "sessanta",
        "settanta", "ottanta", "novanta");

    if ($decine || $unita)
    {
        if ($decine < 2)
        {
            $cifra_lettere .= $array_primi[$decine * 10 + $unita];
        }
        else
        {
            $cifra_lettere .= $array_decine[$decine];

            if ($unita)
            {
                $cifra_lettere .= $array_primi[$unita];
            }
        }
    }

    if (empty($cifra_lettere))
    {
        $cifra_lettere = "zero";
    }
           $cifra_lettere = str_replace(" ","",$cifra_lettere);
    return $cifra_lettere;
}
/**=============================================================================
 * Capovolge data aaaammgg ==> ggmmaaa
 * ===========================================================================*/
      function flipData($datain)
          {
          $dataout = array();
          $dataout = explode ('-',$datain);
          $dataout = array_reverse($dataout);
          return implode($dataout,'-');
          }
 
?>