<main>
    <form 
        action="#" method="POST" class="needs-validation" novalidate
        onsubmit="return confirm('Are you sure you wish to submit?');">

        <!-- NAME AND EMAIL -->
        <div>
            <label class="form-label" for="fname">First name:</label>
            <input type="text" class="form-control" id="fname" name="firstName" required>
            <div class="valid-feedback">Hello!</div>
            <div class="invalid-feedback">I need a name to call you by</div>
        </div>
        <div>
            <label class="form-label" for="lname">Last name:</label>
            <input class="form-control" type="text" id="lname" name="lastName">
        </div>
        <div>
            <label class="form-label" for="email">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
            <div id="emailHelp" class="form-text">Your email will never be shared with anyone else.</div>
            <div class="invalid-feedback">You must enter a valid email address</div>
        </div>
        
        <!-- TOPIC SELECTORS -->
        <div class="col mb-3 d-flex justify-content-evenly">
            <!-- GENERATE THESE WITH PHP LOOP -->
            <!-- ENUM('BOOKING', 'QUERY', 'BUSINESS', 'MERCH', 'TICKET', 'OTHER') -->
            <div class="form-check-inline px-2">
                <input class="form-check-input" type="radio" name="topic" id="inlineRadio3" value="other" required>
                <label class="form-check-label" for="inlineRadio3">other</label>
            </div>
        </div>
        
        <!-- MESSAGE -->
        <div>
            <label class="form-label">Your Message</label>
            
            <input class="form-control" id="subject" placeholder="Subject" name="subjectLine" required>
            <div class="invalid-feedback">
                Please provide a subject line
            </div>
        
            <textarea class="form-control" rows="5" placeholder="Type your message here" name="message" required></textarea>
            <div class="invalid-feedback">
                Oops it seems you haven't typed in a message yet...
            </div>
        </div>
        
        <div>
            <button type="submit" value="Submit" class="btn btn-primary rounded-pill py-2 px-5" id="sendBtn">Send</button>
        </div>

        <div>
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
    </form>
</main>