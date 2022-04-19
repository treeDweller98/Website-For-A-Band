<?php
    session_start();
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(LIBRARY_PATH . "/templateFunctions.php");

    
    // Connect to DB
    require_once(realpath(dirname(__FILE__) . "/../resources/databaseAccess.php"));
    
    // insert logic here

    $sql = "SELECT * FROM MERCH_T";
    $result = mysqli_query($link, $sql);    
    // Close connection
    // mysqli_stmt_close($stmt);
    mysqli_close($link);

    
    // Render
    $variables = array(
        'title' => "Merch | Tickets",
        "stylesheets" => array("css/shop.css"),
        'result' => $result
    );
    
    renderLayoutWithContentFile("display-merch.php", $variables);
?>
