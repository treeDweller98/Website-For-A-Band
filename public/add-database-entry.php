<?php 
session_start();
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(realpath(dirname(__FILE__) . "/../resources/databaseAccess.php"));

function saveImage($path){
    if (($_FILES['Image']['name']!="")){
        // Where the file is going to be stored
            $target_dir = $path;
            $file = $_FILES['Image']['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES['Image']['tmp_name'];
            $path_filename_ext = $target_dir.$filename.".".$ext;
            move_uploaded_file($temp_name,$path_filename_ext);
    }
    return $path_filename_ext;                
}


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // MERCH-----------------------------------------------------------
    if($_POST["table"] === "MERCH_T"){
        if (($_FILES['Image']['name']!="")){
            $path_filename_ext = saveImage("images/merch/");
        }
        $insertDataSQL = <<< SQL
                        INSERT INTO `MERCH_T` (`name`, `description`, `imageUrl`, `category`, `price`, `stock`, `discount`, `isAvailable`, `isFeatured`) VALUES
                        (?, ?, ?, ?, ?, ?, ?, ?, ?)
                   SQL;

        $stmt = $link->prepare($insertDataSQL);
        $stmt->bind_param("ssssdiiii", $_POST['Name'], $_POST['Description'], $path_filename_ext, $_POST['Category'], $_POST['Price'], $_POST['Stock'], $_POST['Discount'], $_POST['IsAvailable'], $_POST['IsFeatured']);
        
    }
    // CONCERT-----------------------------------------------------------
    elseif($_POST["table"] === "CONCERT_T"){
        if (($_FILES['Image']['name']!="")){
            $path_filename_ext = saveImage("images/concert/");
        }

        $input_date=$_POST['Schedule'];
        $date=date("Y-m-d H:i:s",strtotime($input_date));

        $insertDataSQL = <<< SQL
                        INSERT INTO `CONCERT_T` (`name`, `description`, `location`, `schedule`, `capacity`, `imageUrl`) VALUES
                        (?,?,?,?,?,?)
                   SQL;
        
        $stmt = $link->prepare($insertDataSQL);
        $stmt->bind_param("ssssis", $_POST['Name'], $_POST['Description'], $_POST['Location'], $date, $_POST['Capacity'], $path_filename_ext);
    }
                
                
                
    $stmt->execute();
    //fetching result would go here, but will be covered later
    $stmt->close();
    header('Location: admin-panel.php');

    // $insertDataReturn = mysqli_query($link, $insertDataSQL);
    // if ($insertDataReturn) {
    //     header('Location: admin-panel.php');
    // }
}












?>