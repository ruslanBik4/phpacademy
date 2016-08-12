<?php
//     $ROOT_DIR = __DIR__ ;
    
    function __autoload($className)
    {
        $nameFile = "$className.php";
        
        if ( file_exists($nameFile) )
             include_once($nameFile);
    }