<?php
    session_start();
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(LIBRARY_PATH . "/templateFunctions.php");

    
    // Connect to DB
    require_once(realpath(dirname(__FILE__) . "/../resources/databaseAccess.php"));
    
    // insert logic here

    $sql = "SELECT * FROM MERCH_T";
    $allMerch = mysqli_query($link, $sql);    
    
    // Close connection
    mysqli_close($link);

    
    // Render
    $variables = array(
        'title' => "Merch | Tickets",
        "stylesheets" => array("css/admin.css"),
        'allMerch' => $allMerch
    );
    
    renderLayoutWithContentFile("admin-merch-view.php", $variables);
?>
