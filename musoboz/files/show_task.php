<?php

   iF (!isset($_SERVER['PHP_AUTH_USER']) || ($_SERVER['PHP_AUTH_USER'] != 'admin') || $_SERVER['PHP_AUTH_PW'] != '12345') {
         header('WWW-Authenticate: Basic realm="SHOW task"');
          header('HTTP/1.0 401 Unauthorized');
         exit(-1);
    }              
         
  header('Cache-Control: max-age=3600');
  header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');

  $key = '"' . $_SERVER['HTTP_X_CLIENT_IP'] . '"';     
  
  if ($cokieCounter=$_COOKIE['visitors'][$key]) {
     
      setcookie("visitors[$key]", ++$cokieCounter, time() + 3600 * 24 );      
  } else {
      setcookie('visitors[' . $key . ']', 1, time() + 3600 * 24 );      
  }
  
  print_r($_SERVER);     
  
  echo '<br>visitors[' . $key . ']  visit in ' . $cokieCounter . ' time <br>';
  
  
  echo $_SERVER['PHP_AUTH_USER'];