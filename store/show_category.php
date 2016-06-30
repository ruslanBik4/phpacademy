<?php
    
function isChildren($key_parent)
{
	global $conn;
	
    $sql = 'select count(*) from category where key_parent = ?';
    
    $recordSet = $conn->SelectLimit($sql, -1, -1, array($key_parent) );
    
    
    return $recordSet->fields[0];
    
}

function readCategoriesFromParentKey($key_parent = 0)
{
 	global $conn;
 	
    $sql = 'select * from category where key_parent = ? order by name';
    
    $recordSet = $conn->SelectLimit($sql, -1, -1, array($key_parent) );
    
    $text = '<ul>';
    
  foreach ($recordSet as $record)    
  {
        
       $key_category = $record['key_category'];
       $text .= "<li>$key_category.".$record['name']."($key_parent)</li>";
        
        if ( $record[''] ) {
            $text .= readCategoriesFromParentKey($key_category);
        }
    
   }
    
    return $text.'</ul>';
}    
    
  // подключаем АдоДБ
  require_once('../adodb/adodb.inc.php');
  require_once("../adodb/adodb-exceptions.inc.php"); 
  
    include_once('../config_db.php'); 

    echo readCategoriesFromParentKey();
