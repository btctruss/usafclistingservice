<?php 

    session_start();

    $_SESSION['month'] = $_POST['Month'];
    $_SESSION['day']   = $_POST['Day'];
   
    $month = $_POST['Month'];
    $day   = $_POST['Day'];

    $month = preg_replace('/\s+/', '', $month);

    //Get a list of all of the file names in the folder.
    $files = glob('../data/' . $month . '/*');
    
    $selected = 0;
    //Loop through the file list.
    foreach($files as $file){
        //Make sure that this is a file and not a directory.
        if(is_file($file)){
            //Use the unlink function to delete the file.
            echo '<br>Removed file: ' . $file; 
            unlink($file);
        }
    }
    
    if (isset($_POST['fc_source1'])) {
        $src  = "../BuildFC/Final-Build/" . $month . $_POST['buildfile1']; 
        $dest = "../data/" . $month . $_POST['buildfile1']; 
        echo '<br>SRC: '  . $src;
        echo '<br>DEST: ' . $dest;         
        copy($src,$dest);  
        $selected = 1;     
    }
    
    if (isset($_POST['fc_source2'])) {
        $src  = "../BuildFC/Final-Build/" . $month . $_POST['buildfile2']; 
        $dest = "../data/" . $month . $_POST['buildfile2']; 
        echo '<br>SRC: '  . $src;
        echo '<br>DEST: ' . $dest;         
        copy($src,$dest);      
        $selected = 1;     
    }
    
    if (isset($_POST['fc_source3'])) {
        $src  = "../BuildFC/Final-Build/" . $month . $_POST['buildfile3']; 
        $dest = "../data/" . $month . $_POST['buildfile3']; 
        echo '<br>SRC: '  . $src;
        echo '<br>DEST: ' . $dest;        
        copy($src,$dest);      
        $selected = 1;     
    }
    
    if (isset($_POST['fc_source4'])) {
        $src  = "../BuildFC/Final-Build/" . $month . $_POST['buildfile4']; 
        $dest = "../data/" . $month . $_POST['buildfile4']; 
        echo '<br>SRC: '  . $src;
        echo '<br>DEST: ' . $dest;         
        copy($src,$dest);      
        $selected = 1;     
    }
    
    if (isset($_POST['fc_source5'])) {
        $src  = "../BuildFC/Final-Build/" . $month . $_POST['buildfile5']; 
        $dest = "../data/" . $month . $_POST['buildfile5']; 
        echo '<br>SRC: '  . $src;
        echo '<br>DEST: ' . $dest;        
        copy($src,$dest);      
        $selected = 1;     
   }
    
    if (isset($_POST['fc_source6'])) {
        $src  = "../BuildFC/Final-Build/" . $month . $_POST['buildfile6']; 
        $dest = "../data/" . $month . $_POST['buildfile6']; 
        echo '<br>SRC: '  . $src;
        echo '<br>DEST: ' . $dest; 
        
        copy($src,$dest);      
    }

    if (isset($_POST['fc_source7'])) {
        $src  = "../BuildFC/Final-Build/" . $month . $_POST['buildfile7']; 
        $dest = "../data/" . $month . $_POST['buildfile7']; 
        echo '<br>SRC: '  . $src;
        echo '<br>DEST: ' . $dest; 
        
        copy($src,$dest);      
    }
    
    if (isset($_POST['fc_source8'])) {
        $src  = "../BuildFC/Final-Build/" . $month . $_POST['buildfile8']; 
        $dest = "../data/" . $month . $_POST['buildfile8']; 
        echo '<br>SRC: '  . $src;
        echo '<br>DEST: ' . $dest;        
        copy($src,$dest);      
        $selected = 1;     
    }
    
    if (isset($_POST['fc_source9'])) {
        $src  = "../BuildFC/Final-Build/" . $month . $_POST['buildfile9']; 
        $dest = "../data/" . $month . $_POST['buildfile9']; 
        echo '<br>SRC: '  . $src;
        echo '<br>DEST: ' . $dest;        
        copy($src,$dest);      
        $selected = 1;     
    }

    if ($selected != 0) {
        $strCmd = 'python ../data/CompileList.py ' . $month . ' ' . $day;
        echo '<br><br>' . $strCmd;
        $command = escapeshellcmd($strCmd);
        $output  = shell_exec($command);        
        header('Location: ../data/buildlist.php');
    } else {
        header('Location: listsources.php?message=You must select at one listing source...');         
    }
    // echo $output;
    