<?php
    
    error_reporting(E_ALL);
    
    include_once 'autoload.php';
    
    echo 'begin <br>';
    
    try {
    
    $text = new foodProduct( 'пробный товар', 1000);
    
    echo $text->PrintProduct();

    } catch (Exception $e) {
        
        echo $e->getMessage();
    }
    
    echo '<br>end';
    