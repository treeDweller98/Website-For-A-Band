<?php
    require_once(realpath(dirname(__FILE__) . "/../config.php"));
 
    function renderLayoutWithContentFile($contentFile, $variables = array())
    {
        $contentFileFullPath = TEMPLATES_PATH . "/" . $contentFile;
     
        // making sure passed in variables are in scope of the template
        // each key in the $variables array will become a variable
        if (count($variables) > 0) {
            foreach ($variables as $key => $value) {
                if (strlen($key) > 0) {
                    ${$key} = $value;
                }
            }
        }

        require_once(TEMPLATES_PATH . "/header.php");
        require_once(TEMPLATES_PATH . "/navbar.php");
        
        if (file_exists($contentFileFullPath)) {
            require_once($contentFileFullPath);
        } else {
            require_once(TEMPLATES_PATH . "/error.php");
        }

        require_once(TEMPLATES_PATH . "/footer.php");
    }


    /*  DOCUMENTATION

        renderLayoutWithContentFile( $contentFile, $variables ) renders your html as:
            head.php
            navbar.php
            $contentFile
            footer.php


        $contentFile - The name of your specific template file in the resources/templates folder.
                       only contains whatever you need between the <body> </body>

        $variables = array(
            // For the header.php
            "title" => "myPageTitle",                                       // Mandatory
            "stylesheets" => array("djKhaled.css","anotherOne.css"),        // Optional: anything other than the bootstrap or root stuff
            "scripts" => array("djKhaled.js","anotherOne.js"),              // Optional: e.g. form validations code etc. that a specific page might need
            ..
            ..
            // For the templateContentFile.php (optional)
            "myVar" => $myVar,                                              // Maintain this exact format
            ..
            ..
        )


        Usage:
        someFileInTheFolder_public.php
        <?php
            require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
            require_once(LIBRARY_PATH . "/templateFunctions.php");
        
            // Set all variables to use in the page here 
            $title = "DUM DUMM DUUUMMMM";
            $stylesheets = array(...);
            $someUniqueVarForMyTemplate = ....;
            
            // Package variables for use
            $variables = array(
                'title' => $title,
                'stylesheets' => $stylesheets,
                ..
            );
            
            // Render page
            renderLayoutWithContentFile("myTemplateName.php", $variables);
        ?>
    */
?>