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

<main>
    <form action="-----------" method="POST" class="needs-validation" novalidate>
        <h1>Log-In</h1>

        <div">
            <label for="emailBox" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailBox" aria-describedby="emailHelp" name="email" placeholder="example@email.com" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            <div class="invalid-feedback">Please enter a valid email address</div>
        </div>

        <div">
            <label for="pwbox" class="form-label">Password</label>
            <input type="password" class="form-control" id="pwbox" name="password" required>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="rememberMeChk">
            <label class="form-check-label" for="rememberMeChk">Remember Me</label>
        </div>

        <a href="----------">Forgot Password?</a>

        <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
    </form>


    <form action="-----------" method="POST" class="needs-validation" novalidate>
        <h1>Sign Up</h1>

        <!-- NAME -->
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

        <!-- EMAIL -->
        <div>
            <label for="emailbox" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailbox" aria-describedby="emailHelp" placeholder="example@email.com" name="email" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            <div class="invalid-feedback">Please enter a valid email address</div>
        </div>

        <!-- PHONE -->
        <div>
            <label for="phoneBox" class="form-label">Phone</label>
            <input type="tel" id="phoneBox" class="form-control" size="20" minlength="9" maxlength="14" name="email">
            <div class="invalid-feedback">Please enter a valid phone number</div>
        </div>

        <!-- ADDRESS -->
        <div>
            <div>
                <label class="form-label" for="addressBox">Address</label>
                <input class="form-control" type="text" id="addressBox" name="address" placeholder="e.g. House-#, Road-#, City">
            </div>
            
            <div>
                <label class="form-label" for="addressBoxZIP">ZIP Code</label>
                <input class="form-control" type="text" id="addressBoxZIP" name="addressZIP">
            </div>

            <div>
                <label for="addressBoxCountry" class="form-label">Country</label>
                <select class="form-select" id="addressBoxCountry" required>
                    <option selected disabled value="">Choose...</option>
                    <option>Bangladesh</option>
                </select>
                <div class="invalid-feedback">
                    Please select your country.
                </div>
            </div>
        </div>

        <!-- PASSWORD -->
        <div>
            <label for="pwbox" class="form-label">Password</label>
            <input type="password" class="form-control" aria-describedby="pwHelp" id="pwbox" name="password" required>

            <label for="pwbox2" class="form-label">Retype Password</label>
            <input type="password" class="form-control" id="pwbox2" required>

            <div id="pwHelp" class="form-text">Should be at least 8-characters long</div>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="termsAndConditions" required>
            <label class="form-check-label" for="termsAndConditions">
                Agree to <a href="---------">terms and conditions</a>
            </label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
        </div>

        <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
    </form>
</main>

<script>
    // JavaScript for disabling form submissions if there are invalid fields
    $(document).ready(function () {
        'use strict'
    
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')
    
        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
    
            form.classList.add('was-validated')
            }, false)
        })
    })()
</script>