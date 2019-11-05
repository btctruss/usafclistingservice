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
<?php 
  
    $i = $_POST[''];
    
    switch ($i) {
        case 1:
            $command = escapeshellcmd('python ../Adridgepite/BuildAdridge.py Oct 10/03/2917');
            break;
        case 2:
            echo "i equals 1";
            break;
        case 2:
            echo "i equals 2";
            break;
    }
    $output = shell_exec($command);
    echo $output;
 
        

?>    </body>
</html>
