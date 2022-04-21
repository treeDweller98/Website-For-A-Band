<?php
    session_start();
    require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
    require_once(LIBRARY_PATH . "/templateFunctions.php");

    
    // Connect to DB
    require_once(realpath(dirname(__FILE__) . "/../resources/databaseAccess.php"));
    
    // insert logic here

    $sql = "SELECT * FROM MERCH_T";
    $allMerch = mysqli_query($link, $sql);    
    
    $categoryListSQL = <<< SQL
                        SELECT category 
                        FROM `MERCH_T` 
                        GROUP BY category;
                    SQL;

    $categoryList = mysqli_query($link, $categoryListSQL);

    $tableHeaderListSQL = <<< SQL
                            SELECT COLUMN_NAME 
                            FROM INFORMATION_SCHEMA.COLUMNS 
                            WHERE TABLE_SCHEMA = "{$_ENV["DB_NAME"]}" AND TABLE_NAME = 'MERCH_T';
                        SQL;
    $tableHeaderList = mysqli_query($link, $tableHeaderListSQL);
    // Close connection
    mysqli_close($link);

    
    // Render
    $variables = array(
        'title' => "Merch | Tickets",
        "stylesheets" => array("css/admin.css"),
        'allMerch' => $allMerch,
        'categoryList' => $categoryList,
        'tableHeaderList' => $tableHeaderList,
    );
    
    renderLayoutWithContentFile("admin-merch-view.php", $variables);
?>

