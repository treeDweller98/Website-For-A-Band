<?php
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(LIBRARY_PATH . "/templateFunctions.php");
   
    // Set all variables to use in the page here 
    $title = "BUMBUMBUM";
    
    // Package variables for use
    $variables = array(
        'title' => $title
    );
    
    // Render page
    renderLayoutWithContentFile("contact-form.php", $variables);
?>