<?php
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(LIBRARY_PATH . "/templateFunctions.php");
    
    // insert logic here
    
    // Render
    $variables = array(
        'title' => "Account | {$_SESSION["username"]}",
    );
    
    renderLayoutWithContentFile("profile.php", $variables);
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
