    <?php 
    
    include '../includes/header.php'; ?>
    <link rel="stylesheet" type="text/css" href="../css/rlgstyle.css">

    <form action="../db/checkloginDb.php" method="POST">  

    <div id="wrapper"> 
        
     <div id="userform_bg" align="center">

         <h1 id="login_h1">
             <img src="../images/sign-in.gif" width="60px" height="60px" alt="AddCreditor"/>
             Please Login
         </h1>
         <span> 
                <div id="login_input" >
                     Fields marked with a red asterisk (<font color="red">*</font>) are required
                     <?php
                         if(!empty($_GET['message'])) {
                             $message = $_GET['message'];
                             echo '<br><font color="red" size="4">' . $message . '</font>';
                         }                       
                     ?>
                     <br><br>
                     <label>Username</label>&nbsp;&nbsp;
                     <input id="user_input" type="text" name='username' Required />&nbsp;
                     <br><br><label>Password</label>&nbsp;&nbsp;
                     <input id="user_input" type="password" name='password' Required />
                     <a href="login.php"></a>
                     <br><br>
                </div>

         </span>
         <div id="inputwrapper">  
            <input id="frmButton"" onclick="window.location.href=''"  
                   style="color: white; height: 35px; width: 100px;"
                   type="button" value="CANCEL" />
            &nbsp;&nbsp;&nbsp;
            <input id="frmButton"" type="submit" value="LOGIN" 
                   style="color: white; height: 35px; width: 100px;"/>

         </div>
     </div>            
 </div>
    </form>          
    </body>
</html>

