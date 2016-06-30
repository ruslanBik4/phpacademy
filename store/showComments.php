<?php

function istrueImage($filename) {
    
    $text = file_get_contents('true_image.txt');
    
    return strstr($text, $filename);
    
}
function ShowPicture($filename) {
    
    $pathPhotos = 'img/'.$_REQUEST['idTovar'];
    
    return $filename && istrueImage("$pathPhotos/$filename") ? "<img src='$pathPhotos/$filename' />" : '';
    
    
}

/*
  if ( !$_COOKIE['IP_user'] )
      setcookie('IP_user', $_SERVER['HTTP_X_REAL_IP']);
  else //if ( $_COOKIE['IP_user']  == $_SERVER['HTTP_X_REAL_IP'] )
  {
       echo $_COOKIE['IP_user'];
       exit(0);
   }
*/
   
   
    include_once 'const.php';


/*
    If ( !($rows = fileToArray( FILENAME )) )
        exit(-1);
*/

    if ( !($params = GetDBParams()) )
        die('Not connect to DB');

    $connetion = mysql_connect( $params[0], $params[1], $params[2] );
    
    $sql = "SELECT * from comments where idTovar = {$_REQUEST['idTovar']}";
    
    $resultQuery = mysql_db_query( $params[3], $sql);
    
    if (!$resultQuery)
     die('Not valid SQL-query: "' . $sql . '" Сервер ответил : "' . mysql_error() . '"' );

    while ($row = mysql_fetch_array($resultQuery, MYSQL_ASSOC ))
    {
//         $parts = explode( ';', $row);

/*
        if ($parts[0] != $_GET['idTovar'])
            continue;
*/

        echo $row['date_sys'] . '<br> Пользователь ' . $row['name_user'] .  ' написал: <br>'  . $row['memo'] . '<span style="color:red">' . str_repeat( '*', (int)$row['rating']) . '</span>' . '<br>'; 
//         .
//             ( isset($parts[4]) ? ' оценка =' . str_repeat( '*', (int)$row[4]) : '') . ShowPicture($parts[5]) . '<br>' ;

    }

    mysql_free_result($resultQuery);

    $pathPhotos = 'img/'.$_REQUEST['idTovar'];
    
    if ( !( $files = glob( $pathPhotos . '/*.jpg' ) ) )
        exit(0);
        
    foreach($files as $filename)
      echo $filename.'<br>';
