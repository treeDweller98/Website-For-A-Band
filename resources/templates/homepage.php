<aside class="scrollspy-bar">
    <ul>
        <li><a href="#mainBanner" class="dot" data-scroll="mainBanner"><span>New Music</span></a></li>
        <li><a href="#merchSlideshow" class="dot" data-scroll="merchSlideshow"><span>New Merch</span></a></li>
        <li><a href="#tourDates" class="dot" data-scroll="tourDates"><span>Tour Dates</span></a></li>
    </ul>
</aside>

<main>
    <section class="sec" id="mainBanner">
        <div class="card bg-dark text-white">
            <img src="images/layout/album-3.webp" class="card-img" alt="...">

            <div class="card-img-overlay">
                <h1 class="card-title">OUT NOW!</h1>
                <h6 class="card-subtitle mb-2 text-muted">&middot G E N E R I C A: GenericAlbum &middot</h6>
                <h2> ON ALL STREAMING PLATFORMS </h2>
            </div>
        </div>
        <div class="d-flex justify-content-center flex-row bg-dark bg-dark bg-opacity-75" id="streamBox">
            <a href="#"><img title="Amazon Music" class="icon icon-lg m-3" src="images/icons/amazon.png" alt="amazon music"></a>
            <a href="#"><img title="Deezer" class="icon icon-lg m-3" src="images/icons/deezer.png" alt="Deezer"></a>
            <a href="#"><img title="Google Play Music" class="icon icon-lg m-3" src="images/icons/gplay.png" alt="Google Play Music"></a>
            <a href="#"><img title="iTunes" class="icon icon-lg m-3" src="images/icons/itunes.png" alt="iTunes"></a>
            <a href="#"><img title="Soundcloud" class="icon icon-lg m-3" src="images/icons/soundcloud.png" alt="Soundcloud"></a>
            <a href="#"><img title="YouTube Music" class="icon icon-lg m-3" src="images/icons/youtube.png" alt="spotify"></a>
            <a href="#"><img title="Spotify" class="icon icon-lg m-3" src="images/icons/spotify.png" alt="spotify"></a>
            <a href="#"><img title="Tidal" class="icon icon-lg m-3" src="images/icons/tidal.png" alt="spotify"></a>
        </div>
    </section>

    <section class="sec" id="merchSlideshow">
        <div id="merchCarouselIndicator" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php
                    foreach( $featuredMerch as $slide ) {
                        $i = 0;
                        $slideNum = $i+1;
                        echo <<< HTML
                        <button type="button" data-bs-target="#merchCarouselIndicator" data-bs-slide-to="{$i}" aria-label="Slide {$slideNum}"></button>
                        HTML;
                        $i++;
                    }
                ?>
            </div>

            <div class="carousel-inner">
                <?php
                    foreach( $featuredMerch as $slide ) {
                        echo <<< HTML
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="{$slide['image']}" class="d-block w-100 card-img" alt="{$slide['name']}">

                            <div class="card-img-overlay">
                                <h5 class="card-title">{$slide['heading']}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{$slide['subHeading']}</h6>
                                <p class="card-text">{$slide['description']}</p>
                                
                                <a href="{$slide['btnURL']}" class="btn {$slide['btnStyle']}"></a>
                            </div>
                        </div>
                        HTML;
                    }
                ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#merchCarouselIndicator" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#merchCarouselIndicator" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="sec" id="tourDates">
        <?php 
            foreach ( $upcomingConcerts as $concert ) {
                echo <<< HTML
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{$concert['imageURL']}" class="img-fluid rounded-start" alt="{$concert['name']}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{$concert['name']}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{$concert['schedule']}</h6>
                                <p class="card-text">{$slide['description']}</p>
        
                                <div class="card-footer bg-transparent border-success">
                                    <img src="images/icons/location.png" class="d-inline-block align-text-center icon icon-med" alt="location">
                                    {$concerts['location']}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                HTML;
            }
        ?>
    </section>

    
</main>