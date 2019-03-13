<?php
/* * Fausto Bresciani   fbsoftware@libero.it  www.fbsoftware.altervista.org
   * package		FB open template
   * versione 1.4    
   * copyright	Copyright (C) 2010 - 2012 FB. All rights reserved.
   * license		GNU/GPL
   * Si concede licenza gratuita e NON si risponde di qualsiasi cosa dovuta 
   * all'uso anche improprio di FB open template.
============================================================================= */
?>
<!DOCTYPE html>
<html>     
  <head>         
    <title>FB template          
    </title>            
    <meta http-equiv="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">            
    <meta http-equiv="content-type" content="text/html;charset=utf-8">  	          
    <meta name="created" content="lun, 07 dic 2009 06.55.04 GMT">              
    <meta name="description" content="hobby">              
    <meta name="keywords" content="hobby,musica,filatelia,turismo,foto,cine">              
    <meta name="author" content="fbsoftware">	           
<link rel="stylesheet" type="text/css" href="CSS/style_t.css">          
  </head>	  
       
<body class="database">
           
    <!--  ............. header .........  -->   	           
<header>             
      <?php	include('testi/t_header.txt'); 	?>          
    </header>
    <!--  navigatore...........  ----- -->                 
<div id="pmain_menu">             
      <?php	   include('testi/t_nav.txt');      ?>          
</div>         

    	            
    <!-- ......................corpo .................................. -->             
    <div id="corpo">   
              
      <!-- .................... left .................. --> 	               
      <aside class="left">    
<?php  include('testi/t_left.txt');    ?>                 
      </aside>	              
      	                
      <!-- ....................center ................ -->   	               
      <article>    
<?php  include('testi/t_center.txt');  ?>                 
      </article>                
                      
      <!-- ................... right .................... -->                 
      <aside class="right">     
<?php  include('testi/t_right.txt');  ?>                 
      </div>	               
            
</div>            
    <!-- .........corpo ................................................ -->           
  
<footer> 
<?php    include('testi/t_footer.txt'); ?> 
</footer>           
      
</body>
</html>
