<!-- TODO:
    1. Have "passwords identical" validation working
    2. Make form input sticky between reloads(?)
    3. Add the error messages generated in signup.php
-->
<main id="signupForm">
    <section class="d-flex flex-column justify-content-center align-items-end">

        <form action="signup.php" method="POST" class="needs-validation transbox px-5 py-4 m-5 col-lg-6" novalidate>
            <h1 class="mt-2 mb-4">Sign Up</h1>
    
            <div class="row justify-content-evenly">
                <!-- NAME -->
                <div class="col-lg-6 col-sm-12 mb-3">
                    <label class="form-label" for="fname">First name:</label>
                    <input type="text" class="form-control" id="fname" name="firstName" required>
                    <div class="valid-feedback">Hello!</div>
                    <div class="invalid-feedback">I need a name to call you by</div>
                </div>
                <div class="col-lg-6 col-sm-12 mb-3">
                    <label class="form-label" for="lname">Last name:</label>
                    <input class="form-control" type="text" id="lname" name="lastName">
                </div>
                
                <!-- EMAIL -->
                <div class="col-12 mb-3">
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
                <div class="col-12 mb-3">
                    <label for="phoneBox" class="form-label">Phone</label>
                    <input type="tel" id="phoneBox" class="form-control" size="20" minlength="9" maxlength="14" name="phone">
                    <div class="invalid-feedback">Please enter a valid phone number</div>
                </div>

                <!-- ADDRESS -->
                <div class="col-12 mb-3">
                    <label class="form-label" for="addressBox">Address</label>
                    <input class="form-control" type="text" id="addressBox" name="address" placeholder="e.g. House-#, Road-#, City">
                </div>
                
                <div class="col-lg-4 mb-3">
                    <label class="form-label" for="addressBoxZIP">ZIP Code</label>
                    <input class="form-control" type="text" id="addressBoxZIP" name="zipCode">
                </div>
    
                <div class="col-lg-8 mb-3">
                    <label for="addressBoxCountry" class="form-label">Country</label>
                    <select class="form-select" id="addressBoxCountry" name="country" required>
                        <option selected disabled value="">Choose...</option>
                        <option>Bangladesh</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select your country.
                    </div>
                </div>
                
                <!-- PASSWORD -->
                <div class="my-3 p-3 border-top border-bottom border-1" >
                    <div class="mb-3">
                        <label for="pwbox" class="form-label">Password</label>
                        <input 
                            type="password" class="form-control" aria-describedby="pwHelp" id="pwbox" name="password" 
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required
                        >
                        <div class="invalid-feedback">
                                Please enter a valid password
                        </div>        
                    </div>
                    
                    <div class="mb-3">
                        <label for="pwbox2" class="form-label">Retype Password</label>
                        <input type="password" class="form-control" id="pwbox2" name="confirmPassword" required>
                        <div id="pwHelp" class="form-text">
                            Should be at least 8-characters long with numbers, uppercase and lowercase letters
                        </div>
                    </div>
                </div>
            </div>
    
    
            <!-- NEWSLETTER -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="subscribe" value="yes" id="terms" checked>
                <label class="form-check-label" for="terms">
                    Subscribe to our Newsletter
                </label>
            </div>
    
            <!-- TERMS & CONDITIONS -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="termsAndConditions" required>
                <label class="form-check-label" for="termsAndConditions">
                    I agree to the <a href="#">terms and conditions</a>
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
            
            <div class="d-flex flex-column align-items-center">
                <button type="submit" class="btn btn-info my-3 col-4">Register</button>
                
                <p class="mb-4">Already have an account? <a href="login.php"> Log In</a></p>
            </div>
    
        </form>

    </section>
</main>