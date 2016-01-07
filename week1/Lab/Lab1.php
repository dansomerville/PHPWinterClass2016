<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

 
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <table>
        
        <table border="2">
           
            
        <?php for($tr = 1; $tr <= 10; $tr++):?>
            <tr> 
             
             
             
            <?php //FOR LOOP
            
            for($td = 1; $td <= 10; $td++):?>
                
               
                <?php //RAND COLOR VARIABLE
            
            $randColor = '#'.strtoupper(dechex(rand(0x000000, 0xFFFFFF)));
            ?>
                
                <td style="background-color:<?php echo $randColor; ?> ;"> 
                       
                    <span style="color:white ;">
                        
                        
                
                 <?php echo $randColor; ?>  </span> 
                     
                     <?php echo $randColor; ?>      
                
                </td>
            <?php endfor; ?>   
                
                
            </tr>
        <?php endfor; ?>
            
        </table>
    </body>
</html>
