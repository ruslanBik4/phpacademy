<?php
    $ROOT_DIR =  substr( __DIR__, 1, strpos(__DIR__, '/models')-1 ) ;


    function __autoload($className)
    {
        global $ROOT_DIR;

        $pathInclude = [
            'models',
            'config',
            'views',
//            'views/tables',
//            'views/forms',
//            'views/menus',
            'controllers',
        ];


        foreach($pathInclude as $path) {

            $nameFile = "/$ROOT_DIR/$path/$className.php";
            if (file_exists($nameFile)) {
                include_once($nameFile);
                break;
            }

        }

    }