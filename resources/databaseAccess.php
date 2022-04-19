<?php
    require '../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1));
    $dotenv->safeLoad();

    $link = mysqli_connect($_ENV["DB_SERVER"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"],$_ENV["DB_NAME"]);
    if($link === false) {
        $diemsg = "ERROR: Could not connect. " . mysqli_connect_error();
        die( $diemsg );
    }
?>