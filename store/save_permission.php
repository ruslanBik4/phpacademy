<?php
    
     session_start();

   $text = '';
    foreach ($_POST['images'] as $value)
    {
        $text .= $value . PHP_EOL; 
/*
        if ( $_COOKIE[$value] )
             setcookie( $fullName, '' );
*/
 
    }
    
    $arrDiff = array_diff( $_COOKIE, $_POST['images'] );
    
    var_dump($_COOKIE);
    
    
    file_put_contents('true_image.txt', $text);
    