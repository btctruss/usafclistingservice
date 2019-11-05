<!DOCTYPE html>

 <!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/style.css">

        <title>First PHP program</title>
    </head>
    <body>
        
<body  >
<!-- Header start -->
 
<div id="container">
    <div id="intro">
        <div id="pageHeader">
            <div id="sitename">
                <h1>&nbsp;&nbsp;&nbsp;&nbsp;The Russ Law Group</h1>
                <br><br><font size="5">Foreclosure Listings</font>
            </div>
        </div>
    </div>
</div>
<!-- Header end -->

    <table border="0" width='1200' align='left'>
            <tr>
                <td  width="300" >
          
               </td>
              <td height="25" align="left" width="900" 
                  style="font-family: Times New Roman; color: #990000; font-size: 22px">
                   &nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="" >Nov 7th&nbsp;&nbsp;&nbsp;&nbsp;</a> 
                  <a href="" >Oct 3rd&nbsp;&nbsp;&nbsp;&nbsp;</a> 
                  <a href="" >Aug 1st&nbsp;&nbsp;&nbsp;&nbsp;</a> 
                  <a href="" >July 5th&nbsp;&nbsp;&nbsp;&nbsp;</a>
                  <a href="" >June 6th&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="" >May 2nd&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href="" >
              </td>
            </tr>
            <tr>
                <td height="20" ></td>
            </tr>
    </table>

    <table width="600" border="0">
        <tr>
        <td>
            <table width='600'>
                <?php
                    $sum = 0;
                    $i = 0; 
                    
                    $handle = fopen("../data/Nov/FCsourcelist.txt", "r");
                    // Header
                    $line = fgets($handle);
                    $list    = explode("|", $line);
                    $company = $list[0];
                    $records = $list[1];
                    $url     = $list[2];
                    $type    = $list[3];
                    $file    = $list[4];
                    echo '<tr  style="background-color: lightgrey"> ';
                        echo '<td  height="25" style="font-family: Times New Roman; font-size: 18px">Company</td>';            
                        echo '<td  style="font-family: Times New Roman; font-size: 18px">Business Type</td>';  
                        echo '<td  style="font-family: Times New Roman; font-size: 18px">Listing File</td>';  
                        echo '<td  style="font-family: Times New Roman; font-size: 18px">Records</td>';            
                    echo '</tr>';

                    echo '<tr>';
                        echo '<td colspan="4" height="20"></td>';                   
                    echo '</tr>';
                    if ($handle) {
                       while (($line = fgets($handle)) !== false) {
                            $list = explode("|", $line);
                            echo '<tr>';
                                echo '<td  width="30%" style="font-family: Times New Roman; font-size: 18px">' . ($list[0]) . '</td>';            
                                echo '<td  width="30%" align="left" style="font-family: Times New Roman; font-size: 18px">' . ($list[3]) . '</td>';
                                echo '<td  width="30%" style="font-family: Times New Roman; font-size: 18px">' . ($list[1]) . '</td>';            
                                echo '<a href="' . ($list[2]) . '" color="#990000">Listingfile-' . ($list[0]) . '</a></td>';                                 
                                echo '<td  width="10%" style="font-family: Times New Roman; font-size: 18px">';
                            echo '</tr>';                         
                            $sum = $sum + intval($list[1]);
                            $i = $i + 1;
                       }
                            // Total the number of reoords found
                        
                        fclose($handle);
                    } else {
                // error opening the file.
                    }   
                ?>  
                
            </td>
            </tr>
        </table>
        </td >

        </
        </tr>
    </table>
    </body>
</html>


