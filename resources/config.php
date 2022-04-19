<?php
    require '../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();

    date_default_timezone_set('Asia/Dhaka');

    /* databaseAccess.php
        <?php
            // Database credentials
            define('DB_SERVER', 'serverhere');
            define('DB_USERNAME', 'userhere');
            define('DB_PASSWORD', 'pwhere');
            define('DB_NAME', 'namehere');

            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
            if($link === false){
                $diemsg = "ERROR: Could not connect. " . mysqli_connect_error();
                die( $diemsg );
            }
        ?> 
        Make this, env does not work
    */

    // Configs
    $config = array(
        "db" => array(
            "dbname" => "database1",
            "username" => "dbUser",
            "password" => "pa$$",
            "host" => "localhost"
        ),
        "urls" => array(
            "baseUrl" => "http://localhost/website/final/public/"
        ),
        "paths" => array(
            "resources" => "/path/to/resources",
            "images" => array(
                "content" => $_SERVER["DOCUMENT_ROOT"] . "/images/content",
                "layout" => $_SERVER["DOCUMENT_ROOT"] . "/images/layout"
            )
        )
    );


    // Constants
    defined("LIBRARY_PATH")
        or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));

    defined("TEMPLATES_PATH")
        or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));


    // Error reporting for debugging
    ini_set("error_reporting", "true");
    error_reporting(E_ALL);
?>