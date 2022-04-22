<?php
    session_start();
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(LIBRARY_PATH . "/templateFunctions.php");

    // Connect to DB
    require_once(realpath(dirname(__FILE__) . "/../resources/databaseAccess.php"));

    // Fetch featured merch for slideshow
    $sql = "SELECT * FROM MERCH_T WHERE isFeatured = true";
    $result = mysqli_query($link, $sql) or die( mysqli_error($link) );
    $featuredMerch = mysqli_fetch_all( $result, MYSQLI_ASSOC );

    // Fetch upcoming concerts for cards
    $time = time();
    $sql = "SELECT * FROM CONCERT_T WHERE schedule > {$time}";
    $result = mysqli_query($link, $sql) or die( mysqli_error($link) );
    $upcomingConcerts = mysqli_fetch_all( $result, MYSQLI_ASSOC );

    // Close connection
    mysqli_close($link);
    
    // Package variables for use
    $variables = array(
        'title' => "GENERICBAND | MUSIC",
        'stylesheets' => array("css/scrollspy-sidebar.css", "css/home.css"),
        'scripts' => array("js/scrollspy-scrollbar.js"),
        'featuredMerch' => $featuredMerch,
        'upcomingConcerts' => $upcomingConcerts
    );
    
    // Render page
    renderLayoutWithContentFile("homepage.php", $variables);
?>