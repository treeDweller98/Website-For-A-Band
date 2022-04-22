<?php
    session_start();
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(LIBRARY_PATH . "/templateFunctions.php");

    
    // Connect to DB
    require_once(realpath(dirname(__FILE__) . "/../resources/databaseAccess.php"));
    
    // insert logic here

    // MERCH-----------------------------------------------------------------------------
    $allMerchSQL = "SELECT * FROM MERCH_T";
    $allMerch = mysqli_query($link, $allMerchSQL);    
    $categoryListSQL = <<< SQL
                        SELECT category 
                        FROM `MERCH_T` 
                        GROUP BY category;
                    SQL;

    $categoryList = mysqli_query($link, $categoryListSQL);
    $merchTableHeaderListSQL = <<< SQL
                            SELECT COLUMN_NAME 
                            FROM INFORMATION_SCHEMA.COLUMNS 
                            WHERE TABLE_SCHEMA = "{$_ENV["DB_NAME"]}" AND TABLE_NAME = 'MERCH_T';
                        SQL;
    $merchTableHeaderList = mysqli_query($link, $merchTableHeaderListSQL);

    // CONCERT-----------------------------------------------------------------------------
    $allConcertSQL = "SELECT * FROM CONCERT_T";
    $allConcert = mysqli_query($link, $allConcertSQL);
    $concertTableHeaderListSQL = <<< SQL
                            SELECT COLUMN_NAME 
                            FROM INFORMATION_SCHEMA.COLUMNS 
                            WHERE TABLE_SCHEMA = "{$_ENV["DB_NAME"]}" AND TABLE_NAME = 'CONCERT_T';
                        SQL;
    $concertTableHeaderList = mysqli_query($link, $concertTableHeaderListSQL);

    // MESSAGE-----------------------------------------------------------------------------
    $allMessagesSQL = "SELECT * FROM MESSAGES_T";
    $allMessages = mysqli_query($link, $allMessagesSQL);
    $messagesTableHeaderListSQL = <<< SQL
                            SELECT COLUMN_NAME 
                            FROM INFORMATION_SCHEMA.COLUMNS 
                            WHERE TABLE_SCHEMA = "{$_ENV["DB_NAME"]}" AND TABLE_NAME = 'MESSAGES_T';
                        SQL;
    $messagesTableHeaderList = mysqli_query($link, $messagesTableHeaderListSQL);

    // USER-----------------------------------------------------------------------------
    $allUsersSQL = "SELECT * FROM USER_T";
    $allUsers = mysqli_query($link, $allUsersSQL);
    $userTableHeaderListSQL = <<< SQL
                            SELECT COLUMN_NAME 
                            FROM INFORMATION_SCHEMA.COLUMNS 
                            WHERE TABLE_SCHEMA = "{$_ENV["DB_NAME"]}" AND TABLE_NAME = 'USER_T';
                        SQL;
    $userTableHeaderList = mysqli_query($link, $userTableHeaderListSQL);


    // Close connection
    mysqli_close($link);
    
    // Render
    $variables = array(
        'title' => "Merch | Tickets",
        "stylesheets" => array("css/admin.css"),
        'allMerch' => $allMerch,
        'categoryList' => $categoryList,
        'merchTableHeaderList' => $merchTableHeaderList,
        'allConcert' => $allConcert,
        'concertTableHeaderList' => $concertTableHeaderList,
        'allMessages' => $allMessages,
        'messagesTableHeaderList' => $messagesTableHeaderList,
        'allUsers' => $allUsers,
        'userTableHeaderList' => $userTableHeaderList,
    );
    
    renderLayoutWithContentFile("admin-view.php", $variables);
?>

