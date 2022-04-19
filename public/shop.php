<?php
    session_start();
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(LIBRARY_PATH . "/templateFunctions.php");

    
    // Connect to DB
    require_once(realpath(dirname(__FILE__) . "/../resources/databaseAccess.php"));
    
    // insert logic here

        
    // Close connection
    mysqli_stmt_close($stmt);
    mysqli_close($link);

    
    // Render
    $variables = array(
        'title' => "Merch | Tickets",
    );
    renderLayoutWithContentFile("profile.php", $variables);
?>
