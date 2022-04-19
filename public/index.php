<?php
    session_start();
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(LIBRARY_PATH . "/templateFunctions.php");

    // Connect to DB
    // require_once(realpath(dirname(__FILE__) . "/../resources/databaseAccess.php"));
   
    // // Close connection
    // mysqli_stmt_close($stmt);
    // mysqli_close($link);
    
    // Package variables for use
    $variables = array(
        'title' => "GENERICA | MUSIC",
    );
    
    // Render page
    renderLayoutWithContentFile("home.php", $variables);
?>