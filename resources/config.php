<?php
    require '../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();
    
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