
<?php
   
    
    $tok = strtok($path, "\\");
    $relative_path = "";

    $create_path = false;
    while ($tok !== false) 
    {   
        if($create_path == true)
            $relative_path = $relative_path . "../";     
        if($tok == "applemapper")
            $create_path = true;
        
        $tok = strtok("\\");
    }

    //locally hosted links
    echo '<!-- Bootstrap -->
        <link href="' . $relative_path . 'vendor/bootstrap-5.1.3-dist/css/bootstrap.css" rel="stylesheet">
        <link href="' . $relative_path . 'vendor/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- jQuery (necessary for Bootstrap' . 's JavaScript plugins) -->
        <script src="' . $relative_path . 'vendor/jquery/jquery-3.6.0.js"></script>     

        <script src="' . $relative_path . 'vendor/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>';   
        
        //<script src="' . $relative_path . 'vendor/popper/popper.min.js" ></script>

?>
