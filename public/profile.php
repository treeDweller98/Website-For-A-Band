<?php
    session_start();
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(LIBRARY_PATH . "/templateFunctions.php");
    
    if ($_SESSION['loggedin']) {
        // Connect to DB
        require_once(realpath(dirname(__FILE__) . "/../resources/databaseAccess.php"));
        
        // Insert logic here
        
        // Close connection
        mysqli_stmt_close($stmt);
        mysqli_close($link);
        
        // Render
        $variables = array(
            'title' => "Account | {$_SESSION["username"]}",
        );
        renderLayoutWithContentFile("profile.php", $variables);

    } else {
        // Redirect to login if not signed in
        header("location: login.php?message=signin");
    }
?>