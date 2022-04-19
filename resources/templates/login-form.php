<!-- 
    TODO
    1. Add the error messages generated in login.php 
    2. Change straignt-to-welcome and add OTP
-->

<form action="login.php" method="POST" class="needs-validation transbox" novalidate>
    <h1>Log-In</h1>
    
    <?php
        if( !empty($_GET['message']) ) {

            if ( $_GET['message'] == "signedup" ) {
                echo <<< HTML
                <div class="alert alert-primary" role="alert">
                    Welcome! Please log in with your new account to continue
                </div>
                HTML;
            } else if ( $_GET['message'] == "signin" ) {
                echo <<< HTML
                <div class="alert alert-warning" role="alert">
                    You must be signed in to view this page
                </div>
                HTML;
            }
        }
    ?>

    <div">
        <label for="loginEmailBox" class="form-label">Email</label>
        <input type="email" class="form-control" id="loginEmailBox" aria-describedby="loginEmailHelp" name="loginEmail" placeholder="example@email.com" required>
        <div id="loginEmailHelp" class="form-text">We'll never share your email with anyone else.</div>
        <div class="invalid-feedback">Please enter a valid email address</div>
    </div>

    <div">
        <label for="loginPasswordBox" class="form-label">Password</label>
        <input type="password" class="form-control" id="loginPasswordBox" name="loginPassword" required>
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="rememberMeChk">
        <label class="form-check-label" for="rememberMeChk">Remember Me</label>
    </div>

    <a href="#">Forgot Password?</a>

    <button type="submit" class="btn btn-primary">Log In</button>

    <?php 
        if (isset($login_err)) {
            echo <<< HTML
            <div class="alert alert-danger" role="alert">
                {$login_err}
            </div>
            HTML;
        }
    ?>

    <div>
        <p> Don't have an account? </p><a href="signup.php">Sign up now</a>
    </div>
</form>
