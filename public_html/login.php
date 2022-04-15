<?php
    require 'vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();


    include('resources/templates/header.php');
    // PAGE TITLE
    $title = "Login";

    $output = str_replace('%TITLE%', $title, $output);
    echo $output;
?>


<!-- NAVBAR -->
<?php require 'resources/.php'?>

<main>
    <section>
        
    </section>
</main>

<!-- FOOTER -->
<?php require 'resources/templates/footer.php' ?>
