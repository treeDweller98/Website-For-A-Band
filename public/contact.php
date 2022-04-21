<!--TODO:
    1. Have error messages for database failures etc.
-->
<?php
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(LIBRARY_PATH . "/templateFunctions.php");
   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Connect to DB
        require_once(realpath(dirname(__FILE__) . "/../resources/databaseAccess.php"));
        

        // Insert message
        $sql = "INSERT INTO MESSAGES_T 
        (idUser, fname, lname, email, subject, message, topic, receivedTime) 
        VALUES (?,?,?,?,?,?,?,?)";

        $stmt = mysqli_prepare( $link, $sql );
        mysqli_stmt_bind_param( $stmt, "isssssis",
            $idUser, $fname, $lname, $email, $subject, $message, $sendTime, $topic
        );
        $idUser = ($_SESSION["loggedin"] = true) ? $_SESSION["id"] : null;
        $fname = trim( $_POST['fname'] );
        $lname = trim( $_POST['lname'] );
        $email = trim( $_POST['email'] );
        $subject = trim( $_POST['subject'] );
        $message = trim( $_POST['message'] );
        $topic = $_POST['topic'];
        $sendTime = time();

        $isSent = mysqli_stmt_execute($stmt);
        
        // Close connection
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }
    
    // Package variables for use
    $variables = array(
        'title' => $title,
        'stylesheets' => array("css/forms.css"),
        'scripts' => array('js/form-validation.js'),
        'isSent' => $isSent
    );
    
    // Render page
    renderLayoutWithContentFile("contact-form.php", $variables);
?>