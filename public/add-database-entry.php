<?php 
session_start();
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(realpath(dirname(__FILE__) . "/../resources/databaseAccess.php"));

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($_POST["table"] === "MERCH_T"){
        if (($_FILES['Image']['name']!="")){
            // Where the file is going to be stored
                $target_dir = "images/merch/";
                $file = $_FILES['Image']['name'];
                $path = pathinfo($file);
                $filename = $path['filename'];
                $ext = $path['extension'];
                $temp_name = $_FILES['Image']['tmp_name'];
                $path_filename_ext = $target_dir.$filename.".".$ext;
                move_uploaded_file($temp_name,$path_filename_ext);
        }                
        $insertDataSQL = <<< SQL
                        INSERT INTO `MERCH_T` (`name`, `description`, `imageUrl`, `category`, `price`, `stock`, `discount`, `isAvailable`, `isFeatured`) VALUES
                        ('{$_POST['Name']}', '{$_POST['Description']}', '{$path_filename_ext}', '{$_POST['Category']}', '{$_POST['Price']}', {$_POST['Stock']}, {$_POST['Discount']}, {$_POST['IsAvailable']}, {$_POST['IsFeatured']})
                   SQL;
                   echo $insertDataSQL;
        $insertDataReturn = mysqli_query($link, $insertDataSQL);
    }
    if ($insertDataReturn) {
        header('Location: admin-panel.php');
    }
}

?>