<?php
    session_start();
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(LIBRARY_PATH . "/templateFunctions.php");

    if ( isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
        // Connect to DB
        require_once(realpath(dirname(__FILE__) . "/../resources/databaseAccess.php"));

        $sql = "SELECT * FROM USER_T WHERE idUser = \"{$_SESSION['id']}\"";

        $sqlticket = "SELECT T.idTicket, C.name, TI.price,TI.tierName, C.schedule, T.buyDate 
                     FROM USER_T as U, TICKET_T as T, CONCERT_T as C, TICKET_TIER_T as TI
                     WHERE U.idUser =  \"{$_SESSION['id']}\" AND U.idUser = T.idUser AND T.idConcert = C.idConcert AND T.idTicketTier = TI.idTicketTier;";

        $sqlmerch = "SELECT *
                    FROM USER_T AS U, ORDER_T AS O, ORDER_ITEM_T as OI, MERCH_T AS M 
                    WHERE U.idUser =  \"{$_SESSION['id']}\" AND U.idUser = O.idUser AND O.idOrder = OI.idOrder AND OI.idMerch = M.idMerch;";

        
        $result1 = $link->query($sql);
        while($rows=$result1->fetch_assoc()){ 
            $fname =  $rows['fname'];
            $lname=  $rows['lname'];
            $email =  $rows['email'];
            $address =  $rows['address'];
            $zipCode =  $rows['zipCode'];
            $country =  $rows['country'];
            $phone =  $rows['phone'];
            $joined =  $rows['joined'];
        }

        $ticketResult = $link->query($sqlticket);
        $merchResult = $link->query($sqlmerch);
    
        // Close connection
        mysqli_close($link);
        
        // Render
        $variables = array(
            'title' => "Account | {$_SESSION["username"]}",
            "stylesheets" => array("css/profile.css"),
            'fname'  => $fname,
            'lname'  => $lname,
            'email'  => $email,
            'address'  =>$address,
            'zipCode'  => $zipCode,
            'country'  => $country,
            'phone'  => $phone,
            'joined'  => $joined,
            'ticketResult'  => $ticketResult,
            'merchResult'=>$merchResult
        );
        renderLayoutWithContentFile("profile-view.php", $variables);

    } else {
        // Redirect to login if not signed in
        header("location: login.php?message=signin");
    }
?>