<main id="contactForm">
    <section class="d-flex justify-content-center align-items-center">

        <form 
            action="#" method="POST" class="needs-validation transbox px-5 py-4 m-5 transbox" novalidate
            onsubmit="return confirm('Are you sure you wish to submit?');">
            
            <h1 class="text-align-center py-2 pb-4">Contact Us</h1>

            <div class="row">

                <!-- NAME AND EMAIL -->
                <div class="col-md-12 col-lg-6">
                    <div class="mb-3">
                        <label class="form-label" for="fname">First name:</label>
                        <input type="text" class="form-control" id="fname" name="fname" required>
                        <div class="valid-feedback">Hello!</div>
                        <div class="invalid-feedback">We need a name to call you by</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="lname">Last name:</label>
                        <input class="form-control" type="text" id="lname" name="lname">
                    </div>
                    <div>
                        <label class="form-label" for="email">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
                        <div id="emailHelp" class="form-text">Your email will never be shared with anyone else.</div>
                        <div class="invalid-feedback">You must enter a valid email address</div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6">
                    <!-- MESSAGE -->
                    <label class="form-label">Your Message</label>
                    
                    <input class="form-control" id="subject" placeholder="Subject" name="subject" required>
                    <div class="invalid-feedback">
                        Please provide a subject line
                    </div>
                
                    <textarea class="form-control mt-3" rows="7" placeholder="Type your message here" name="message" required></textarea>
                    <div class="invalid-feedback">
                        Oops it seems you haven't typed in a message yet...
                    </div>
                </div>

            </div>
        
            
            <div class="d-flex flex-column justify-content-center my-4">
                <hr>
                <!-- TOPIC SELECTORS -->
                <label class="form-label text-center">Select the reason why you are knocking</label>
                <div class="my-3 row justify-content-evenly">

                    <?php
                        $categories = array('BOOKING', 'QUERY', 'BUSINESS', 'MERCH', 'TICKET', 'OTHER');

                        foreach( $categories as $category ) {
                            $i = 1;
                            echo <<< HTML
                            <div class="form-check-inline px-2 col-3">
                                <input class="form-check-input" type="radio" name="topic" id="inlineRadio{$category}" value={$category} required>
                                <label class="form-check-label" for="inlineRadio{$category}">{$category}</label>
                            </div>
                            HTML;
                        }
                    ?>
                </div>
                <hr>
                <button type="submit" value="Submit" class="btn btn-primary rounded-pill mt-4 my-2" id="sendBtn">Send</button>
            </div>
    
        </form>

        <div class="my-3">
            <?php 
                if ( isset($isSent) ) {
                    if ($isSent) {
                        echo <<< HTML
                        <div class="alert alert-primary" role="alert">
                            Message Sent!
                        </div>
                        <script>document.getElementById('sendBtn').disabled = true;</script>
                        HTML;
                    } else {
                        echo <<< HTML
                        <div class="alert alert-danger" role="alert">
                            Unable to send message. Please try again later.
                        </div>
                        HTML;
                    }
                }
            ?>
        </div>
    </section>
</main>