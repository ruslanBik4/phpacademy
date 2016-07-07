<?php
    
    if($_REQUEST['image']) {
        
        unlink($_REQUEST['image']);
        echo 'All!';
    }    