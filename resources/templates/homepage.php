<aside class="scrollspy-bar">
    <ul>
        <li><a href="#mainBanner" class="dot" data-scroll="mainBanner"><span>New Music</span></a></li>
        <li><a href="#merchSlideshow" class="dot" data-scroll="merchSlideshow"><span>New Merch</span></a></li>
        <li><a href="#tourDates" class="dot" data-scroll="tourDates"><span>Tour Dates</span></a></li>
    </ul>
</aside>

<main>
    <section class="sec d-flex flex-lg-row flex-md-column justify-content-center" id="mainBanner">

        <div class="d-flex flex-column justify-content-center text-center bg-dark bg-opacity-75 px-5">
            <h2>OUT NOW!</h2>
            <h1 class="text-muted py-4">&middot G E N E R I C A : GenericAlbum &middot</h1>
            <h3> ON ALL STREAMING PLATFORMS </h3>
        </div>

        <img src="images/layout/album-3.webp" alt="GENERIC ALBUM ART">

        <div class="d-flex flex-lg-column flex-md-row justify-content-center bg-dark bg-opacity-75">
            <a href="#"><img title="Amazon Music" class="icon icon-md m-3" src="images/icons/amazon.png" alt="amazon music"></a>
            <a href="#"><img title="Deezer" class="icon icon-md m-3" src="images/icons/deezer.png" alt="Deezer"></a>
            <a href="#"><img title="Google Play Music" class="icon icon-md m-3" src="images/icons/gplay.png" alt="Google Play Music"></a>
            <a href="#"><img title="iTunes" class="icon icon-md m-3" src="images/icons/itunes.png" alt="iTunes"></a>
            <a href="#"><img title="Soundcloud" class="icon icon-md m-3" src="images/icons/soundcloud.png" alt="Soundcloud"></a>
            <a href="#"><img title="YouTube Music" class="icon icon-md m-3" src="images/icons/youtube.png" alt="spotify"></a>
            <a href="#"><img title="Spotify" class="icon icon-md m-3" src="images/icons/spotify.png" alt="spotify"></a>
            <a href="#"><img title="Tidal" class="icon icon-md m-3" src="images/icons/tidal.png" alt="spotify"></a>
        </div>

    </section>

    <section class="sec d-flex flex-column align-items-center py-5" id="merchSlideshow">

            <h2 class="mb-3">New Merch!</h2>

            <div class="row col-lg-10 justify-content-center">
                <div id="merchCarouselIndicator" class="carousel slide carousel-dark col-md-10 col-lg-6 h-50" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php
                            $i = 0;
                            foreach( $featuredMerch as $slide ) {
                                $active = ($i == 0) ? "active" : "";
                                $slideNum = $i+1;
                                echo <<< HTML
                                <button type="button" class="{$active}" data-bs-target="#merchCarouselIndicator" data-bs-slide-to="{$i}" aria-label="Slide {$slideNum}"></button>
                                HTML;
                                $i++;
                            }
                        ?>
                    </div>
        
                    <div class="carousel-inner">
                        <?php
                            $i = 0;
                            foreach( $featuredMerch as $slide ) {
                                $active = ($i == 0) ? "active" : "";
                                echo <<< HTML
                                <div class="carousel-item {$active}" data-bs-interval="2000">
                                    <img src="{$slide['imageUrl']}" class="d-block card-img" alt="{$slide['name']}">
        
                                    <div class="card-img-overlay d-flex justify-content-center align-items-end mb-5">
                                        <div class="bg-dark bg-opacity-75 p-4 px-5">
                                            <h5 class="card-title">{$slide['name']}</h5>
                                            <h6 class="card-subtitle mb-2 text-info">Taka {$slide['price']}/-</h6>
                                            <p class="card-text">{$slide['description']}</p>
                                        </div>
                                        <!-- <a href="{$slide['btnUrl']}" class="btn {$slide['btnStyle']}"></a> -->
                                    </div>
                                </div>
                                HTML;
                                $i++;
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
            </div>

    </section>

    <section class="sec d-flex flex-column align-items-center py-5" id="tourDates">

        <h2 class="mb-3">Upcoming Shows</h2>

        <?php 
            foreach ( $upcomingConcerts as $concert ) {
                echo <<< HTML
                <div class="card bg-dark" style="max-width: 540px;">
                    <div class="row">
                        <div class="col-md-4 p-3">
                            <img src="{$concert['imageUrl']}" class="img-fluid rounded-start" alt="{$concert['name']}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{$concert['name']}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{$concert['schedule']}</h6>
                                <p class="card-text">{$concert['description']}</p>
                                <div class="bg-transparent border-success">
                                    <img src="images/icons/location.png" class="d-inline-block align-text-center icon icon-sm" alt="location">
                                    {$concert['location']}
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