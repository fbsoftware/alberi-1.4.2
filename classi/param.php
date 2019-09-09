<?php
/*** Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 2.0   
   * copyright	Copyright (C) 2012 - 2013 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
================================================================================= 
  Classe 'param'       
  metodo get_param    per ottenere il valore dei parametri contenuti in ogni
  elemento composto da "chiave"="valore" e separato dagli altri con ",".
================================================================================= */
class param
{
public    $param="";
var       $par=array(); 
var       $part=array();

        public function __construct($param)       
               { $this->param = $param;}
               
                              
        function get_param_vid()     // parametri per video YouTube
                {      
               // scompongo i singoli parametri separati da ","
               $arr=array();
               $arr = explode(",",$this->param);  
               // scompongo i singoli elementi
               foreach ($arr as $par) 
                    {// scompongo chiave-valore separati da "="
               	 $part = explode("=",$par);
                     
                       switch ($part[0])
                         {
                         case 'vid':
                              $this->vid = $part[1];
                              break;
                         case 'lar':
                              $this->lar = $part[1];
                              break;     
                         case 'alt':
                              $this->alt = $part[1];
                              break;     
                         case 'bor':
                              $this->bor = $part[1];
                              break;     
                         case 'chi':
                              $this->chi = $part[1];
                              break;     
                         case 'scu':
                              $this->scu = $part[1];
                              break;     
                         default:
                      	break;
                         }

                    }               
               }
               
                              
        function get_param_ava()       // parametri per avatar
                {      
               // scompongo i singoli parametri separati da ","
               $arr=array();
               $arr = explode(",",$this->param);  
               // scompongo i singoli elementi
               foreach ($arr as $par) 
                    {// scompongo chiave-valore separati da "="
               	 $part = explode("=",$par);
                     
                       switch ($part[0])
                         {
                         case 'vid':
                              $this->vid = $part[1];
                              break;
                         case 'lar':
                              $this->lar = $part[1];
                              break;     
                         case 'alt':
                              $this->alt = $part[1];
                              break;     
                         case 'bor':
                              $this->bor = $part[1];
                              break;     
                         case 'chi':
                              $this->chi = $part[1];
                              break;     
                         case 'scu':
                              $this->scu = $part[1];
                              break;     
                         default:
                      	break;
                         }

                    }               
               }

}    

?>      
