<?php
    include_once 'autoload.php';

    $category = [
        'Бытовые товары' => ['Чайники', 'Пылесосы',  'Посудомойки', 'Фены'],
        'Гаджеты'        => ['планшеты', 'Смартфоны', 'Электронные книги']
    ];
    
    $objectCategory = [];
    
    $link = mysqli_connect( dbconfig::HOST, dbconfig::LOGIN, dbconfig::PASSWORD, dbconfig::DATABASE);
    
    $sql = "select name, key_category from category where key_parent = 0";
    
    $result = mysqli_query($link, $sql );
    
    while ( $row = mysqli_fetch_assoc($result) ) {
        
        $object = new parentCategory($row['name']);
        
        $sqlChild = "select name from category where key_parent = " . $row['key_category'];
        
        $resultChild = mysqli_query($link, $sqlChild );
        
        while ( $rowChild = mysqli_fetch_assoc($resultChild) ) {
            
          $object->AddChild($rowChild['name']);
        }
               
         $id = $object->getID() ;  
                                     
        $objectCategory[ $id ] = $object;
         
    }
            
    foreach($objectCategory as $parentCategory) {
    
       $parentCategory->PrintCategory();
   }    
    
    