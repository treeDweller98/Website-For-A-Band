<aside class="scrollspy-bar">
    <ul>
        <li> <a href="#AboutMe" class="dot" data-scroll="AboutMe">    <span> about me  </span></a></li>
        <li> <a href="#MyWork" class="dot" data-scroll="MyWork">      <span> my work   </span></a></li>
        <li> <a href="#ContactMe" class="dot" data-scroll="ContactMe"><span> inquiries </span></a></li>
    </ul>
</aside>

<main>
    
    <section>
        <div id="carouselIndicator" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselIndicator" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <?php
                    if ( isset($slideshow) ) {
                        for ( $slide = 1; $slide < sizeof($slideshow); $slide++ ) {
                            $slideNum = $i+1;
                            echo <<< HTML
                            <button type="button" data-bs-target="#carouselIndicator" data-bs-slide-to="{$slide}" aria-label="Slide {$slideNum}"></button>
                            HTML;
                        }
                    }
                ?>
            </div>

            <div class="carousel-inner">
                <?php
                    foreach( $slideshow as $slide ) {
                        echo <<< HTML
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                        HTML;
                    }
                ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicator" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicator" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Band photos and about us stuff -->
    <section>
        
    </section>

    <!-- Tour date cards -->
    <section>
        TOUR DATE
        TOUR DATE
        TOUR DATE
    </section>
</main>