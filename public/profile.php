<?php
    session_start();
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(LIBRARY_PATH . "/templateFunctions.php");
    
    if ($_SESSION['loggedin']) {
        // Connect to DB
        require_once(realpath(dirname(__FILE__) . "/../resources/databaseAccess.php"));
        
        $sql = "SELECT * FROM USER_T WHERE idUser = {$_SESSION['id']}";

        $sqlticket = "SELECT T.idTicket, C.name, TI.price,TI.tierName, C.schedule, T.buyDate 
                     FROM user_t as U, ticket_t as T, concert_t as C, ticket_tier_t as TI
                     WHERE U.idUser = T.idUser AND T.idConcert = C.idConcert AND T.idTicketTier = TI.idTicketTier;";

        $sqlmerch = "SELECT O.idOrder, m.imageUrl, m.price,OI.quantity,O.paidStatus 
                    FROM user_t AS U, order_t AS O, order_item_t as OI, merch_t AS M 
                    WHERE U.idUser = O.idUser AND O.idOrder = OI.idOrder AND OI.idMerch = M.idMerch;";

        
        result1 = $link->query($sqlticket);
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
            'fname'  => $fname,
            'lname'  => $lname,
            'email'  => $email,
            'address'  =>$address,
            'zipCode'  => $zipCode,
            'country'  => $country,
            'phone'  => $phone,
            'joined'  => $joined,
            'ticketResult'  => $ticketResult,
            'merchResult'=>$merchResult,
           
        );
        renderLayoutWithContentFile("profile.php", $variables);

    } else {
        // Redirect to login if not signed in
        header("location: login.php?message=signin");
    }
?>