<?php
    session_start();
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(LIBRARY_PATH . "/templateFunctions.php");
    
    if ($_SESSION['loggedin']) {
        // Connect to DB
        require_once(realpath(dirname(__FILE__) . "/../resources/databaseAccess.php"));
        
        $sql = "SELECT * FROM USER_T WHERE idUser = {$_SESSION['id']}";

    
        while($rows=$result->fetch_assoc()){ 
                
            $fname =  $rows['fname'];
            $lname=  $rows['lname'];
            $email =  $rows['email'];
            $address =  $rows['address'];
            $zipCode =  $rows['zipCode'];
            $country =  $rows['country'];
            $phone =  $rows['phone'];
            $joined =  $rows['joined'];
        }
               
        // Close connection
        mysqli_close($link);
        
        // Render
        $variables = array(
            'title' => "Account | {$_SESSION["username"]}",
            'fname'  => $fname,
            'lname'  => $lname,
            'email'  => $email,
            'address'  =>$address,
            'zipCode'  => $zipCode,
            'country'  => $country,
            'phone'  => $phone,
            'joined'  => $joined,

        );
        renderLayoutWithContentFile("profile.php", $variables);

    } else {
        // Redirect to login if not signed in
        header("location: login.php?message=signin");
    }
?>