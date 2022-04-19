<?php
    session_start();
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(LIBRARY_PATH . "/templateFunctions.php");
    
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {

        // Connect to DB
        require_once(realpath(dirname(__FILE__) . "/../resources/databaseAccess.php"));


        // Check if user with same email already exists
        $sql = "SELECT idUser FROM USER_T WHERE email = ?";

        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param( $stmt, "s", $email );
        $email = trim( $_POST['email'] );

        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if ( mysqli_stmt_num_rows($stmt) > 0 ) {
            $email_err = "This email is already registered.";

        } else {
            // Create new user
            $sql = "INSERT INTO USER_T 
                (fname, lname, email, phone, address, zipCode, 
                country, subscribedToNewsletter, password, joined ) 
                VALUES 
                ( ?, ?, ?, ?, ?, ?, 
                ?, ?, ?, ? )";

            $stmt = mysqli_prepare( $link, $sql );
            mysqli_stmt_bind_param( $stmt, "sssssssisi",
                $fname, $lname, $email, $phone, $address, 
                $zipCode, $country, $subscribe, $pwHash, $joined 
            );

            $fname = trim( $_POST['fname'] );
            $lname = trim( $_POST['lname'] );
            $email = trim( $_POST['email'] );
            $phone = trim( $_POST['phone'] );
            $address = trim( $_POST['address'] );
            $zipCode= trim( $_POST['zipCode'] );
            $country= trim( $_POST['country'] );
            $subscribe = $_POST['subscribe'];
            $pwHash = password_hash( trim($_POST["password"]), PASSWORD_DEFAULT );
            $joined = time();

            mysqli_stmt_execute($stmt);
        }

        // Close connection
        mysqli_stmt_close($stmt);
        mysqli_close($link);

        // Logout current user (if accessing this page while logged for some unholy reason)
        require_once("logout.php");
        // Redirect user to login page
        header("location: login.php?message=signedup");
        exit;
    }
    

    // Render
    $variables = array(
        'title' => "Sign Up",
        'scripts' => array('js/form-validation.js'),
        'email_err' => $email_err,
        'password_err' => $password_err,
        'confirm_password_err' => $confirm_password_err,
    );
    renderLayoutWithContentFile("signup-form.php", $variables);
?>

<!-- 
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
 -->



