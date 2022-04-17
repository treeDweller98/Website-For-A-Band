<!-- 
    TODO
    1. Add the error messages generated in login.php 
-->
<main>
    <form action="login.php" method="POST" class="needs-validation" novalidate>
        <h1>Log-In</h1>

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

        <a href="----------">Forgot Password?</a>

        <button type="submit" class="btn btn-primary">Log In</button>

        <div>
            <?php 
                if ( isset($login_err) ) {
                    echo $login_err;
                }
                if ( isset($diemsg) ) {
                    echo $diemsg;
                }
            ?>
        </div>

        <div>
            <p> Don't have an account? </p><a href="signup.php">Sign up now</a>
        </div>
    </form>
</main>