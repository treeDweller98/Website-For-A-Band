<!-- 
    TO-DO:
    1. Change generic redirect to home after login
    
 -->

<?php
    session_start();
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(LIBRARY_PATH . "/templateFunctions.php");
    
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Connect to DB
        require_once(realpath(dirname(__FILE__) . "/../resources/databaseAccess.php"));

        $sql = "SELECT email, password FROM USER_T WHERE email = ?";

        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param( $stmt, "ss", $email );
        $email = trim( $_POST['loginEmail'] );
        $password = trim( $_POST['loginPassword'] );

        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if ( mysqli_stmt_num_rows($stmt) == 1 ) {

            mysqli_stmt_bind_result($stmt, $id, $userEmail, $hashed_password, $fname, $lname);

            if(mysqli_stmt_fetch($stmt)) {
                if ( password_verify($password, $hashed_password) ) {
                    // Password is correct, so start a new session
                    session_start();
                    
                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $id;
                    $_SESSION["username"] = $fname . $lname;
                    
                    // Redirect user to welcome page
                    header("location: index.php");
                    exit;
                } else {
                    // Password is not valid
                    $login_err = "Invalid username or _password";
                }
            } 
        } else {
            $login_err = "Invalid _username or password";
        }

        // Close connection
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }
    
    
    
    // Render
    $variables = array(
        'title' => "Log-in | Sign-up",
        'stylesheets' => array("css/forms.css"),
        'scripts' => array('js/form-validation.js'),
        'login_err' => $login_err
    );
    renderLayoutWithContentFile("login-form.php", $variables);
?>