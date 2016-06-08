<?php
    
    $text = '';
    foreach ($_POST['images'] as $value)
    {
        $text .= $value . PHP_EOL;  
    }
    
    
    file_put_contents('true_image.txt', $text);