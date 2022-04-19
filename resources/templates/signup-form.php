<!-- TODO:
    1. Have "passwords identical" validation working
    2. Make form input sticky between reloads(?)
    3. Add the error messages generated in signup.php
-->
<main>
    <form action="signup.php" method="POST" class="needs-validation transbox" novalidate>
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
            <div class="invalid-feedback">
                <?php
                    if ( isset($email_err) ) {
                        echo $email_err;
                    } else {
                        echo "Please enter a valid email address";
                    }
                ?>
            </div>
        </div>

        <!-- PHONE -->
        <div>
            <label for="phoneBox" class="form-label">Phone</label>
            <input type="tel" id="phoneBox" class="form-control" size="20" minlength="9" maxlength="14" name="phone">
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
                <input class="form-control" type="text" id="addressBoxZIP" name="zipCode">
            </div>

            <div>
                <label for="addressBoxCountry" class="form-label">Country</label>
                <select class="form-select" id="addressBoxCountry" name="country" required>
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
            <input 
                type="password" class="form-control" aria-describedby="pwHelp" id="pwbox" name="password" 
                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required
            >
            <div class="invalid-feedback">
                    Please enter a valid password
            </div>        

            <label for="pwbox2" class="form-label">Retype Password</label>
            <input type="password" class="form-control" id="pwbox2" name="confirmPassword" required>
            <div id="pwHelp" class="form-text">
                Should be at least 8-characters long with numbers, uppercase and lowercase letters
            </div>
        </div>

        <!-- NEWSLETTER -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="subscribe" value="yes" id="terms" checked>
            <label class="form-check-label" for="terms">
                Subscribe to our Newsletter
            </label>
        </div>

        <!-- TERMS & CONDITIONS -->
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="termsAndConditions" required>
            <label class="form-check-label" for="termsAndConditions">
                I agree to the <a href="#">terms and conditions</a>
            </label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>

        <div>
            <p> Already have an account? </p><a href="login.php">Log In</a>
        </div>
    </form>
</main>