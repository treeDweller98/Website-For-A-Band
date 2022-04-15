<?php
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <!-- NAVBAR -->
    <?php require 'nav.php'?>

    <main>
        <!-- main slideshow with new music, featured merch etc.-->
        <section>

        </section>

        <!-- Band photos and about us stuff -->
        <section>

        </section>

        <!-- Tour date cards -->
        <section>
            
        </section>
    </main>

    <!-- FOOTER -->
    <?php require 'footer.php' ?>
</body>
</html>