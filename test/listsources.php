<?php 
    include '../includes/header.php'; 

    $handle = fopen("../data/FCsourcelist.txt", "r");
    // Header
    $line = fgets($handle);

    $date  = explode("|", $line);
    $month = $date[0];
    $day   = $date[1];
    
 ?>
<form action="buildMailer.php" method="POST">
    <table border="0" width="1000"  height='450'  style="background-color: #FFFFFF;">
        <tr>
        <td width='400'  valign="top" >
            <table border="0" width='300' height='610' valign="top"  style="background-color: lightgray;">
               <tr>
                      <td colspan="2" valign="bottom" height='70' style="background-color: #FFFFFF;"> 
                         
                     </td>
                </tr>   
               <tr>
                      <td colspan="2" id="right_pane_h1" align="center" valign="bottom" height='95' 
                          style="color: #660000; font-family: Times New Roman; font-size: 20px;" > 
                          <b>Key Performance Indicators</b>
                     </td>
                </tr>   
                <tr  style="background-color: #FFFFFF;">
                     <td width='20%' height='5' align="center"> 
                         <img src="../images/AddCreditor.gif" width="40px" height="40px" alt="AddCreditor"/>
                     </td>
                     <td width='80%' style="color: #660000; font-family: Times New Roman; font-size: 18px;" style="background-color: #FFFFFF;"> 
                         Loan Modification Success
                     </td>
                </tr>   
                <tr  style="background-color: #FFFFFF;">
                     <td width='20%' height='5' align="center" > 
                         <img src="../images/Dollar.png" width="40px" height="40px" alt="AddCreditor"/>
                     </td>
                     <td width='80%' style="color: #660000; font-family: Times New Roman; font-size: 18px;" > 
                         Refund/Charge backs
                     </td>
                </tr>   
                <tr  style="background-color: #FFFFFF;">
                     <td width='20%' height='5' align="center" > 
                         <img src="../images/CreditCard.gif" width="40px" height="40px" alt="AddCreditor"/>
                     </td>
                     <td width='80%' style="color: #660000; font-family: Times New Roman; font-size: 18px;" > 
                         Mailers - Matrices
                     </td>
                </tr>   
                <tr>
                     <td width='20%' height='110' align="center" > 
                     </td>
                     <td width='80%' style="font-family: Times New Roman; font-size: 18px;" > 
                         <br><br><br>
                     </td>
                </tr>   
                <tr>
                     <td width='20%' height='100' align="center" > 
                     </td>
                     <td width='80%' style="font-family: Times New Roman; font-size: 18px;" > 
                         <br><br><br>
                     </td>
                </tr>   
             </table>
        </td>  
        <td height="50">
            &nbsp;
        </td>
        <td align="left" valign='top' style="background-color: white;" >
   
            <div align="center" style="font-size: 30px; font-family: Times New Roman; color: #660000">
                <br>List of Foreclosures - <?php echo $month . ' ' .  $day; ?> Sale date
            </div>

            <table border="0" id="listformtable">
               <tbody>
               <tr>
                   <td colspan="5">
                       &nbsp;
                   </td>
               </tr>                    
               <tr>
                   <td colspan="5" align="center">            
                       <h1 id="login_h1"><B>Create Foreclosure Mailer</B></h1>
                       <input type="hidden" name="Month" value="<?php echo $month; ?>" />
                       <input type="hidden" name="Day" value="<?php echo $day; ?>" />
                   </td>
                        <?php
                            if(!empty($_GET['message'])) {
                                $message = $_GET['message'];
                                echo '<br><font color="red" size="4">' . $message . '</font>';
                            }                       
                        ?>

               </tr>
                <tr>
                    <td align="left" height="30" valign="center" style="color: #660000; font-family: Times New Roman; font-size: 18px">
                        <b>Select</b>
                    </td>
                    <td align="left" height="30" valign="center" style="color: #660000; font-family: Times New Roman; font-size: 18px">
                        <b>&nbsp;&nbsp;Company</b>
                    </td>
                    <td align="left" height="30" valign="center" style="color: #660000; font-family: Times New Roman; font-size: 18px">
                        <b>Business type</b>
                    </td>
                    <td align="left" height="30" valign="center" style="color: #660000; font-family: Times New Roman; font-size: 18px">
                        <b>Records #</b>
                    </td>
               </tr>
               
               <?php
                    $i = 0;
                    $total = 0;
                    if ($handle) {
                       while (($line = fgets($handle)) !== false) {
                            $list = explode("|", $line);
                            $result = count($list);
                            if ($result > 1) {
                                $company   = $list[0];
                                $url       = $list[1];
                                $type      = $list[2];
                                $buildfile = $list[3];
                                $records   = $list[4];
                            } else {
                                $duplicates = $list[0];
                                $total_ = $total - $duplicates;
                                break;
                            }                 
                            $total = $total + $list[4];
                            $i = $i + 1;
                ?>
                    <tr>
                        <td width="5%" height="27px" align="center" style="background-color: white;"> 
                            <input type="checkbox" name="fc_source<?php echo $i; ?>" value="ON" style="height: 22px; width: 22px"/>
                        </td>
                        <td width="40%" height="27px" align="left" valign="center" 
                            style="background-color: white; font-family: Times New Roman; font-size: 18px">
                            &nbsp;&nbsp;<a href="<?php echo $url; ?>" style="color: #660000"><?php echo $company; ?></a>
                        </td>
                        <td width="22%" height="27px" align="left" valign="center" 
                            style="background-color: white; font-family: Times New Roman; font-size: 18px">
                           <?php echo $type; ?>
                        </td>
                        <td width="10%" height="27px" align="right" valign="center" 
                            style="background-color: white; font-family: Times New Roman; font-size: 18px">
                           <?php echo $records; ?> &nbsp;
                            <input type="hidden" name="buildfile<?php echo $i; ?>" value="<?php echo $buildfile;?>" />
                        </td>
                    </tr>
                <?php  } ?>                
                    <tr>
                        <td colspan="3" height="27px" align="left" style="background-color: white;"> 
                            Total # of duplicates
                        </td>
                        <td height="27px" align="right" style="background-color: white;"> 
                            <?php echo $duplicates; ?> &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" height="27px" align="left" style="background-color: white;"> 
                            Total # of records
                        </td>
                        <td height="27px" align="right" style="background-color: white;"> 
                            <b><?php echo $total; }?> &nbsp;</b>
                        </td>
                   </tr>
           </tbody>
           <br>
           <tr>
                <td align="left" colspan='5' height="60" align="center" valign="top" 
                   style="font-family: Times New Roman; font-size: 20px;" >
                   <br>
                   <input type="button" value="CANCEL" 
                   onclick="window.location.href='javascript:history.back()'"                          
                   style="color: white; height: 35px; width: 90px; 
                   background-color:  #cc0000" />
                   &nbsp; &nbsp;
                   <input type="submit" value="CREATE MAILER" style="color: white; height: 35px; width: 130px; 
                   background-color:  #cc0000" />
                   <br>
                   <br>
                </td>
            </tr>
        </table>
       <br><br><br>
    </td>
    </tr>
    </table> 
    </form>
    &nbsp;&nbsp;
    </body>
</html>