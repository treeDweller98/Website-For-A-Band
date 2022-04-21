<!-- 
    TODO
    1. Add the error messages generated in login.php 
    2. Change straignt-to-welcome and add OTP
-->

<main id="loginForm">
    <section class="d-flex flex-column justify-content-center align-items-center">
        <form action="login.php" method="POST" class="needs-validation px-5 py-4 mb-3 transbox" novalidate>
            <h1 class="text-center mb-4">Log In</h1>
            
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
    
            <div class="mb-3">
                <label for="loginEmailBox" class="form-label">Email</label>
                <input type="email" class="form-control" id="loginEmailBox" aria-describedby="loginEmailHelp" name="loginEmail" placeholder="example@email.com" required>
                <div id="loginEmailHelp" class="form-text">We'll never share your email with anyone else.</div>
                <div class="invalid-feedback">Please enter a valid email address</div>
            </div>
    
            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <label for="loginPasswordBox" class="form-label">Password</label>
                    <small><a href="#">Forgot Password?</a></small>
                </div>
                <input type="password" class="form-control" id="loginPasswordBox" name="loginPassword" required>
            </div>
    
            <div class="form-check my-2 mb-5">
                <input type="checkbox" class="form-check-input" id="rememberMeChk">
                <label class="form-check-label" for="rememberMeChk">Remember me on this computer</label>
            </div>
    
            <div class="d-flex flex-column justify-content-center">
                <button type="submit" class="mb-3 btn btn-primary">Log In</button>
                <small class="mb-4">Don't have an account? <a href="signup.php">Sign up now</a></small>
            </div>
            
            <?php 
                if (isset($login_err)) {
                    echo <<< HTML
                    <div class="alert alert-danger" role="alert">
                        {$login_err}
                    </div>
                    HTML;
                }
            ?>
        </form>
    </section>
</main>