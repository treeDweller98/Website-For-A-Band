<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/root.css">
    <script defer src="js/bootstrap.bundle.min.js"></script>
    <script defer src="js/jquery-3.6.0.min.js"></script>

    <?php 
        foreach( $stylesheets as $stylesheet ) {
            echo "<link rel=\"stylesheet\" href=\"css/{$stylesheet}\">";
        }
        foreach( $scripts as $script ) {
            echo "<script defer src=\"js/{$script}\"></script>";
        }
    ?>
    <title><?php echo $title; ?></title>
</head>
<body>