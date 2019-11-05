<?php 

    include '../includes/header.php'; 
    require_once('../includes/database.php');
      
    session_start();

    $mysqli = db_connect();
    
    $websourceID = $_GET['ID'];
  
    
    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    } 
    
    $query  = 'select * from websource where WebsourceID=' . $websourceID;
    $result = $mysqli->query($query);
    
    $row = mysqli_fetch_assoc($result);
        
    $company = $row['Company'];
    $url     = $row['URL'];
    $type    = $row['Type'];
    $records = $row['Records'];
    $active  = $row['Active'];

?>
    <link rel="stylesheet" type="text/css" href="../css/rlgstyle.css">   
    <form action="./db/TestDb.php" method="POST">
        <div id="wrapper"> 
            
            <div id="ws_form_bg" align="center">
                <h1 id="ws_edit_h1">Edit Listing Source</h1>
                <span> 
                       <div id="login_input" align="left">
                            Fields marked with a red asterisk (<font color="red">*</font>) are required
                            <br><br>
                            <label>Company<font color="red">*</font></label>&nbsp;&nbsp;
                            <input id="user_input" style="width: 300px; margin-left: 40px" type="text" name='frmCompany' value="<?php echo $company;?>" Required />                
                            <br><br>
                            <label>Business type<font color="red">*</font></label>
                            <input id="user_input" style="width: 300px;margin-left: 20px" type="text" name='frmType' value="<?php echo $type;?>" Required />                
                            <br><br>
                            <label>Records<font color="red">*</font></label>&nbsp;&nbsp;
                            <input id="user_input" style="width: 60px;margin-left: 48px" type="text" name='frmRecords'  value="<?php echo $records;?>" Required />
                            <label>Active<font color="red">*</font></label>
                            <input id="user_input" type="text" style="width: 60px;margin-left: 25px" name='email'  value="<?php echo $active;?>" Required />
                      </div>
                </span>
                <div id="inputwrapper">  
                    <br><br>
                   <input id="inputbutton"  type="button" onclick="window.location.href='javascript:history.back()'"value="CANCEL" />
                   &nbsp;&nbsp;&nbsp;<input id="inputbutton" type="submit" value="SAVE" />                    
                </div>
    </form>        
    </body>
</html>