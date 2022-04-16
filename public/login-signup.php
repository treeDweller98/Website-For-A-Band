<?php
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(LIBRARY_PATH . "/templateFunctions.php");
    
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Connect to DB
        require_once(realpath(dirname(__FILE__) . "/../resources/databaseAccess.php"));


        // Create/Insert new user
        if ( $_POST['action'] === 'signup' ) {

            $time = time();
            $pwHash = password_hash( $_POST['password'], PASSWORD_DEFAULT );
            
            $sql = "INSERT INTO USER_T 
            (fname, lname, email, phone, address, zipCode, 
            country, subscribedToNewsletter, password, joined ) 
            VALUES 
            ('{$_POST['fname']}', '{$_POST['lname']}', '{$_POST['email']}', '{$_POST['phone']}', '{$_POST['address']}',
            '{$_POST['zipCode']}', '{$_POST['country']}', '{$_POST['subscribe']}', '{$pwHash}', '{$time}')";


        } 
        // Login
        else if ( $_POST['action'] === 'login' ) {

        }

        // Close connection
        mysqli_stmt_close($stmt);
    }
    
    
    
    // Render
    $variables = array(
        'title' => "Log-in | Sign-up",
        'scripts' => array('form-validation.js')
    );
    
    renderLayoutWithContentFile("contact-form.php", $variables);
?>



