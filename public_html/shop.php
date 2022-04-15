<?php
    require 'vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();

    

    include('resources/templates/header.php');
    // PAGE TITLE
    $title = "Shop";

    $output = str_replace('%TITLE%', $title, $output);
    echo $output;
?>


<!-- NAVBAR -->
<?php require 'resources/.php'?>

<main>
    <!-- main slideshow with new music, featured merch etc.-->
    <section>
        SLIDESHOW
    </section>

    <!-- Band photos and about us stuff -->
    <section>
        BAND PHOTOS
    </section>

    <!-- Tour date cards -->
    <section>
        TOUR DATE
        TOUR DATE
        TOUR DATE
    </section>
</main>

<!-- FOOTER -->
<?php require 'resources/templates/footer.php' ?>
